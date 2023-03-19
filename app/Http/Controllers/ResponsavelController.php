<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Pessoa;
use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $responsavel = Responsavel::create($request->except(['cpf', 'cnpj']));

        if ($request->has('cpf')) {
            Pessoa::create([
                'cod_responsavel' => $responsavel->id,
                'cpf' => $request->input('cpf')
            ]);
        }

        if ($request->has('cnpj')) {
            Instituicao::create([
                'cod_responsavel' => $responsavel->id,
                'cnpj' => $request->input('cnpj')
            ]);
        }

        return $request->response([
            'responsavel' => $responsavel,
            'mensagem' => 'Responsavel cadastrado com sucesso!'
        ]);
    }


    public function show(Responsavel $responsavel)
    {
        //
    }


    public function update(Request $request, Responsavel $responsavel)
    {
        //
    }


    public function destroy(Responsavel $responsavel)
    {
        //
    }
}
