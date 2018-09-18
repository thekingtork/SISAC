<?php

namespace ATS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ATS\Rules\ValidateAcudiente;

class CreateAcudienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'lastname'=>'required|min:3|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/|max:40',
            'relationship'=>'required|in:Padre,Madre,Abuelo,Hermano,Tío,Conyuge,Otro',
            'document'=>'required|numeric|max:9999999999|min:1000000|unique:acudientes,document',
            'phone'=>'required|numeric',
            'email' => 'email',
            'address' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'estudiante_id' => ['required',Rule::exists('estudiantes','id'), new ValidateAcudiente()]
        ];
    }
}
