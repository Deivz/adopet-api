<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{

    protected $model = Pessoa::class;

    public function definition(): array
    {
      $responsavel = Responsavel::factory()->create();
        return [
            'cod_responsavel' => $responsavel->id,
            'cpf' => strval($this->faker->numerify('###########')),
        ];
    }
}
