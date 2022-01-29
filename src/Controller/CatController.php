<?php

namespace App\Controller;

use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class CatController extends AbstractController
{
    public function index(): void
    {
        $em = EntityManagerHelper::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Cat"));
        $aCats = $repo->findAll();

        print_r($this->serialize($aCats, 'json'));
    }

}
