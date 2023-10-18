<?php

namespace App\Controller;

use App\utils\mock\PersonMockApi;
use App\utils\View;

class Person extends Page
{

    private function registerNewPerson($data)
    {
        $api = new PersonMockApi;
        $newPerson = [
            'name' => $data['name'],
            'cpf' => $data['cpf']
        ];
        $api->insertPerson($newPerson);

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
                'cpf' => '',
                'name' => ''
            ]);

            return parent::getPage("CADASTRO DE PESSOA", $contentView);
        }
    }

    private function getPersonRegisters()
    {
        $registers = '';

        $api = new PersonMockApi();
        $results = $api->getRegisters();

        foreach ($results as $key => $row) {
            $registers .= View::render('person/person', [
                'id' => $row['id'],
                'name' => $row['name'],
                'cpf' => $row['cpf'],
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
            $api = new PersonMockApi();
            $personData = $api->getPersonById($id);

            $contentView = View::render('person/personEdit', [
                'title' => "EDITANDO REGISTRO",
                'cpf' => $personData['cpf'],
                'name' => $personData['name']
            ]);
            return parent::getPage("LISTA DE PESSOAS", $contentView);
        }
    }

    public function updatePersonById($id, $newData)
    {
        $api = new PersonMockApi();
        $newData = [
            'name' => $newData['name'],
            'cpf' => $newData['cpf'],
        ];
        $api->updatePerson($id, $newData);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::personList();
    }

    public function deletePersonById(string $id)
    {
        $api = new PersonMockApi;
        $api->removePerson($id);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::personList();
    }

}