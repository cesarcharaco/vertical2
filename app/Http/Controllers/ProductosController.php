<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Productos;
use App\Categorias;
use App\Http\Requests\ProductosRequets;
use App\Http\Requests\ProductosUpdateRequest;
use Alert;
use App\Bitacora;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        
        $productos= Productos::all();
        $cont=count($productos);

            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Listando productos registrados";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
        return view('productos.index',compact('productos','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categorias::all();

        return view('productos.create',compact('categorias')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosRequets $request)
    {
        
        $producto= new Productos();
        $producto->nombre=$request->nombre;
        $producto->stock=$request->stock;
        $producto->codigo=$request->codigo;
        $producto->id_categoria=$request->id_categoria;
        $producto->save();
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Registro de producto con id ".$producto->id;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Producto registrado exitosamente!')->success()->important();
       return redirect()->to('productos');


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
        $producto=Productos::find($id);
        $categorias=Categorias::all();
        return view('productos.edit',compact('producto','categorias'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductosUpdateRequest $request, $id)
    {    
        $buscar_nombre=Productos::where('nombre',$request->nombre)->where('id','<>',$id);
        if (!isset($buscar_nombre)) {
            flash('El Nombre ya se encuentra registrado!', 'error');
                return redirect()->back();
        } else {
            $buscar_codigo=Productos::where('codigo',$request->codigo)->where('id','<>',$id);
            if (!isset($buscar_codigo)) {
               flash('El codigo ya se encuentra registrado!', 'error');
                return redirect()->back();
             } else {   
               $producto=Productos::find($id);
               $producto->nombre=$request->nombre;
               $producto->stock=$request->stock;
               $producto->codigo=$request->codigo;
               $producto->save();
               //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando datos de producto con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Actuaizacion exitosa!');
                return redirect()->to('productos');
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

        
        $usuario=User::where('tipo_usuario','Admin')->first();

        if(\Hash::check($request->clave, $usuario->password)){

        $producto=Productos::find($request->id_producto);
        $nombre=$producto->nombre;
        if ($producto->delete()) {
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Producto ".$nombre." eliminado";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('<i class="icon-circle-check"></i> Registro Eliminado exitosamente')->success()->important();
                return redirect()->back();
        } else {
            flash('<i class="icon-circle-check"></i> No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!')->warning()->important();
            
                return redirect()->back();
        }
        } else {
            flash('<i class="icon-circle-check"></i> Clave de usuario admin incorrecta!')->error()->important();
                return redirect()->back();
        }
        
    }
}
