<?php

namespace Tests\Unit;

use App\Models\Pet;
use PHPUnit\Framework\TestCase;

class PetTest extends TestCase
{
    public function test_if_columns_from_pets_are_correct(): void
    {
        $pet = new Pet;
        $expected = [
            'nome', 'idade', 'porte', 'perfil', 'cidade', 'estado', 'foto', 'cod_responsavel', 'cod_adotante'
        ];

        $arrayComparison = array_diff($expected, $pet->getFillable());

        $this->assertEquals(0, count($arrayComparison));
    }

    // public function test_if_columns_from_pets_are_correct(): void
    // {
    //     $pet = Pet::make([
    //         'nome' => 'Dunga',
    //         'idade' => '2 anos',
    //         'porte' => 'Pequeno',
    //         'perfil' => 'Alegre e esperto',
    //         'cidade' => 'Salvador',
    //         'estado' => 'Bahia',
    //         'foto' => 'zxzxzx.png',
    //         'cod_responsavel' => 2,
    //         'cod_adotante' => 2
    //     ]);
    //     $expected = [
    //         'nome', 'idade', 'porte', 'perfil', 'cidade', 'estado', 'foto', 'cod_responsavel', 'cod_adotante'
    //     ];

    //     $arrayComparison = array_diff($expected, $pet->getFillable());

    //     $this->assertEquals(0, count($arrayComparison));
    // }
}
