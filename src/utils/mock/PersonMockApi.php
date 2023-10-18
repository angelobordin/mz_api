<?php

namespace App\utils\mock;

class PersonMockApi
{
    private $registers = [
        [
            'id' => 1,
            'name' => 'Angelo',
            'cpf' => '03998303912'
        ],
        [
            'id' => 2,
            'name' => 'Maria',
            'cpf' => '1234567890'
        ],
        [
            'id' => 3,
            'name' => 'João',
            'cpf' => '9876543210'
        ],
        [
            'id' => 4,
            'name' => 'Carla',
            'cpf' => '5678901234'
        ],
        [
            'id' => 5,
            'name' => 'Pedro',
            'cpf' => '3210987654'
        ],
        [
            'id' => 6,
            'name' => 'Lúcia',
            'cpf' => '4567890123'
        ],
        [
            'id' => 7,
            'name' => 'Ana',
            'cpf' => '8901234567'
        ],
        [
            'id' => 8,
            'name' => 'Antônio',
            'cpf' => '2345678901'
        ],
        [
            'id' => 9,
            'name' => 'Sofia',
            'cpf' => '6543210987'
        ],
        [
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
        foreach ($this->registers as $person) {
            if ($person['id'] == $person_id) {
                return $person;
            }
        }

        return "Pessoa não cadastrada"; // Retorna null se o ID não for encontrado
    }

    public function insertPerson($newPerson)
    {
        array_push($this->registers, [
            'id' => sizeof($this->registers) + 1,
            'name' => $newPerson['name'],
            'cpf' => $newPerson['cpf']
        ]);
        return;
    }

    public function removePerson(string $id)
    {
        // LOCALIZAÇÃO POSIÇAO DO OBJ PELA COLUNA 'ID'
        $index = array_search($id, array_column($this->registers, 'id'));

        // REMOVE DO ARRAY O OBJ LOCALIZADO NO INDICE
        if ($index !== false || $index !== null) {
            unset($this->registers[$index]);
        }

        return;
    }

    public function updatePerson(string $id, $newData)
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