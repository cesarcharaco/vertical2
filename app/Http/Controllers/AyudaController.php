<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function index(){
    	return view('manual.index');
    }

    public function ayudaEmpleado(){
    	return view('manual.empleados');
    }

    public function ayudaHorario(){
    	return view('manual.horarios');
    }

    public function ayudaAtleta(){
        return view('manual.atletas');
    }

    public function ayudaInventario(){
        return view('manual.inventario');
    }

    public function ayudaAgenda(){
    	return view('manual.agendas');
    }

    public function ayudaAsistencia(){
    	return view('manual.asistencias');
    }

    public function ayudaVisita(){
    	return view('manual.visitas');
    }

    public function ayudaBitacora(){
        return view('manual.bitacora');
    }

    public function ayudaUsuario(){
        return view('manual.usuarios');
    }

    public function ayudaRespaldo(){
        return view('manual.respaldo');
    }    

}
