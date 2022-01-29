<?php

namespace App\Traits;

trait NamesTrait
{
    /**
     * @ORM\Column(length="100")
    */
    private string|null $firstname;

    /**
     * @ORM\Column(length="100")
    */
    private string|null $lastname;

    /**
     * Get the value of firstname
     *
     * @return string|null
     */
    public function getFirstname(): string|null
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param string|null $firstname
     *
     * @return self
     */
    public function setFirstname(string|null $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return string|null
     */
    public function getLastname(): string|null
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param string|null $lastname
     *
     * @return self
     */
    public function setLastname(string|null $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }
}
