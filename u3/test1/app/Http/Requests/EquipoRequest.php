<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Se cambia de false a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() //Con el nombre del input se busca el name y se pone pa validar
    {
        return [
            'nombre' => 'required|min:3|max:20|unique:equipos,nombre', //min y max ya son validaciones hechas por laravel
                                                                       //unique ve en la tabla equipo, ve si existe el nombre si es asi no lo agrega 
            'entrenador ' => 'required|min:3|max:20' // esta es la 1 validacion despues ir a controlador
        ];
    }

    public function messages(){
        return[
            'nombre.required' => 'Indique el nombre del equipo',
            'nombre.min' => 'Nombre de equipo debe tener como minimo 3 letras',
            'nombre.max' => 'Nombre de equipo debe tener como maximo 20 letras',
            'nombre.unique' => 'El equipo :input ya existe', //el :input sirve pa mostrar el nombre del equipo seria como un {{$equipo->nombre}}
            'entrenador.required' => 'Indique el nombre del entrenador',
            'entrenador.min' => 'Nombre de entrenador debe tener como minimo 3 letras',
            'entrenador.max' => 'Nombre de entrenador debe tener como maximo 20 letras'
        ];
    }
}
