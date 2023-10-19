<?php

namespace App\Controller;

use App\Model\PersonModel;
use App\utils\View;

class Person extends Page
{

    private function registerNewPerson($data)
    {
        $repository = new PersonModel();
        $repository->insertPerson($data['name'], $data['cpf']);

        return self::personList();
    }

    public function personRegister()
    {
        $data = $_POST;
        if ($data) {
            return $this->registerNewPerson($data);
        } else {
            $contentView = View::render('person/personRegister', [
                'title' => "CADASTRO DE PESSOA",
            ]);

            return parent::getPage("CADASTRO DE PESSOA", $contentView);
        }
    }

    private function getPersonRegisters()
    {
        $registers = '';

        $repository = new PersonModel();
        $results = $repository->getRegisters();

        foreach ($results as $key => $person) {
            $registers .= View::render('person/person', [
                'id' => $person->getId(),
                'name' => $person->getName(),
                'cpf' => $person->getCpf(),
            ]);
        }

        return $registers;
    }

    public function personList()
    {
        $contentView = View::render('person/personList', [
            'title' => "LISTA DE PESSOAS CADASTRADAS",
            'registers' => self::getPersonRegisters()
        ]);
        return parent::getPage("LISTA DE PESSOAS", $contentView);
    }

    public function editPersonById(string $id)
    {
        $newData = $_POST;
        if ($newData) {
            return self::updatePersonById($id, $newData);
        } else {
            $repository = new PersonModel();
            $personData = $repository->getPersonById($id);

            if ($personData == null)
                return self::personList();

            $contentView = View::render('person/personEdit', [
                'title' => "EDITANDO REGISTRO",
                'cpf' => $personData->getCpf(),
                'name' => $personData->getName()
            ]);

            return parent::getPage("LISTA DE PESSOAS", $contentView);
        }
    }

    public function updatePersonById($id, $newData)
    {
        $repository = new PersonModel();
        $repository->updatePerson($id, $newData['cpf'], $newData['name']);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::personList();
    }

    public function deletePersonById(string $id)
    {
        $repository = new PersonModel();
        $repository->removePerson($id);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::personList();
    }

}