<?php

namespace App\Controller;

use App\utils\mock\ContactMockApi;
use App\utils\mock\PersonMockApi;
use App\utils\View;

class Contact extends Page
{
    // public function registerPerson(Request $request)
    // {
    //     $postVars = $request->getPostVars();

    //     $newPerson = new PersonEntity;
    //     $newPerson->name = $postVars['name'];
    //     $newPerson->cpf = $postVars['cpf'];
    //     $newPerson->registerPerson($newPerson);

    //     return self::personList($request);
    // }

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