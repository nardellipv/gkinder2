<?php

namespace gkinder\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;

class TutorStoreRequest extends FormRequest
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
            'telefono'=> 'required|numeric',
            'dni'=> 'required|numeric',
            'direccion'=> 'required|min:4',
            'email'=> 'required|email|unique:tutors,email',
            'password'=>'required|min:6'

        ];
    }
}
