<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Categorias;
use App\Http\Requests\CategoriasRequest;
use Alert;
use App\Bitacora;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias= Categorias::all();
        $cont=count($categorias);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando las categorías registradas";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('categorias.index',compact('categorias','cont'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buscar= Categorias::where('categoria',$request->categoria)->first();
        if (!empty($buscar)) {
            flash('La Categoría ya se encuentra registrada!', 'warning');
                return redirect()->back();
        } else {
                    $categoria= new Categorias();
        $categoria->categoria=$request->categoria;        
        $categoria->save();
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Registro de categoría con nombre ".$request->categoria;
        $bitacora->save();
        //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Categoría registrada exitosamente!')->success()->important();
       return redirect()->to('categorias');
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
        $categoria=Categorias::find($id);
        return view('categorias.edit',compact('categoria'));
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
        $buscar= Categorias::where('categoria',$request->categoria)->where('id','<>',$id)->first();
        if (!empty($buscar)) {
            flash('El nombre de la categoria ya se encuentra registrado!', 'error');
                return redirect()->back(); 
        } else {
               $categoria=Categorias::find($id);
               $categoria->categoria=$request->categoria;
               $categoria->save();
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando datos de la categoría con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
               flash('Registro exitoso!','success');
                return redirect()->to('categorias');                           

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
        /*¿Seguro que deseas eliminar? con esto se va a la base de datos y se confirma la contraseña*/ 
        $usuario=User::where('tipo_usuario','Admin')->first();

        if(\Hash::check($request->clave, $usuario->password)){


        $categoria=Categorias::find($request->id_categoria);
        $c=$categoria->categoria;
        if ($categoria->delete()) {
             //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminación de la categoría ".$c;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        } 

         /*¿Seguro que deseas eliminar?*/      
        } else {
            flash('<i class="icon-circle-check"></i> Clave de usuario admin incorrecta!')->error()->important();
                return redirect()->back();
        }


    }
}
