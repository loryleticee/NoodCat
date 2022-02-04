<?php

namespace App\Controller;

use App\Entity\Bar;
use App\Entity\Cashier;
use App\Entity\Cat;
use App\Entity\Manager;
use App\Entity\TransportCompany;
use App\Helpers\EntityManagerHelper;
use DateTime;
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

        include(__DIR__ . "/../Vues/Auth/login.php");
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
        $company = new TransportCompany("UPS");
        $company1 = new TransportCompany("CHRONOPOST");
        $company2 = new TransportCompany("FEDEX");
        $company3 = new TransportCompany("DHL");

        $barRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Bar"));
        $bar2 = $barRepo->find(2);
        $bar1 = $barRepo->find(1);

        $cashier = new Cashier("BLOND", "Hernesto", "hernesto@blond.fr", "hernesto", new DateTime(), $bar2, '');
        $cashier2 = new Cashier("LEGACY", "Jasmine", "jasmine@legacy.fr", "jasmine", new DateTime(), $bar1, '');
        $cashier3 = new Cashier("MOLOIT", "fred", "fred@moloit.fr", "fred", new DateTime(), $bar2, '');

        $em->persist($company);
        $em->persist($company1);
        $em->persist($company2);
        $em->persist($company3);
        
        $em->persist($cashier);
        $em->persist($cashier2);
        $em->persist($cashier3);
        $em->flush();
    }
}
