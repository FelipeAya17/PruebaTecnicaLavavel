<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFormRequest extends FormRequest{
    public function authorize(){
        return true;}

    public function rules(){
        return [
            'usuario' => 'required',
            'estado' => 'required'
        ];
    }
    public function messages(){
		return [
            'usuario.required' => 'Debe ingresar un usuario',
            'estado.required' => 'Debe ingresar un estado'
		];
	}
}
