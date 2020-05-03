<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulos;
use App\Privilegios;
use App\User;
class ModulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos=Modulos::all();
        $privilegios=Privilegios::all();
        $cont=count($modulos);
        return view('auth.modulos.index',compact('modulos','privilegios','cont'));
    }

    public function asignar_create()
    {
        $modulos=Modulos::all();
        $cont=count($modulos);
        $usuarios=User::where('tipo_usuario','<>','Admin')->get();
        return view('auth.modulos.asignar_create',compact('modulos','usuarios','cont'));
    }
    public function asignar_privilegios(Request $request)
    {
        if (count($request->id_privilegio)==0) {
            flash('<i class="icon-circle-check"></i> Debe Seleccionar al menos un Privilegio!')->warning()->important();
       return redirect()->to('asignar/create');        
        } else {
            
        for ($i=0; $i < count($request->id_privilegio); $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
                'id_usuario' => $request->id_usuario,
                'id_privilegio' => $request->id_privilegio[$i],
                'status' => 'Si'
            ]);

        }

        flash('<i class="icon-circle-check"></i>Privilegios asignados al Usuario exitosamente!')->success()->important();
       return redirect()->to('modulos');

        }
                
    }

    public function asignar_edit($id_usuario)
    {
        $usuario=User::find($id_usuario);

        $modulos=Modulos::all();

        $cont=count($modulos);

        return view('auth.modulos.asignar_edit',compact('usuario','modulos','cont'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
