<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="date") */
    private DateTime $booking_date;

    /**
     * @ORM\ManyToOne(targetEntity="Cat")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private Cat $cat;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private Client $client;

    /**
     * @ORM\ManyToOne(targetEntity="Tablet")
     * @ORM\JoinColumn(name="tablet_id", referencedColumnName="id", onDelete="SET NULL")
    */
    private Tablet $tablet;

    /**
     * @ORM\ManyToOne(targetEntity="Cashier")
     * @ORM\JoinColumn(name="cashier_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private Cashier|Client $booking_owner;

    public function __construct(DateTime $booking_date, Cat $cat, Client $client, Tablet $tablet, Cashier|Client $booking_owner)
    {
        $this->transport_date = $booking_date;
        $this->cat = $cat;
        $this->client = $client;
        $this->tablet = $tablet;
        $this->booking_owner = $booking_owner;
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
     * Get the value of booking_date
     *
     * @return DateTime
     */
    public function getBookingDate(): DateTime
    {
        return $this->booking_date;
    }

    /**
     * Set the value of booking_date
     *
     * @param DateTime $booking_date
     *
     * @return self
     */
    public function setBookingDate(DateTime $booking_date): self
    {
        $this->booking_date = $booking_date;

        return $this;
    }

    /**
     * Get the value of cat
     *
     * @return Cat
     */
    public function getCat(): Cat
    {
        return $this->cat;
    }

    /**
     * Get the value of client
     *
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Get the value of tablet
     *
     * @return Tablet
     */
    public function getTablet(): Tablet
    {
        return $this->tablet;
    }

    /**
     * Get the value of booking_owner
     *
     * @return Cashier|Client
     */
    public function getBookingOwner(): Cashier|Client
    {
        return $this->booking_owner;
    }

    /**
     * Set the value of booking_owner
     *
     * @param Cashier|Client $booking_owner
     *
     * @return self
     */
    public function setBookingOwner(Cashier|Client $booking_owner): self
    {
        $this->booking_owner = $booking_owner;

        return $this;
    }
}
