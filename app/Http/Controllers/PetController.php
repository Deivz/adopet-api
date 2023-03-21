<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PetController extends Controller
{

    public function index(): Collection
    {
        return Pet::all();
    }


    public function store(Request $request): JsonResponse
    {
        try {
            $this->validateRequest($request);
        } catch (ValidationException $exception) {
            return response()->json([
                'errors' => $exception->errors(),
            ], 400);
        }

        $pet = Pet::create($request->all());

        return response()->json([
            'message' => 'Pet cadastrado com sucesso',
            'data' => $pet
        ]);
    }


    public function show(Pet $pet): Pet
    {
        return $pet;
    }


    public function update(Request $request, Pet $pet): JsonResponse
    {
        try {
            $this->validateRequest($request);
        } catch (ValidationException $exception) {
            return response()->json([
                'errors' => $exception->errors(),
            ], 400);
        }

        $pet = Pet::find($pet->id);

        if($pet){
            $pet->update($request->all());
    
            return response()->json([
                'message' => 'Pet cadastrado com sucesso',
                'data' => $pet
            ]);
        }

        return response()->json([
            'errors' => 'Pet não encontrado',
        ], 404);

    }


    public function destroy(Pet $pet)
    {
        //
    }

    public function validateRequest(Request $request): void
    {
        $validator = Validator::make($request->all(), [
            'nome' => [
                'bail', 'required', 'max:50',
                'regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u'
            ],
            'idade' => [
                'bail', 'required', 'max:15'
            ],
            'porte' => [
                'bail', 'required', 'max:15'
            ],
            'perfil' => [
                'bail', 'required', 'max:30'
            ],
            'cidade' => [
                'bail', 'required', 'max:30',
                'regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u'
            ],
            'estado' => [
                'bail', 'required', 'max:2'
            ],
            'foto' => [
                'bail', 'nullable', 'image', 'mimes: jpg, jpeg, png, bmp, svg', 'max:1000'
            ],
            'cod_responsavel' => [
                'bail', 'required', 'max:100'
            ]
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
