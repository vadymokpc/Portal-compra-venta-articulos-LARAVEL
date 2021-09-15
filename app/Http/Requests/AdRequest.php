<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;             /* AUTORIZA LA SOLICITUD DEL FORMULARIO */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
/* ----------------------------------Campos obligatorios para crear nuevo anuncio----------------------------------------- */
        'title'=>'required|string|max:120',
        'body'=>'required|string|max:500',
        'price'=>'required|numeric|min:0,00|max:9999999999999.99', //Precio maximo 
        ];
    }
/* ----------------------------------Campos obligatorios para crear nuevo anuncio----------------------------------------- */

}
