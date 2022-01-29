<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */ 
class Cashier extends User
{
    /** @ORM\Column(length=20) */
    private string $immatriculation = "NULL";

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id", onDelete="SET NULL")
     */

    private Bar|null $bar;

    public function __construct(string $email, string $password, Bar $bar, ?string $immatriculation)
    {
        parent::__construct($email, $password, $bar);
        $this->immatriculation = $immatriculation;
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
}
