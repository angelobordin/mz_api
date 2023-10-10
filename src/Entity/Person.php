<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;


/**
 * @Entity
 */
class Person
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $name;

    /**
     * @Column(type="string")
     */
    private string $cpf;

    /**
     * 
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * 
     * @param string $cpf 
     * @return self
     */
    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * 
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}