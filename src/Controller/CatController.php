<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class CatController extends AbstractController
{
    const NEEDS = [
        "name", "description", "chipnumber", "bar"
    ];


    public function visitor(): void
    {
        $em = EntityManagerHelper::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $bar2 = $barRepo->find(2);
        $aCats = $repo->findBy(["bar" => $bar2->getId()]);

        include __DIR__ . "/../Vues/Cat/visitor.php";
    }

    public function index(): void
    {
        $em = EntityManagerHelper::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $bar1 = $barRepo->findBy(["manager" => $_SESSION["id"]])[1];
        $aCats = $repo->findBy(["bar" => $bar1->getId()]);

        include __DIR__ . "/../Vues/Cat/all.php";
    }

    public function add()
    {
        $em = EntityManagerHelper::getEntityManager();
        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $aBar = $barRepo->findBy(["manager" => $_SESSION["id"]]);

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
            $em->flush();
        }

        include(__DIR__ . "/../Vues/Cat/add.php");
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
                if(!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__."/../Vues/Cat/modify.php");
                    exit;
                }
                $_POST[$value] = htmlentities(strip_tags($_POST[$value]));
            }

            if ( $_POST["name"] !== $cat->getName()) {
                $cat->setName($_POST["name"]);
            }
            if ( $_POST["description"] == $cat->getDescription()) {
                $cat->setDescription($_POST["description"]);
            }
            if ( $_POST["chipnumber"] !== $cat->getChipNumber()) {
                $cat->setChipNumber((int)$_POST["chipnumber"]);
            }
            
            $bar = $barRepo->find((int)$_POST["bar"]);
            if ( $bar->getId() !== (int)$_POST["bar"]) {
                $cat->setBar($bar);
            }

            $em->persist($cat);

            try {
                $em->flush();
                $error = "Modifié avec succès";
            } catch (\Throwable $th) {
                $error = "une errue est survenue à la modification";
            }
        }

        include_once(__DIR__."/../Vues/Cat/modify.php");
    }

    public function delete($sId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $catRepository = New EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $cat = $catRepository -> find($sId);
        $em->remove($cat);
        $em->flush();

        include_once(__DIR__."/../Vues/Cat/delete.php");
    }
}
