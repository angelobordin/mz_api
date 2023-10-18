<?php

namespace App\Controller;

use App\utils\mock\ContactMockApi;
use App\utils\mock\PersonMockApi;
use App\utils\View;

class Contact extends Page
{
    private function registerNewContact($data)
    {
        // ADICIONA UM REGISTRO NA MOCK API
        $api = new ContactMockApi;
        $newContact = [
            'tipo' => $data['tipo'],
            'pessoa' => $data['pessoa'],
            'descricao' => $data['descricao']
        ];
        $api->insertContact($newContact);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

    private function getSelectOptions(string $idPessoaSelected = null)
    {
        $registers = '';

        // BUSCA PESSOAS CADASTRADAS NA MOCK API
        $api = new PersonMockApi();
        $personList = $api->getRegisters();

        // PARA CADA PESSOA GERA UMA TAG OPTION PARA MOSTRAR NO SELECT DE PESSOAS NO CADASTRO DE CONTATO
        foreach ($personList as $key => $row) {
            $registers .= View::render('components/personOption', [
                'id' => $row['id'],
                'name' => $row['name'],
                // SE O ID PASSADO COMO PARAMETRO FOR IGUAL AO ID DO REGISTRO MARCA A PESSOA COMO SELECTED
                'selected' => $row['id'] == $idPessoaSelected ? 'selected' : '',
            ]);
        }

        // RETORNA UM ARRAY COM TODAS AS LINHAS DA TABELA
        return $registers;
    }

    public function contactRegister()
    {
        // BUSCA DADOS DE REQUISICAÇÃO POST PARA CADASTRO DE UM CONTATO
        $data = $_POST;

        if ($data) {
            // SE HOUVER DADOS QUER DIZER QUE DEVE REGISTRAR UM NOVO CONTATO
            return $this->registerNewContact($data);

        } else {
            // CASO NÃO HOUVER DADOS DEVE TRAZER O FORMULÁRIO DE CADASTRO
            $contentView = View::render('contact/contactRegister', [
                'title' => "CADASTRO DE CONTATO",
                // BUSCA AS OPÇÕES (PESSOAS) DO SELECT DE RESPONSÁVEL
                'personOptions' => $this->getSelectOptions()
            ]);

            // RETORNA FORMULÁRIO PARA CADASTRO DE CONTATO
            return parent::getPage("CADASTRO DE CONTATO", $contentView);
        }
    }

    private function getContactRegisters()
    {
        $registers = '';

        // BUSCA REGISTROS NA MOCK API
        $api = new ContactMockApi();
        $personApi = new PersonMockApi();
        $results = $api->getRegisters();

        // PARA CADA REGISTRO GERA UMA TABLE ROW
        foreach ($results as $key => $row) {
            $registers .= View::render('contact/contact', [
                'id' => $row['id'],
                'tipo' => $row['tipo'],
                'descricao' => $row['descricao'],
                // BUSCA DADOS DA PESSOA BASEADA NO ID REGISTRADO NO CONTATO
                'pessoa' => $personApi->getPersonById($row['pessoa'])['name'],
            ]);
        }

        return $registers;
    }

    public function contactList()
    {
        // RENDERIZA O TABLE HEAD
        $contentView = View::render('contact/contactList', [
            'title' => "LISTA DE CONTATOS REGISTRADOS",
            // BUSCA OS REGISTROS PARA MOSTRAR NAS TABLE ROWS
            'registers' => self::getContactRegisters()
        ]);

        // RETORNA TABLE COMPLETA COM REGISTROS
        return parent::getPage("LISTA DE CONTATOS", $contentView);
    }

    public function editContactById(string $id)
    {
        $newData = $_POST;
        if ($newData) {
            return self::updateContactById($id, $newData);
        } else {

            $api = new ContactMockApi();
            $personData = $api->getContactById($id);

            $contentView = View::render('contact/contactEdit', [
                'title' => "EDITANDO REGISTRO",
                'typeContactOptions' => $personData['tipo'] == 'Telefone' ? View::render('components/typeContactTelefoneSelected') : View::render('components/typeContactEmailSelected'),
                'descricao' => $personData['descricao'],
                'personOptions' => $this->getSelectOptions($personData['pessoa'])
            ]);

            return parent::getPage("LISTA DE CONTATOS", $contentView);
        }
    }

    public function updateContactById($id, $newData)
    {
        $api = new ContactMockApi;
        $newData = [
            'tipo' => $newData['tipo'],
            'pessoa' => $newData['pessoa'],
            'descricao' => $newData['descricao']
        ];
        $api->updateContact($id, $newData);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

    public function deleteContactById(string $id)
    {
        $api = new ContactMockApi;
        $api->removeContact($id);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

}