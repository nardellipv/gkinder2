<?php

namespace gkinder\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'nombre'=> 'required|min:4|max:50',
            'apellido'=> 'required|min:4|max:50',
            'dni'=> 'required|numeric',
            'sexo'=> 'required',
            'fecha'=> 'required',
            'room_id'=> 'required',
            'tutor_id'=> 'required',
        ];
    }
}
