<?php

namespace Deivz\AdopetApi\models;

class Responsavel
{
    private $nome;
    private $email;
    private $telefone;

    function __construct(string $nome, string $email, string $telefone)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }
}