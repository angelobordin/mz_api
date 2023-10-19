<?php

namespace App\Model;

use App\helper\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Contact;

class ContactModel
{
    private $repository;
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
        $this->repository = $this->entityManager->getRepository(Contact::class);
    }

    public function getRegisters()
    {
        return $this->repository->findAll();
    }

    public function insertContact($tipo, $descricao, $pessoa)
    {
        // Crie uma nova instância da entidade Contact
        $newContact = new Contact();

        if (isset($tipo)) {
            $newContact->setTipo($tipo);
        }
        if (isset($descricao)) {
            $newContact->setDescricao($descricao);
        }
        if (isset($pessoa)) {
            $newContact->setPerson_id($pessoa);
        }

        // Persista a nova entidade no banco de dados
        $this->entityManager->persist($newContact);
        $this->entityManager->flush();

        return $newContact;
    }

    public function getContactById($id)
    {
        return $this->repository->find($id);
    }

    public function removeContact($id)
    {
        $contact = $this->getContactById($id);

        if ($contact) {
            $this->entityManager->remove($contact);
            $this->entityManager->flush();
        }

        return;
    }

    public function updateContact($id, $tipo, $descricao, $pessoa_id)
    {
        $contact = $this->getContactById($id);

        if ($contact) {
            // Atualize os campos da entidade Contact
            if (isset($tipo)) {
                $contact->setTipo($tipo);
            }
            if (isset($descricao)) {
                $contact->setDescricao($descricao);
            }
            if (isset($pessoa_id)) {
                $contact->setPerson_id($pessoa_id);
            }

            $this->entityManager->persist($contact);
            $this->entityManager->flush();
        }

        return;
    }
}
