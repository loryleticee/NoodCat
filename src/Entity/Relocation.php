<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Relocation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="date") */
    private DateTime $transport_date;

    /**
     * @ORM\ManyToOne(targetEntity="Cat")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private Cat|null $cat;

    /**
     * @ORM\ManyToOne(targetEntity="Cashier")
     * @ORM\JoinColumn(name="cashier_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private Cashier|null $cashier;

    /**
     * @ORM\ManyToOne(targetEntity="TransportCompany")
     * @ORM\JoinColumn(name="transport_company_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private TransportCompany|null $transport_compagnie;

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="start_bar_id", referencedColumnName="id", onDelete="CASCADE")
    */
    private Bar $start_bar;

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="end_bar_id", referencedColumnName="id", onDelete="CASCADE")
    */

    private Bar $end_bar;

    public function __construct(DateTime $transport_date, Cat $cat, Bar $start_bar, Bar $end_bar, ?Cashier $cashier, ?TransportCompany $transport_compagnie)
    {
        $this->transport_date = $transport_date;
        $this->cat = $cat;
        $this->start_bar = $start_bar;
        $this->end_bar = $end_bar;
        $this->cashier = $cashier;
        $this->transport_compagnie = $transport_compagnie;
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
     * Get the value of transport_date
     *
     * @return DateTime
     */
    public function getTransportDate(): DateTime
    {
        return $this->transport_date;
    }

    /**
     * Set the value of transport_date
     *
     * @param DateTime $transport_date
     *
     * @return self
     */
    public function setTransportDate(DateTime $transport_date): self
    {
        $this->transport_date = $transport_date;

        return $this;
    }

    /**
     * Get the value of cat
     *
     * @return Cat|null
     */
    public function getCat(): Cat|null
    {
        return $this->cat;
    }

    /**
     * Set the value of cat
     *
     * @param Cat|null $cat
     *
     * @return self
     */
    public function setCat(Cat|null $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get the value of cashier
     *
     * @return Cashier|null
     */
    public function getCashier(): Cashier|null
    {
        return $this->cashier;
    }

    /**
     * Set the value of cashier
     *
     * @param Cashier|null $cashier
     *
     * @return self
     */
    public function setCashier(Cashier|null $cashier): self
    {
        $this->cashier = $cashier;

        return $this;
    }

    /**
     * Get the value of transport_compagnie
     *
     * @return TransportCompany|null
     */
    public function getTransportCompagnie(): TransportCompany|null
    {
        return $this->transport_compagnie;
    }

    /**
     * Set the value of transport_compagnie
     *
     * @param TransportCompany|null $transport_compagnie
     *
     * @return self
     */
    public function setTransportCompagnie(TransportCompany|null $transport_compagnie): self
    {
        $this->transport_compagnie = $transport_compagnie;

        return $this;
    }

    /**
     * Get the value of start_bar
     *
     * @return Bar
     */
    public function getStartBar(): Bar
    {
        return $this->start_bar;
    }

    /**
     * Set the value of start_bar
     *
     * @param Bar $start_bar
     *
     * @return self
     */
    public function setStartBar(Bar $start_bar): self
    {
        $this->start_bar = $start_bar;

        return $this;
    }

    /**
     * Get the value of end_bar
     *
     * @return Bar
     */
    public function getEndBar(): Bar
    {
        return $this->end_bar;
    }

    /**
     * Set the value of end_bar
     *
     * @param Bar $end_bar
     *
     * @return self
     */
    public function setEndBar(Bar $end_bar): self
    {
        $this->end_bar = $end_bar;

        return $this;
    }
}
