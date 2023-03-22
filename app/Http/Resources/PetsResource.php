<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'tipo' => 'Pets',
            'atributos' => [
                'nome' => $this->nome,
                'idade' => $this->idade,
                'porte' => $this->porte,
                'perfil' => $this->perfil,
                'cidade' => $this->cidade,
                'estado' => $this->estado,
                'foto' => $this->foto,
                'cod_responsavel' => $this->cod_responsavel,
                'cod_adotante' => $this->cod_adotante,
                'criado_em' => $this->created_at,
                'atualizado_em' => $this->updated_at
            ]
        ];
    }
}
