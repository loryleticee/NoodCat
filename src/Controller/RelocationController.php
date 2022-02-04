<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Router\Router;

final class RelocationController extends AbstractController
{
    const NEEDS = [
        "cat", "start_bar", "end_bar", "datetime", "cashier", "transportCompany"
    ];

    public function index(): void
    {
        $em = EntityManagerHelper::getEntityManager();
        $relocRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Relocation"));
        try {
            $aReloc = $relocRepo->findAll();
        } catch (\Throwable $th) {
            $error = "Une erreur s'est produite durant la récuperation des transferts";
        }

        include __DIR__ . "/../Vues/Relocation/all.php";
    }

    public function add()
    {
        $em = EntityManagerHelper::getEntityManager();
        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $catRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $cashierRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Cashier"));
        $aTransportCompany = (new EntityRepository($em, new ClassMetadata("App\Entity\TransportCompany")))->findAll();
        $aTransportCompany = empty($aTransportCompany) ? [] : $aTransportCompany;

        $aBar = $barRepo->findBy(["manager" => $_SESSION["id"]]);
        $aCats = [];
        $aCashier = [];

        foreach ($aBar as $b) {
            $aCats = array_merge($catRepo->findBy(["bar" => $b->getId()]), $aCats);

            $aCashier = array_merge($cashierRepo->findBy(["bar" => $b->getId()]), $aCashier);
        }

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../vues/add.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            $chip_number = (int) $_POST["chipnumber"];
            $bar = $barRepo->find((int)$_POST["bar"]);
            $cat = new Cat($_POST["name"], $_POST["description"], $chip_number, $bar, Cat::AVAILABLE);

            $em->persist($cat);

            try {
                $em->flush();
                Router::redirect("cats");
            } catch (\Throwable $th) {
                $error = "Ce chat existe déjà";
            }
        }

        include(__DIR__ . "/../Vues/Relocation/add.php");
    }

    public function modify(string $sId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $catRepository = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));

        $cat = $catRepository->find($sId);

        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $aBar = $barRepo->findBy(["manager" => $_SESSION["id"]]);

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../Vues/Cat/modify.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            if ($_POST["name"] !== $cat->getName()) {
                $cat->setName($_POST["name"]);
            }
            if ($_POST["description"] !== $cat->getDescription()) {
                $cat->setDescription($_POST["description"]);
            }
            if ($_POST["chipnumber"] !== $cat->getChipNumber()) {
                $cat->setChipNumber((int)$_POST["chipnumber"]);
            }

            $bar = $barRepo->find((int)$_POST["bar"]);
            if ($bar->getId() !== (int)$_POST["bar"]) {
                $cat->setBar($bar);
            }

            $em->persist($cat);

            try {
                $em->flush();
                $error = "Modifié avec succès";
                Router::redirect("cats");
            } catch (\Throwable $th) {
                $error = "une errue est survenue à la modification";
            }
        }

        include_once(__DIR__ . "/../Vues/Cat/modify.php");
    }

    public function delete($sId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $catRepository = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $cat = $catRepository->find($sId);
        $em->remove($cat);
        $em->flush();

        include_once(__DIR__ . "/../Vues/Cat/delete.php");
    }
}
