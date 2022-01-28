<?php

namespace App\Controllers;
use App\Helpers\EntityManagerHelper as Em;
use App\Helpers\SerializeHelper as Serializer;
use App\Models\AbstractRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;
use App\Entity\Pdg;

class PDGControllers
{
    public function showPayMaster()
    {
        
    }

    public function showForm()
    {
        include('src/Vues/PDG/AddPaymaster.php');
    }
    


    public function add()
    {

        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['password'], $_POST['age'])) 
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $age = $_POST['age'];
        }else
            throw new Exception("Error Processing Request");
        
            $entityManager = Em::getEntityManager();
            $pdg = new Pdg($firstname, $lastname, $mail, $password, $age);
            $entityManager->persist($pdg);

        try {
            $entityManager->flush();
        } catch (\Throwable $th) {
            exit("Error Processing Request");
            }
    }
}



    