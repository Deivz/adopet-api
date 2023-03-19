<?php

namespace Database\Factories;

use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsavelFactory extends Factory
{
    protected $model = Responsavel::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'telefone' => $this->faker->numerify('#############'),
            'email' => $this->faker->email
        ];
    }
}
