<?php

namespace App\Controllers;

session_start();

use App\Entity\CatBar;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class CatBarControllers
{
    public function showAll()
    {
        $entityManager = Em::getEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\CatBar"));
        $CatBar = $repository->findAll();
        print $CatBar; 
    }


    public function add()
    {

        if (isset($_POST['name_bar'], $_POST['location'])) 
        {
            $name_bar = $_POST['name_bar'];
            $location = $_POST['location'];
        }else
            throw new \Exception("Error Processing Request");
        
            $entityManager = Em::getEntityManager();
            $cat = new CatBar($name_bar, $location);
            $entityManager->persist($cat);

        try {
            $entityManager->flush();
        } catch (\Throwable $th) {
            exit("Error Processing Request");
            }
    }


    public function showForm()
    {
        include __DIR__ . "/../Vues/CatBar/AddCatBar.php";
    }

    public function modify(string $sId)
    {
        $entityManager = Em::getEntityManager();
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Cat"));

        $catBar = $repository->find((int)$sId);

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                $existe = array_key_exists($value, $_POST);
                if ($existe === false) {
                    echo "Des paramètres sont manquant";
                    include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
                    die();
                }

                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if ($_POST[$value] === "") {
                    echo "Il manque des champs...";
                    include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
                    die();
                }
            }

            $catBar->setId((int)$_POST["id"]);
            $catBar->setName_bar($_POST["name_bar"]);
            $catBar->setLocation($_POST["location"]);

            $entityManager->persist($catBar);
            $entityManager->flush();

            echo "Information well edit";
        }

        include __DIR__ . "/../Vues/CatBar/ModifyCatBar.php";
        }
    

    public function delete(string $sId)
    { 
            $entityManager = Em::getEntityManager();
            $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\DeleteCatBar"));

            $catBar = $repository->find($sId);

            $entityManager->persist($catBar);
            $entityManager->flush();

            echo "Data well delete";
        }
    
}
