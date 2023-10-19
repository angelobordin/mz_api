<?php

namespace App\Model;

use App\helper\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Person;

class PersonModel
{
    private $repository;
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
        $this->repository = $this->entityManager->getRepository(Person::class);
    }

    public function getRegisters()
    {
        return $this->repository->findAll();
    }

    public function insertPerson($name, $cpf)
    {
        // Crie uma nova instância da entidade Person
        $newPerson = new Person();

        if (isset($cpf)) {
            $newPerson->setCpf($cpf);
        }

        if (isset($name)) {
            $newPerson->setName($name);
        }

        // Persista a nova entidade no banco de dados
        $this->entityManager->persist($newPerson);
        $this->entityManager->flush();

        return $newPerson;
    }

    public function getPersonById($id)
    {
        return $this->repository->find($id);
    }

    public function getPersonByField($field, $value)
    {
        $person = $this->repository->findBy([
            $field => $value
        ]);

        return $person;
    }

    public function removePerson($id)
    {
        $person = $this->getPersonById($id);

        if ($person) {
            $this->entityManager->remove($person);
            $this->entityManager->flush();
        }

        return;
    }

    public function updatePerson($id, $cpf, $name)
    {
        $person = $this->getPersonById($id);

        if ($person) {

            // Atualize os campos da entidade Person
            if (isset($cpf)) {
                $person->setCpf($cpf);
            }

            if (isset($name)) {
                $person->setName($name);
            }

            $this->entityManager->persist($person);
            $this->entityManager->flush();
        }

        return;
    }
}
