<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */

class Pdg extends User{
    public function __construct(string $lastname, string $firstname, string $mail, string $password, int $age)
    {
       parent::__construct($lastname, $firstname, $mail, $password, $age);
    }
}

// le pdg modifie les datas du bar (faire public function)
// modifier chat et bar via id

// dans Cat controllers recuperer modify cat 