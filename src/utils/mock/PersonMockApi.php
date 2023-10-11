<?php

namespace App\utils\mock;

class PersonMockApi
{
    private $registers = [
        'e1' => [
            'id' => 1,
            'name' => 'Angelo',
            'cpf' => '03998303912'
        ],
        'e2' => [
            'id' => 2,
            'name' => 'Maria',
            'cpf' => '1234567890'
        ],
        'e3' => [
            'id' => 3,
            'name' => 'João',
            'cpf' => '9876543210'
        ],
        'e4' => [
            'id' => 4,
            'name' => 'Carla',
            'cpf' => '5678901234'
        ],
        'e5' => [
            'id' => 5,
            'name' => 'Pedro',
            'cpf' => '3210987654'
        ],
        'e6' => [
            'id' => 6,
            'name' => 'Lúcia',
            'cpf' => '4567890123'
        ],
        'e7' => [
            'id' => 7,
            'name' => 'Ana',
            'cpf' => '8901234567'
        ],
        'e8' => [
            'id' => 8,
            'name' => 'Antônio',
            'cpf' => '2345678901'
        ],
        'e9' => [
            'id' => 9,
            'name' => 'Sofia',
            'cpf' => '6543210987'
        ],
        'e10' => [
            'id' => 10,
            'name' => 'José',
            'cpf' => '0123456789'
        ]
    ];

    public function getRegisters()
    {
        return $this->registers;
    }

    public function getPersonById($person_id)
    {
        if (array_key_exists("e$person_id", $this->registers)) {
            return $this->registers["e$person_id"]['name'];
        } else {
            return "Pessoa não cadastrada"; // Retorna null se o ID não for encontrado
        }
    }

    public function insertPerson($newPerson)
    {
        array_push($this->registers, [
            'id' => sizeof($this->registers) + 1,
            'name' => $newPerson['name'],
            'cpf' => $newPerson['cpf']
        ]);
        print_r($this->registers);
        return;
    }
}