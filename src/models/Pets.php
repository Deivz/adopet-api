<?php

namespace Deivz\AdopetApi\models;

use Deivz\AdopetApi\models\Responsavel;

class Pets
{
    private $nome;
    private $idade;
    private $porte;
    private $perfil;
    private $responsavel;
    private $cidade;
    
    public function __construct(string $nome, string $idade, string $porte, string $perfil, Responsavel $responsavel, string $cidade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->porte = $porte;
        $this->perfil = $perfil;
        $this->responsavel = $responsavel;
        $this->cidade = $cidade;
    }
}