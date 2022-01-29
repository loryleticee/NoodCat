<?php

namespace App\Entity;

use App\Traits\NamesTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */ 
class Manager extends User
{
    use NamesTrait;

    /** @ORM\Column(type="bigint", nullable=true) */
    private int $bank_funds;

    /**
     * @var Collection<Bar>
     * @ORM\OneToMany(targetEntity="Bar", mappedBy="Bar", orphanRemoval=true, cascade={"persist"})
    */
    private Collection $bars;

    public function __construct(string $email, string $password, string $firstname, string $lastname, ?int $bank_funds = 0)
    {
        parent::__construct($email, $password);
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->bank_funds = $bank_funds;
        $this->bars = new ArrayCollection();
    }

    /**
     * Get the value of bank_funds
     *
     * @return int
     */
    public function getBankFunds(): int
    {
        return $this->bank_funds;
    }

    /**
     * Set the value of bank_funds
     *
     * @param int $bank_funds
     *
     * @return self
     */
    public function setBankFunds(int $bank_funds): self
    {
        $this->bank_funds = $bank_funds;

        return $this;
    }
    
    public function addBar(Bar $bar) : self
    {
        if(!$this->bars->contains($bar)){
            $this->bars[] = $bar;
            $bar->setManager($this);
        }

        return $this;
    }

    public function removeBar(Bar $bar) : self
    {
        if($this->bars->removeElement($bar)){
            if($bar->getManager() === $this) {
                $bar->setManager(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of bars
     *
     * @return Collection
     */
    public function getBars(): Collection
    {
        return $this->bars;
    }

    /**
     * Set the value of bars
     *
     * @param Collection $bars
     *
     * @return self
     */
    public function setBars(Collection $bars): self
    {
        $this->bars = $bars;

        return $this;
    }
}
