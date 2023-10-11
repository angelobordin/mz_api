<?php

namespace App\utils\mock;

class ContactMockApi
{
    private $registers = [
        'e1' => [
            'id' => 1,
            'tipo' => 'Email',
            'descricao' => 'email1@example.com',
            'pessoa' => 1
        ],
        'e2' => [
            'id' => 2,
            'tipo' => 'Telefone',
            'descricao' => '123-456-7890',
            'pessoa' => 2
        ],
        'e3' => [
            'id' => 3,
            'tipo' => 'Email',
            'descricao' => 'email3@example.com',
            'pessoa' => 3
        ],
        'e4' => [
            'id' => 4,
            'tipo' => 'Telefone',
            'descricao' => '987-654-3210',
            'pessoa' => 4
        ],
        'e5' => [
            'id' => 5,
            'tipo' => 'Email',
            'descricao' => 'email5@example.com',
            'pessoa' => 5
        ],
        'e6' => [
            'id' => 6,
            'tipo' => 'Telefone',
            'descricao' => '567-890-1234',
            'pessoa' => 6
        ],
        'e7' => [
            'id' => 7,
            'tipo' => 'Email',
            'descricao' => 'email7@example.com',
            'pessoa' => 7
        ],
        'e8' => [
            'id' => 8,
            'tipo' => 'Telefone',
            'descricao' => '890-123-4567',
            'pessoa' => 8
        ],
        'e9' => [
            'id' => 9,
            'tipo' => 'Email',
            'descricao' => 'email9@example.com',
            'pessoa' => 9
        ],
        'e10' => [
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
}