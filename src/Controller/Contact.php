<?php

namespace App\Controller;

use App\utils\mock\ContactMockApi;
use App\utils\mock\PersonMockApi;
use App\utils\View;

class Contact extends Page
{
    private function registerNewContact($data)
    {
        $api = new ContactMockApi;
        $newContact = [
            'tipo' => $data['tipo'],
            'pessoa' => $data['pessoa'],
            'descricao' => $data['descricao']
        ];
        $api->insertContact($newContact);

        return self::contactList();
    }

    private function getSelectOptions()
    {
        $registers = '';

        $api = new PersonMockApi();
        $personList = $api->getRegisters();

        foreach ($personList as $key => $row) {
            $registers .= View::render('components/personOption', [
                'id' => $row['id'],
                'name' => $row['name'],
            ]);
        }

        return $registers;
    }

    public function contactRegister()
    {
        $data = $_POST;
        if ($data) {
            return $this->registerNewContact($data);
        } else {
            $contentView = View::render('contact/contactRegister', [
                'title' => "CADASTRO DE CONTATO",
                'personOptions' => $this->getSelectOptions()
            ]);

            return parent::getPage("CADASTRO DE CONTATO", $contentView);
        }
    }

    private function getContactRegisters()
    {
        $registers = '';

        $api = new ContactMockApi();
        $personApi = new PersonMockApi();
        $results = $api->getRegisters();

        foreach ($results as $key => $row) {
            $registers .= View::render('contact/contact', [
                'id' => $row['id'],
                'tipo' => $row['tipo'],
                'descricao' => $row['descricao'],
                'pessoa' => $personApi->getPersonById($row['pessoa']),
            ]);
        }

        return $registers;
    }

    public function contactList()
    {
        $contentView = View::render('contact/contactList', [
            'title' => "LISTA DE CONTATOS REGISTRADOS",
            'registers' => self::getContactRegisters()
        ]);
        return parent::getPage("LISTA DE CONTATOS", $contentView);
    }

    public function updateContactById()
    {
    }

    public function deleteContactById()
    {
    }

}