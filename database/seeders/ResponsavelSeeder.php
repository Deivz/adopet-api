<?php

namespace Database\Seeders;

use App\Models\Instituicao;
use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class ResponsavelSeeder extends Seeder
{
   
    public function run(): void
    {
        Pessoa::factory(5)->create();
        Instituicao::factory(5)->create();
    }
}
