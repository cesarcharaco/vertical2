<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiasNoLab;
use App\Http\Requests\DiasNolabRequest;
use App\Http\Requests\DiasNolabUpdateRequest;
use Alert;
use App\Bitacora;
class DiasNoLabcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diasnolab= DiasNoLab::all();
        $cont=count($diasnolab);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando los días no laborables registrados";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('diasnolab.index',compact('diasnolab','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diasnolab=DiasNoLab::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiaNolabRequest $request)
    {
       $diasnolab= new DiasNoLab();
       $diasnolab->fecha=$request->fecha;
       $diasnolab->motivo=$request->motivo;        
       $diasnolab->save();
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Registrando (".$request->fecha.") como día no laborable";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Los dias no laborable fueron registrado exitosamente!')->success()->important();
       return redirect()->to('diasnolab.index');        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo=Cargos::find($id);
        return view('diasnolab.edit',compact('diasnolab'));        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diasnolab=DiasNoLab::find($id);
        return view('diasnolab.edit',compact('diasnolab'));        

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
        $diasnolab=DiasNoLab::find($id);
        $fecha=$diasnolab->fecha;
        if ($diasnolab->delete()) {
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminado (".$fecha.") como dia no laborable";
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
