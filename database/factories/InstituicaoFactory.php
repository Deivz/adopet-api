<?php

namespace Database\Factories;

use App\Models\Instituicao;
use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstituicaoFactory extends Factory
{
    protected $model = Instituicao::class;

    public function definition(): array
    {
      $responsavel = Responsavel::factory()->create();
        return [
            'cod_responsavel' => $responsavel->id,
            'cnpj' => strval($this->faker->numerify('##############')),
        ];
    }
}
