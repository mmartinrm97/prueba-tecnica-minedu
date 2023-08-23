<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocenteJubiladoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tipo_documento'=> ['required'],
            'numero_documento'=> ['required'],
            'nombres'=> ['required'],
            'apellido_paterno'=> ['required'],
            'apellido_materno'=> ['required'],
            'fecha_nacimiento'=> ['required'],
            'numero_celular'=> ['required'],
            'correo'=> ['required','email'],
            'estado' => ['string']
        ];
    }
}
