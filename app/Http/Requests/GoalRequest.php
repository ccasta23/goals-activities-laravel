<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
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
            'goalName' => 'required',
            'goalDescription' => ['required', 'min:3'], //Colocar más de una validación usando arreglo
            'goalPriority' => 'required|integer',//Colocar más de una validación usando pipe |
            'goalMonths' => ['required', 'integer']//Colocar más de una validación usando arreglo
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'goalName.required' => 'Debe ingresar un nombre !!!',
            'goalDescription.required' => 'El campo descripción es obligatorio',
            'goalDescription.min' => 'Debe tener una descripción de al menos 3 caracteres',
            'goalPriority.required' => 'Debe ingresar una prioridad, Si no la conoce, escriba 0'
        ];
    }

}
