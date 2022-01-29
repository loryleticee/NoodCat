<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_bar_details", columns={"sign", "address"})})
 */
class Bar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private string $id;

    /**
     * @ORM\Column(length="100")
     */
    private string $sign;

    /**
     * @ORM\Column(length="255")
     */
    private string $address;

    /**
     * @var Collection<Salon>
     * @ORM\OneToMany(targetEntity="Salon", mappedBy="Bar", orphanRemoval=true, cascade={"persist"})
     */
    private Collection $salons;

    /**
     * @var Collection<Cashier>
     * @ORM\OneToMany(targetEntity="Cashier", mappedBy="Cashier", orphanRemoval=true, cascade={"persist"})
     */
    private Collection $cashiers;

    /**
     * @var Collection<Cats>
     * @ORM\OneToMany(targetEntity="Cat", mappedBy="Cat", orphanRemoval=true, cascade={"persist"})
    */
    private Collection $cats;

    /**
     * @ORM\ManyToOne(targetEntity="Manager")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
    */
    private Manager|null $manager;

    public function __construct(string $sign, string $address, Manager $manager)
    {
        $this->sign = $sign;
        $this->address = $address;
        $this->manager = $manager;
        $this->salons = new ArrayCollection();
        $this->cats = new ArrayCollection();
    }

    /**
     * Get the value of id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of sign
     *
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * Set the value of sign
     *
     * @param string $sign
     *
     * @return self
     */
    public function setSign(string $sign): self
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get the value of address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function addSalon(Salon $salon) : self
    {
        if(!$this->salons->contains($salon)){
            $this->salons[] = $salon;
            $salon->setBar($this);
        }

        return $this;
    }

    public function removeSalon(Salon $salon) : self
    {
        if($this->salons->removeElement($salon)){
            if($salon->getBar() === $this) {
                $salon->setBar(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of salons
     *
     * @return Collection
     */
    public function getSalons(): Collection
    {
        return $this->salons;
    }

    /**
     * Set the value of salons
     *
     * @param Collection $salons
     *
     * @return self
     */
    public function setSalons(Collection $salons): self
    {
        $this->salons = $salons;

        return $this;
    }

    /**
     * Get the value of manager
     *
     * @return Manager|null
     */
    public function getManager(): Manager|null
    {
        return $this->manager;
    }

    /**
     * Set the value of manager
     *
     * @param Manager|null $manager
     *
     * @return self
     */
    public function setManager(Manager|null $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function addCashiers(Cashier $cashier) : self
    {
        if(!$this->cashier->contains($cashier)){
            $this->cashiers[] = $cashier;
            $cashier->setBar($this);
        }

        return $this;
    }

    public function removeCashiers(Cashier $cashier) : self
    {
        if($this->cashiers->removeElement($cashier)){
            if($cashier->getBar() === $this) {
                $cashier->setBar(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of cashiers
     *
     * @return Collection
     */
    public function getCashiers(): Collection
    {
        return $this->cashiers;
    }

    /**
     * Set the value of cashiers
     *
     * @param Collection $cashiers
     *
     * @return self
     */
    public function setCashiers(Collection $cashiers): self
    {
        $this->cashiers = $cashiers;

        return $this;
    }

    public function addCats(Cat $cat) : self
    {
        if(!$this->cats->contains($cat)){
            $this->cats[] = $cat;
            $cat->setBar($this);
        }

        return $this;
    }

    public function removeCats(Cat $cat) : self
    {
        if($this->cats->removeElement($cat)){
            if($cat->getBar() === $this) {
                $cat->setBar(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of cats
     *
     * @return Collection
     */
    public function getCats(): Collection
    {
        return $this->cats;
    }

    /**
     * Set the value of cats
     *
     * @param Collection $cats
     *
     * @return self
     */
    public function setCats(Collection $cats): self
    {
        $this->cats = $cats;

        return $this;
    }
}
