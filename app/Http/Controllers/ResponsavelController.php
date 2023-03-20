<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ResponsavelController extends Controller
{

    public function index(): Collection
    {
        return Responsavel::all();
    }


    public function store(Request $request): JsonResponse | ValidationException
    {
        foreach ($request->except(['nome', 'telefone', 'email']) as $key => $part) {
            $document = $key;
        }

        if ($document === 'cpf') {
            $model = 'Pessoa';
            $table = 'pessoas';
        } else {
            $model = 'Instituicao';
            $table = 'instituicoes';
        }

        $modelClass = 'App\\Models\\' . $model;

        try {
            $this->validateRequest($request, $document, $table);
        } catch (ValidationException $exception) {
            return response()->json([
                'errors' => $exception->errors(),
            ], 400);
        }

        $responsavel = Responsavel::create($request->except(['cpf', 'cnpj']));

        $modelClass::create([
            'cod_responsavel' => $responsavel->id,
            $document => $request->input($document)
        ]);

        return response()->json([
            'message' => 'Responsável criado com sucesso',
            'data' => $responsavel
        ], 201);
    }


    public function show(Responsavel $responsavel): Responsavel
    {
        return $responsavel;
    }


    public function update(Request $request, Responsavel $responsavel)
    {
        //
    }


    public function destroy(Responsavel $responsavel)
    {
        //
    }

    public function validateRequest(Request $request, string $document, string $table): void
    {
        $validator = Validator::make($request->all(), [
            'nome' => [
                'bail', 'required', 'max:150',
                'regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u'
            ],
            'telefone' => [
                'bail', 'required', 'max:15',
                'regex: /^\((?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$/'
            ],
            'email' => ['bail', 'required', 'max:150', 'unique:responsaveis'],
            $document => ['bail', 'required', 'max:14', "unique:{$table}"]
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
