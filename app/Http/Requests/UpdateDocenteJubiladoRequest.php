<?php

namespace App\Http\Requests;

use App\Rules\VerifyCERule;
use App\Rules\VerifyDNIRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateDocenteJubiladoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tipo_documento' => ['required', Rule::in(['DNI', 'CE'])],
            'numero_documento' => ['required',
                Rule::when(request('tipo_documento') === 'DNI', [new VerifyDNIRule]),
                Rule::when(request('tipo_documento') === 'CE', [new VerifyCERule]),
            ],
            'nombres' => ['required', 'min:3'],
            'apellido_paterno' => ['required', 'min:3'],
            'apellido_materno' => ['nullable', 'min:3'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:' . now()->subYears(65)->format('Y-m-d')],
            'numero_celular' => ['required', 'regex:/^9\d{8}$/'],
            'correo' => ['nullable', 'email'],
        ];


    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'fecha_nacimiento.before_or_equal' => 'El docente debe tener al menos 65 años de edad.',
        ];
    }
}
