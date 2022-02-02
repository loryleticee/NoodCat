<?php

namespace App\Controller;

use App\Entity\Bar;
use App\Entity\Cat;
use App\Entity\Manager;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Router\Router;


final class AppController extends AbstractController
{
    const NEEDLES = ['login', 'password'];

    public function index(): void
    {
        print_r($this->serialize(["Home" => "Hello World"], 'json'));
    }

    public function error404(): void
    {
        Router::redirect("404");
    }

    public function login()
    {
        if (!empty($_POST)) { 
            foreach (self::NEEDLES as $value) {
                try {
                    if (!array_key_exists($value, $_POST)) {
                        throw new \Exception("No value $value found");
                    }

                    $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                    if ($_POST[$value] === "") {
                        throw new \Exception("Key $value becomes empty , due to not allowed char");
                    }
                } catch (\Throwable $e) {
                    exit($e->getMessage());
                }
            }
            $em = EntityManagerHelper::getEntityManager();
            $repo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
            $aUser = $repo->findBy(["email" => $_POST["login"]]);
            if(empty($aUser)) {
                exit("vous n'etes pas connu");
            }
            $this->comparePassword($aUser[0]->getPassword(), $_POST["password"], $aUser[0]);
            
            Router::redirect('cats');
        }

        include(__DIR__ . "/../vues/Auth/login.php");
    }

    private function comparePassword($inst_password, $password, $oUser) {
        global $error;
    
        if(!isset($inst_password)) {
            $error["message"] = "L’adresse e-mail que vous avez saisie n’est pas associée à un compte. <a href='/vues/account/signup.php'>Céer votre compte</a>";
            $error["exist"] = true;
    
            return $error;
        }
    
        $passwordVerified = password_verify($password, $inst_password);
    
        if (!$passwordVerified) {
            $error["message"] = "Mot de passe incorrect.";
            $error["exist"] = true;
    
            return $error;
        }
    
        $this->createSession($oUser);
    }
    
    private function createSession($oUser) {
        $_SESSION['id'] = $oUser->getId();
        $_SESSION['Type'] = strtolower(str_replace("App\Entity\\", "", get_class($oUser)));
    }

    public function logout()
    {
        unset($_SESSION["Type"]);
        session_unset();
        session_destroy();
        Router::redirect('');
    }

    public function addFake()
    {
        $em = EntityManagerHelper::getEntityManager();
        // $manager = new Manager("loryleticee@gmail.com", "lory", "Lory", "LETICEE");

        // $bar = new Bar("CatLand", "2 rue Philibert 54000 NANCY", $manager);
        // $bar1 = new Bar("StoryCat", "43 avenue Durant 75000 PARIS", $manager);

        // $manager->addBar($bar);
        // $manager->addBar($bar1);

        // $em->persist($manager);
        // $em->persist($bar);           
        // $em->persist($bar1);

        // try {
        //     $em->flush();
        // } catch (\Throwable $th) {
        //     exit("Be careful , you are trying to insert a data alreday present in the database.");
        // }
        
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $bar = $repo->find(2);

       
        $cat2 = new Cat("Jules", "Chat noir Français", 06545667, $bar, 1);
        $em->persist($cat2);
        $em->flush();
        $cat3 = new Cat("Brew", "Chat rose des bois", 7463263544, $bar, 1);
        $em->persist($cat3);
        $em->flush();
        $cat4 = new Cat("André", "Chat bleu de Tanzanie", 445564333, $bar, 1);
        $em->persist($cat4);
        $em->flush();
        $cat5 = new Cat("Konan", "Chat gris Espagnole", 9996556566, $bar, 1);
        $em->persist($cat5);
        $em->flush();
     

        $bar->addCats($cat);
        $bar->addCats($cat1);
        $bar->addCats($cat2);
        $bar->addCats($cat3);
        $bar->addCats($cat4);
        $bar->addCats($cat5);
        
        $em->persist($cat);
        $em->persist($cat1);
        $em->persist($cat2);
        $em->persist($cat3);
        $em->persist($cat4);
        $em->persist($cat5);

        // $em->persist($manager);
        $em->persist($bar);           
        // $em->persist($bar1);

        try {
            $em->flush();
        } catch (\Throwable $th) {
            exit("Be careful , you are trying to insert a data alreday present in the database.");
        }
    }
}
