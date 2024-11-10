<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255', 'min:5'],
            'descripcion' => ['required', 'string', 'max:255', 'min:10'],
            'departamento' => ['required', 'string', 'max:255', 'min:10'],
            'telefono' => ['required', 'string', 'max:13', 'min:10'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
        ];
    }
}
