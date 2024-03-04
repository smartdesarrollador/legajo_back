<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadorRequest extends FormRequest
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
            /* 'trabajador' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'numero_documento'=>'required',
            'fecha_nacimiento'=>'required',
            'ruc'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'celular'=>'required',
            'correo'=>'required',
            'id_empleador'=>'required',
            'id_tipo_contrato'=>'required',
            'fecha_estado'=>'required',
            'id_afp'=>'required',
            'cuspp'=>'required',
            'es_discapacitado'=>'required',
            'es_sindicalizado'=>'required',
            'fecha_ingreso'=>'required',
            'fecha_baja'=>'required', */

        ];
    }
}
