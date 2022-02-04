<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TransportCompany
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(length=30) */
    private string $company_name;

    public function __construct(string $company_name)
    {
        $this->company_name = $company_name;
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
     * Get the value of company_name
     *
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    /**
     * Set the value of company_name
     *
     * @param string $company_name
     *
     * @return self
     */
    public function setCompanyName(string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }
}
