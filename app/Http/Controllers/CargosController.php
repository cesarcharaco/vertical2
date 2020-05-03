<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cargos;
use App\Http\Requests\CargosRequets;
use Alert;
use App\Bitacora;
class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos= Cargos::all();
        $cont=count($cargos);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando los cargos registrado";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('cargos.index',compact('cargos','cont'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargosRequets $request)
    {
       $cargo= new Cargos();
       $cargo->cargo=$request->cargo;        
       $cargo->save();
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Cargo ".$request->cargo." registrado";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Cargo registrado exitosamente!')->success()->important();
       return redirect()->to('cargos');        




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
        $cargo=Cargos::find($id);
        return view('cargos.edit',compact('cargo'));        
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
                $buscar= Cargos::where('cargo',$request->cargo)->where('id','<>',$id)->first();
        if (!empty($buscar)) {
            flash('El nombre del cargo ya se encuentra registrado!', 'error');
                return redirect()->back(); 
        } else {
               $cargo=Cargos::find($id);
               $cargo->cargo=$request->cargo;
               $cargo->save();
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando datos del cargo con id =".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Registro exitoso!','success');
                return redirect()->to('cargos');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $usuario=User::where('tipo_usuario','Admin')->first();

        if(\Hash::check($request->clave, $usuario->password)){

        $cargo=Cargos::find($request->id_cargo);
        $c=$cargo->cargo;
        if ($cargo->delete()) {
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Cargo ".$c." eliminado";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        }

        } else {
            flash('<i class="icon-circle-check"></i> Clave de usuario admin incorrecta!')->error()->important();
                return redirect()->back();

        }


    }
}
