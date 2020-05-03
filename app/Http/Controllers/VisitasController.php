<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitas;
use App\Espacios;
use App\Http\Requests\VisitasRequest;
use App\Bitacora;

class VisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy=date('Y-m-d');
        $visitas=Visitas::where('fecha',$hoy)->get();
        $cont=count($visitas);
        //dd($visitas->all());
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Listando visitas de hoy (".$hoy.")";
            $bitacora->save();
            //---------fin de registro en bitacora--------------- 
        return view('visitas.index',compact('visitas','cont'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espacios=Espacios::all();
        return view('visitas.create',compact('espacios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitasRequest $request)
    {
        
        $buscar= Visitas::where('cedula',$request->cedula)->where('fecha',date('Y-m-d'))->get();
        $x=0;
        foreach ($buscar as $key) {
            if ($key->salida=="") {
                $x++;
            }
        }        
        if ($x>0) {
            flash('<i class="icon-circle-check"></i> No se le ha marcado salida al visitante, para poder volverlo a registrar!')->success()->important();
            return redirect()->to('visitas');
        } else {
            $visita = new Visitas();

            $visita->nombres=$request->nombres;
            $visita->nacionalidad=$request->nacionalidad;
            $visita->cedula=$request->cedula;
            $visita->id_espacio=$request->id_espacio;
            $visita->fecha=date('Y-m-d');
            $visita->entrada=date('H:i:s');
            $visita->save();
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Registro de visita con cédula ".$request->cedula;
            $bitacora->save();
            //---------fin de registro en bitacora--------------- 
            flash('<i class="icon-circle-check"></i> Visitante registrado exitosamente!')->success()->important();
           return redirect()->to('visitas');    
        }
        
        
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
        $visita=Visitas::find($request->id_visita);
        $visita->salida=date('H:i:s');
        $visita->save();
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Marcando salida de visita con id ".$id;
            $bitacora->save();
            //---------fin de registro en bitacora--------------- 
        flash('Salida marcada exitosamente!', 'success');
                return redirect()->to('visitas');
    }

    public function visitas_todas()
    {
       
        $hoy=date('Y-m-d');
        $visitas=Visitas::all();
        $cont=count($visitas);
        //dd($visitas->all());
        return view('visitas.index1',compact('visitas','cont','hoy'));

    }
    public function search(Request $request)
    {
        //dd($hoy);
        $hoy=date('Y-m-d');

        $visitas=Visitas::whereDate('fecha','>=',$request->desde)->whereDate('fecha','<=',$request->hasta)->get();
        $cont=count($visitas);

       return view('visitas.index1',compact('visitas','hoy','cont'));
    }

    //    return $terrenos=Terrenos::whereDate('created_at','>=',$fecha)->whereDate('created_at','<=',$hasta)->get();  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $visita=Visitas::find($request->id_visita);
        $id=$visita->id;
        if ($visita->delete()) {
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminación de datos de visita con id ".$id;
            $bitacora->save();
            //---------fin de registro en bitacora--------------- 
            flash('Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        }
    }
}
