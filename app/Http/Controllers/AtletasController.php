<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Atletas;
use App\Productos;
use App\Http\Requests\AtletasRequets;
use App\Http\Requests\AtletasUpdateRequest;
use Alert;
use App\Bitacora;
class AtletasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas= Atletas::all();
        $cont=count($atletas);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando atletas registrados";
        $bitacora->save();
        //---------fin de registro en bitacora--------------
        return view('atletas.index',compact('atletas','cont'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Productos::all();
        if (!empty($productos)) {
            
            return view('atletas.create',compact('productos'));
        } else {
            flash('<i class="icon-circle-check"></i> No existen productos registrados necesarios para registrar un atleta!')->warning()->important();
            return redirect()->back();            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtletasRequets $request)
    {
        if (count($request->id_producto)==0) {
           flash('<i class="icon-circle-check"></i> Debe seleccionar al menos un producto!')->warning()->important();
           return redirect()->back();
        } else {
           $atleta= new Atletas();
           $atleta->nombres=$request->nombres;
           $atleta->apellidos=$request->apellidos;
           $atleta->nacionalidad=$request->nacionalidad;
           $atleta->cedula=$request->cedula;        
           $atleta->save();
           //Registrando productos. DEBERIA VER SI QUITAR LA OPCIÓN DE PRODUCTOS O NO. 
           for ($i=0; $i <count($request->id_producto) ; $i++) { 
            for ($j=date('m'); $j <= 12; $j++) { 
               \DB::table('atletas_has_productos')->insert([
                    'id_atleta' => $atleta->id,
                    'id_producto' => $request->id_producto[$i],
                    'mes' => $j,
                    'status' => 'Pendiente'
               ]);
            }
           }
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Registrando atleta con id =".$atleta->id;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
           flash('<i class="icon-circle-check"></i> Atleta registrado exitosamente!')->success()->important();
           return redirect()->to('atletas');
            
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
        $atleta=Atletas::find($id);
        $productos=Productos::all();
        if (!empty($productos)) {
            
            return view('atletas.edit',compact('productos','atleta'));
        } else {
            flash('<i class="icon-circle-check"></i> No existen productos registrados necesarios para registrar un atleta!')->warning()->important();
            return redirect()->back();            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtletasUpdateRequest $request, $id)
    {

        $buscar_cedula=Atletas::where('cedula',$request->cedula)->where('id','<>',$id)->first();
        //dd($buscar_cedula);
        if (!empty($buscar_cedula)) {
            flash('La Cédula ya se encuentra registrada!', 'error');
                return redirect()->back();        
            } else {
               $atleta=Atletas::find($id);
               $atleta->nombres=$request->nombres;
               $atleta->apellidos=$request->apellidos;
               $atleta->nacionalidad=$request->nacionalidad;
               $atleta->cedula=$request->cedula;
               $atleta->save();
               \DB::table('atletas_has_productos')->where('id_atleta',$atleta->id)->delete();
               for ($i=0; $i <count($request->id_producto) ; $i++) { 
                for ($j=date('m'); $j <= 12; $j++) { 
                   \DB::table('atletas_has_productos')->insert([
                        'id_atleta' => $atleta->id,
                        'id_producto' => $request->id_producto[$i],
                        'mes' => $j,
                        'status' => 'Pendiente'
                   ]);
                }
               }
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando datos de atleta con id= ".$atleta->id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Actualización exitosa!','success');
                return redirect()->to('atletas');

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
            
        $atleta=Atletas::find($request->id_atleta);
        $cedula=$atleta->cedula;

        if ($atleta->delete()) {
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminando Atleta con cedula =".$cedula;
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
