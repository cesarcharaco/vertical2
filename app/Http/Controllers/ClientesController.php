<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Clientes;
use App\Http\Requests\ClientesRequest;
use Alert;
use App\Bitacora;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes= Clientes::all();
        $cont=count($clientes);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando los clientes registrados";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('clientes.index',compact('clientes','cont'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
       $cliente= new Clientes();
       $cliente->nombres=$request->nombres;
       $cliente->apellidos=$request->apellidos;
       $cliente->nacionalidad=$request->nacionalidad;
       $cliente->cedula=$request->cedula;
       $cliente->telefono=$request->telefono;
       $cliente->correo=$request->correo;
       if ($request->colabora=="") {
                  $colabora="No";
              } else {
                  $colabora="Si";
              }
        $cliente->colabora=$colabora; 
       $cliente->save();
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Registrando cliente con id ".$cliente->id;
        $bitacora->save();
        //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Cliente registrado exitosamente!')->success()->important();
       return redirect()->to('clientes');        




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
        $cliente=Clientes::find($id);
        return view('clientes.edit',compact('cliente'));        
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

        $buscar= Clientes::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (!empty($buscar)) {
            flash('La cédula del cliente ya se encuentra registrada!', 'error');
                return redirect()->back(); 
        } else {
               $cliente=Clientes::find($id);
               $cliente->nombres=$request->nombres;
               $cliente->apellidos=$request->apellidos;
               $cliente->nacionalidad=$request->nacionalidad;
               $cliente->cedula=$request->cedula;
               $cliente->telefono=$request->telefono;
               $cliente->correo=$request->correo;
               if ($request->colabora=="") {
                          $colabora="No";
                      } else {
                          $colabora="Si";
                      }
                $cliente->colabora=$colabora; 
               $cliente->save();
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando Datos del cliente con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Registro exitoso!','success');
                return redirect()->to('clientes');
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


      $usuario=User::Where('tipo_usuario','Admin')->first();

      if(\Hash::check($request->clave, $usuario->password)){


        $cliente=Clientes::find($request->id_cliente);
        $cedula=$cliente->cedula;

        if ($cliente->delete()) {
           //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminado cliente co cédula ".$cedula;
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
