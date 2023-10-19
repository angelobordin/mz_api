<?php

namespace App\Controller;

use App\Model\ContactModel;
use App\Model\PersonModel;
use App\utils\View;

class Contact extends Page
{


    private function registerNewContact($data)
    {
        // ADICIONA UM REGISTRO NA MOCK API
        $repository = new ContactModel();
        $repository->insertContact($data['tipo'], $data['descricao'], $data['pessoa']);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

    private function getSelectOptions(string $idPessoaSelected = null)
    {
        $registers = '';

        // BUSCA PESSOAS CADASTRADAS NA MOCK API
        $personRepository = new PersonModel();
        $personList = $personRepository->getRegisters();

        // PARA CADA PESSOA GERA UMA TAG OPTION PARA MOSTRAR NO SELECT DE PESSOAS NO CADASTRO DE CONTATO
        foreach ($personList as $key => $person) {
            $registers .= View::render('components/personOption', [
                'id' => $person->getId(),
                'name' => $person->getName(),
                // SE O ID PASSADO COMO PARAMETRO FOR IGUAL AO ID DO REGISTRO MARCA A PESSOA COMO SELECTED
                'selected' => $person->getId() == $idPessoaSelected ? 'selected' : '',
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
        $repository = new ContactModel();
        $results = $repository->getRegisters();

        // PARA CADA REGISTRO GERA UMA TABLE ROW
        $personRepository = new PersonModel();
        foreach ($results as $key => $contact) {
            $person = $personRepository->getPersonById($contact->getPerson_id());

            $registers .= View::render('contact/contact', [
                'id' => $contact->getId(),
                'tipo' => $contact->getTipo(),
                'descricao' => $contact->getDescricao(),
                // BUSCA DADOS DA PESSOA BASEADA NO ID REGISTRADO NO CONTATO
                'pessoa' => $person !== null ? $person->getName() : "Pessoa não encontrada",
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

            $repository = new ContactModel();
            $personData = $repository->getContactById($id);

            if ($personData == null)
                return self::contactList();

            $contentView = View::render('contact/contactEdit', [
                'title' => "EDITANDO REGISTRO",
                'typeContactOptions' => $personData->getTipo() === 'Telefone' ? View::render('components/typeContactTelefoneSelected') : View::render('components/typeContactEmailSelected'),
                'descricao' => $personData->getDescricao(),
                'personOptions' => $this->getSelectOptions($personData->getPerson_id())
            ]);

            return parent::getPage("LISTA DE CONTATOS", $contentView);
        }
    }

    public function updateContactById($id, $newData)
    {
        $repository = new ContactModel();
        $repository->updateContact($id, $newData['tipo'], $newData['descricao'], $newData['pessoa']);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

    public function deleteContactById(string $id)
    {
        $repository = new ContactModel();
        $repository->removeContact($id);

        // RETORNA LISTA DE CONTATOS BUSCADOS DA MOCK API
        return self::contactList();
    }

}