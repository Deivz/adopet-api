<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    // protected $table = 'pessoas';
    public $timestamps = true;

    protected $fillable = [
        'cpf'
    ];

    public function responsaveis()
    {
        return $this->hasMany(Responsavel::class, 'cod_responsavel');
    }
}
