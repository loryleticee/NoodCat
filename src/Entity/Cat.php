<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_cat_details", columns={"chip_number"})})
 */
class Cat
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
    private string $name;

    /**
     * @ORM\Column(length="512")
     */
    private string $description;

    /**
     * @ORM\Column(type="bigint")
     */
    private string $chip_number;

    /**
     * @ORM\ManyToOne(targetEntity="Bar")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id", onDelete="SET NULL")
    */
    private Bar|null $bar;

    /**
     * @ORM\Column(type="integer")
     */
    private int $status;

    public function __construct(string $name, string $desc, string $chip_number, Bar $bar, int $status)
    {
        $this->name = $name;
        $this->description = $desc;
        $this->chip_number = $chip_number;
        $this->bar = $bar;
        $this->status = $status;
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
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of chip_number
     *
     * @return string
     */
    public function getChipNumber(): string
    {
        return $this->chip_number;
    }

    /**
     * Set the value of chip_number
     *
     * @param string $chip_number
     *
     * @return self
     */
    public function setChipNumber(string $chip_number): self
    {
        $this->chip_number = $chip_number;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of bar
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set the value of bar
     */
    public function setBar(Bar|null $bar): self
    {
        $this->bar = $bar;

        return $this;
    }
}
