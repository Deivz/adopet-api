<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    // protected $table = 'pessoas';
    protected $primaryKey = 'cod_responsavel';
    public $timestamps = true;

    protected $fillable = [
        'cod_responsavel',
        'cpf'
    ];

    // public function responsaveis()
    // {
    //     return $this->hasMany(Responsavel::class, 'cod_responsavel');
    // }

    public function responsavel()
    {
        return $this->hasOne(Responsavel::class, 'cod_responsavel');
    }
}
