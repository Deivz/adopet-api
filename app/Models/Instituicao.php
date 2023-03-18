<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

        protected $table = 'instituicoes';
        public $timestamps = true;
    
        protected $fillable = [
            'cnpj'
        ];
    
        public function responsaveis()
        {
            return $this->hasMany(Responsavel::class, 'cod_responsavel');
        }
}
