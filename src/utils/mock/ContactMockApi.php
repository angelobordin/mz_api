<?php

namespace App\utils\mock;

class ContactMockApi
{
    private $registers = [
        [
            'id' => 1,
            'tipo' => 'Email',
            'descricao' => 'email1@example.com',
            'pessoa' => 1
        ],
        [
            'id' => 2,
            'tipo' => 'Telefone',
            'descricao' => '123-456-7890',
            'pessoa' => 2
        ],
        [
            'id' => 3,
            'tipo' => 'Email',
            'descricao' => 'email3@example.com',
            'pessoa' => 3
        ],
        [
            'id' => 4,
            'tipo' => 'Telefone',
            'descricao' => '987-654-3210',
            'pessoa' => 4
        ],
        [
            'id' => 5,
            'tipo' => 'Email',
            'descricao' => 'email5@example.com',
            'pessoa' => 5
        ],
        [
            'id' => 6,
            'tipo' => 'Telefone',
            'descricao' => '567-890-1234',
            'pessoa' => 6
        ],
        [
            'id' => 7,
            'tipo' => 'Email',
            'descricao' => 'email7@example.com',
            'pessoa' => 7
        ],
        [
            'id' => 8,
            'tipo' => 'Telefone',
            'descricao' => '890-123-4567',
            'pessoa' => 8
        ],
        [
            'id' => 9,
            'tipo' => 'Email',
            'descricao' => 'email9@example.com',
            'pessoa' => 9
        ],
        [
            'id' => 10,
            'tipo' => 'Telefone',
            'descricao' => '234-567-8901',
            'pessoa' => 10
        ]
    ];

    public function getRegisters()
    {
        return $this->registers;
    }

    public function insertContact($newContact)
    {
        array_push($this->registers, [
            'id' => sizeof($this->registers) + 1,
            'tipo' => $newContact['tipo'],
            'descricao' => $newContact['descricao'],
            'pessoa' => $newContact['pessoa']
        ]);
        return;
    }

    public function getContactById(string $id)
    {
        foreach ($this->registers as $contact) {
            if ($contact['id'] == $id) {
                return $contact;
            }
        }

        // Se o objeto não for encontrado, você pode retornar null ou lançar uma exceção, dependendo do seu caso.
        return null;
    }

    public function removeContact(string $id)
    {
        // LOCALIZAÇÃO POSIÇAO DO OBJ PELA COLUNA 'ID'
        $index = array_search($id, array_column($this->registers, 'id'));

        // REMOVE DO ARRAY O OBJ LOCALIZADO NO INDICE
        if ($index !== false || $index !== null) {
            unset($this->registers[$index]);
        }

        return;
    }

    public function updateContact(string $id, $newData)
    {
        // LOCALIZAÇÃO POSIÇAO DO OBJ PELA COLUNA 'ID'
        $index = array_search($id, array_column($this->registers, 'id'));

        // ATUALIZA O OBJ LOCALIZADO NO INDICE
        if ($index !== false && $index !== null) {
            $this->registers[$index] = $newData;
        }

        return;
    }
}