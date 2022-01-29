<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Tablet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="integer") */
    private int $numero_tablet;

    /**
     * @ORM\ManyToOne(targetEntity="Salon")
     * @ORM\JoinColumn(name="salon_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private Salon|null $salon;

    public function __construct(string $numero_tablet, Salon $salon)
    {
        $this->numero_tablet = $numero_tablet;
        $this->salon = $salon;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of numero_tablet
     *
     * @return int
     */
    public function getNumeroTablet(): int
    {
        return $this->numero_tablet;
    }

    /**
     * Set the value of numero_tablet
     *
     * @param int $numero_tablet
     *
     * @return self
     */
    public function setNumeroTablet(int $numero_tablet): self
    {
        $this->numero_tablet = $numero_tablet;

        return $this;
    }


    /**
     * Get the value of salon
     *
     * @return Salon|null
     */
    public function getSalon(): Salon|null
    {
        return $this->salon;
    }

    /**
     * Set the value of salon
     *
     * @param Salon|null $salon
     *
     * @return self
     */
    public function setSalon(Salon|null $salon): self
    {
        $this->salon = $salon;

        return $this;
    }
}
