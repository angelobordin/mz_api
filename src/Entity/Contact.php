<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;


/**
 * @Entity
 */
class Contact
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
    private string $tipo;

    /**
     * @Column(type="string")
     */
    private string $descricao;

    /**
     * @column(type="integer")
     */
    private int $person_id;

    /**
     * 
     * @return int
     */
    public function getPerson_id()
    {
        return $this->person_id;
    }

    /**
     * 
     * @param int $person_id 
     * @return self
     */
    public function setPerson_id($person_id): self
    {
        $this->person_id = $person_id;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * 
     * @param string $descricao 
     * @return self
     */
    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * 
     * @param string $tipo 
     * @return self
     */
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;
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