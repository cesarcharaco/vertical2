<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Cargos;
use App\Empleados;
use App\User;
use App\Http\Requests\EmpleadosRequest;
use App\Http\Requests\EmpleadosUpdateRequest;
use Alert;
use App\Bitacora;
class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num= 1;
        $empleados= Empleados::all();
        $cont=count($empleados);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando empleados registrados";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('empleados.index',compact('num','empleados','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos=Cargos::all();

        return view('empleados.create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadosRequest $request)
    {
       //dd($request->all());
       $empleado= new Empleados();
       $empleado->nombres=$request->nombres;
       $empleado->apellidos=$request->apellidos;
       $empleado->nacionalidad=$request->nacionalidad;
       $empleado->cedula=$request->cedula;
       $empleado->correo=$request->correo;
       $empleado->movil=$request->movil;
       $empleado->local=$request->local;
       if($request->acceso==""){
          $acceso="Restringido";
       }else{
          $acceso=$request->acceso;
       }
       
       $empleado->id_cargo=$request->id_cargo;
       
       if ($acceso!="Restringido") {
        //validando campos vacios
        $this->validator($request->all());
          $empleado->save();
          
         $usuario= new User();
         $usuario->name=$request->apellidos." ".$request->nombres;
         $usuario->email=$request->correo;
         $usuario->password=bcrypt($request->password);
         $usuario->tipo_usuario=$request->tipo_usuario;
         $usuario->pregunta=$request->pregunta;
         $usuario->respuesta=$request->respuesta;
         $usuario->save();
       }else{
          $empleado->save();
       } 
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Registrado empleado con id ".$empleado->id;
        $bitacora->save();
        //---------fin de registro en bitacora---------------       

       flash('<i class="icon-circle-check"></i> Empleado registrado exitosamente!')->success()->important();
       return redirect()->to('empleados');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("--------");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=Empleados::find($id);
        $cargos=Cargos::all();
        $buscar=User::where('email',$empleado->correo)->first();
        if (isset($buscar)) {
          $usuario="Si";
        } else {
          $usuario="No";
        }
        
        return view('empleados.edit',compact('empleado','cargos','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadosUpdateRequest $request, $id)
    {
      
        $buscar_cedula=Empleados::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (!empty($buscar_cedula)) {
            flash('La Cédula ya se encuentra registrada!')->warning()->important();
                return redirect()->back();
        } else {
            $buscar_correo=Empleados::where('correo',$request->correo)->where('id','<>',$id)->first();
            if (!empty($buscar_correo)) {
               flash('El correo ya se encuentra registrado!')->warning()->important();
                return redirect()->back();
            } else {
               $empleado=Empleados::find($id);
               $empleado->nombres=$request->nombres;
               $empleado->apellidos=$request->apellidos;
               $empleado->nacionalidad=$request->nacionalidad;
               $empleado->cedula=$request->cedula;
               $empleado->correo=$request->correo;
               $empleado->movil=$request->movil;
               $empleado->local=$request->local;
               if($request->acceso==""){
                  $acceso="Restringido";
               }else{
                  $acceso=$request->acceso;
               }
               $empleado->acceso=$acceso;
               $empleado->id_cargo=$request->id_cargo;
               if ($acceso!="Restringido") {
                //validando campos vacios
                $this->validator($request->all());
                  $empleado->save();
                  
                 $usuario= new User();
                 $usuario->name=$request->apellidos." ".$request->nombres;
                 $usuario->email=$request->correo;
                 $usuario->password=bcrypt($request->password);
                 $usuario->tipo_usuario=$request->tipo_usuario;
                 $usuario->pregunta=$request->pregunta;
                 $usuario->respuesta=$request->respuesta;
                 $usuario->save();
               }else{
                  $empleado->save();
               }
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando datos de empleado con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Actualización exitosa!')->success()->important();
                return redirect()->to('empleados');
            }
            
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

        $empleado=Empleados::find($request->id_empleado);
        $c=$empleado->cedula;
        if ($empleado->delete()) {
           //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminado empleado con cédula ".$c;
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

   protected function validator(array $data)
   {
   return \Validator::make($data, [
   'pregunta' => 'required|max:255',
   'respuesta' => 'required|max:255',
   'password' => 'required|confirmed|regex:/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/',
   'password_confirmation' => 'required|same:password'
   ]);
   }
}
