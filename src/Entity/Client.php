<?php

namespace App\Entity;

use App\Traits\NamesTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */ 
class Client extends User
{
    use NamesTrait;
    
    /** @ORM\Column(length=20, nullable=true) */
    private string $id_card = "NULL";

    public function __construct(string $email, string $password, ?string $id_card, ?string $firstname, ?string $lastname)
    {
        parent::__construct($email, $password);
        $this->id_card = $id_card;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    /**
     * Get the value of id_card
     *
     * @return string
     */
    public function getIdCard(): string
    {
        return $this->id_card;
    }

    /**
     * Set the value of id_card
     *
     * @param string $id_card
     *
     * @return self
     */
    public function setIdCard(string $id_card): self
    {
        $this->id_card = $id_card;

        return $this;
    }
}