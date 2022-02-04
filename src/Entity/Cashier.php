<?php

namespace App\Entity;

use App\Traits\NamesTrait;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 */ 
class Cashier extends User
{
    use NamesTrait;
    /** @ORM\Column(length=20) */
    private string $immatriculation = "NULL";

    /** @ORM\Column(type="date") */
    private DateTime $date_inscription;

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */

    private Bar|null $bar;

    public function __construct(string $lastname, string $firstname,  string $email, string $password,  DateTime $date_inscription,  Bar $bar, ?string $immatriculation = '')
    {
        parent::__construct($email, $password);
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->immatriculation = $immatriculation;
        $this->date_inscription = $date_inscription;
        $this->bar = $bar;
    }
    
    /**
     * Get the value of immatriculation
     *
     * @return string
     */
    public function getImmatriculation(): string
    {
        return $this->immatriculation;
    }

    /**
     * Set the value of immatriculation
     *
     * @param string $immatriculation
     *
     * @return self
     */
    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get the value of bar
     *
     * @return Bar|null
     */
    public function getBar(): Bar|null
    {
        return $this->bar;
    }

    /**
     * Set the value of bar
     *
     * @param Bar|null $bar
     *
     * @return self
     */
    public function setBar(Bar|null $bar): self
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get the value of dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription(): \DateTime
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return self
     */
    public function setDateInscription(\DateTime $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }
}
