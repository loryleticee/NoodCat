<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Salon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="integer") */
    private int $table_number;

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private Bar|null $bar;

    /**
     * @var Collection<Tablet>
     * @ORM\OneToMany(targetEntity="Tablet", mappedBy="Tablet", orphanRemoval=true, cascade={"persist"})
    */
    private Collection $tablets;

    public function __construct(string $table_number, Bar $bar)
    {
        $this->table_number = $table_number;
        $this->bar = $bar;
        $this->tablets = new ArrayCollection();
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
     * Get the value of bar
     *
     * @return Bar
     */
    public function getBar(): Bar
    {
        return $this->bar;
    }

    /**
     * Set the value of bar
     *
     * @param Bar $bar
     *
     * @return self
     */
    public function setBar(Bar|null $bar): self
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get the value of table_number
     *
     * @return int
     */
    public function getTableNumber(): int
    {
        return $this->table_number;
    }

    /**
     * Set the value of table_number
     *
     * @param int $table_number
     *
     * @return self
     */
    public function setTableNumber(int $table_number): self
    {
        $this->table_number = $table_number;

        return $this;
    }

    public function addTablets(Tablet $tablet) : self
    {
        if(!$this->tablets->contains($tablet)){
            $this->tablets[] = $tablet;
            $tablet->setSalon($this);
        }

        return $this;
    }

    public function removeTablets(Tablet $tablet) : self
    {
        if($this->tablets->removeElement($tablet)){
            if($tablet->getSalon() === $this) {
                $tablet->setSalon(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of tablets
     *
     * @return Collection
     */
    public function getTablets(): Collection
    {
        return $this->tablets;
    }

    /**
     * Set the value of tablets
     *
     * @param Collection $tablets
     *
     * @return self
     */
    public function setTablets(Collection $tablets): self
    {
        $this->tablets = $tablets;

        return $this;
    }
}
