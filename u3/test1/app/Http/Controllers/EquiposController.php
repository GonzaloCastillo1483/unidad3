<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Http\Requests\EquipoRequest; //poner la ubicacion del request

class EquiposController extends Controller
{
    public function index(){
        $equipos = Equipo::all();
        return view('equipos.index',compact('equipos'));
    }

    public function store(EquipoRequest $request){ //poner EquipoRequest
        //dd($request->entrenador);
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->entrenador = $request->entrenador;
        $equipo->save();
        return redirect()->route('equipos.index');

    }

    public function show(Equipo $equipo){
        return view('equipos.show',compact('equipo'));
    }

    public function destroy(Equipo $equipo){
        //dd($equipo->nombre);
        $equipo->delete();
        return redirect()->route('equipos.index');
    }
}
