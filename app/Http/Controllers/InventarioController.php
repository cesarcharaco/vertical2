<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Retiros;
use App\Solicitudes;
use App\User;
use App\Clientes;
use App\Atletas;
use App\AtletasProductos;
use Alert;
use App\Bitacora;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=1;
        $productos=Productos::all();
        $cont=count($productos);
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando los productos registrados";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('inventario.index',compact('num','productos','cont'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_producto)
    {
        $producto=Productos::find($id_producto);
        $atletas=Atletas::all();
        $clientes=Clientes::where('colabora','Si')->get();
        
        /*foreach($atletas as $k){
            foreach($k->productos as $keyp){

                if($keyp->pivot->id_producto==$producto->id && $keyp->pivot->status=="Pendiente"){                    echo $keyp->nombre;
                }
            }
        }*/
        

        return view('inventario.create',compact('producto','atletas','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        //id_producto
        //id_atleta
        //quientrajo
        //cantidad
        // cuando la variable quien trajo tenga valor 1, eso quiere decir de que quien trajo es el cliente
        $cont=0;
        if ($request->quientrajo==1) {
            //buscando la ultima solicitud aprobada
            $buscar_sol=Solicitudes::where('id_cliente',$request->id_cliente)->where('status','Aprobado')->orderBy('id','DESC')->first();
            //dd(is_null($buscar_sol));
            if (!is_null($buscar_sol)) {
                
                foreach ($buscar_sol->productos as $key) {
                    if ($key->pivot->status=="Pendiente" && $request->id_producto==$key->pivot->id_producto) {
                        $key->pivot->status="Entregado";
                        $key->pivot->fecha_entrega=date('Y-m-d');
                        $key->pivot->save();
                        
                        $cont++;
                         //---------------registrando en bitacora------------
                        $bitacora=new Bitacora();
                        $bitacora->id_usuario=\Auth::getUser()->id;
                        $bitacora->operacion="Marcado como Entregado producto con id ".$request->id_producto;
                        $bitacora->save();
                        //---------fin de registro en bitacora---------------
                    }
                }
            if ($cont==0) {
                flash('El producto no fue hallado en la última solicitud aprobada!', 'warning');
                return redirect()->back();
            }else{
                $producto=Productos::find($request->id_producto);
                $producto->stock=$producto->stock+$request->cantidad;
                $producto->save();
                 //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Actualizando inventario del producto con id ".$producto->id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
                flash('Inventario actualizado!', 'success');
                return redirect()->back();
            }
            } else {
               flash('No fue encontrada una solicitud APROBADA para este cliente!', 'warning');
                return redirect()->back();
            }
            
            //dd($cont);

        } else {
            $buscar_atlt=Atletas::all();
                //dd($request->id_atleta);
            foreach ($buscar_atlt as $k) {
                foreach ($k->productos as $key) {
                     
                    if ($key->pivot->id==$request->id_relacion){
                        
                        $key->pivot->status="Entregado";
                        $key->pivot->qty=request('cantidad');
                        $key->pivot->save();
                        
                        $cont++;   
                    } 
                }
            }
            if ($cont==0) {
                /*flash('El producto no fue hallado!')->warning()->important();
                return redirect()->back();*/
            }else{
                $producto=Productos::find($request->id_producto);
                $producto->stock=$producto->stock+request('cantidad');
                $producto->save();
                 //---------------registrando en bitacora------------
                    $bitacora=new Bitacora();
                    $bitacora->id_usuario=\Auth::getUser()->id;
                    $bitacora->operacion="Actualizando producto con id ".$producto->id;
                    $bitacora->save();
                    //---------fin de registro en bitacora---------------
                flash('Inventario actualizado!')->success()->important();
                return redirect()->to('inventario');
            }

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
        //dd($id);
        $productos=Productos::all();

        return view('inventario.edit',compact('productos'));
    }

    public function retiros(Request $request)
    {
        //dd($request->all());
        
        if (is_null($request->id_producto)) {
            flash('Debe seleccionar al menos un producto!')->warning()->important();
                return redirect()->back();
        }else{
            $id_productos=array();
            $id_producto=$request->id_producto;
            $productos=array();
            $existencia=array();
            for ($i=0; $i < count($request->id_producto); $i++) { 
                $buscar=Productos::find($request->id_producto[$i]);
                $productos[$i]=$buscar->nombre;
                $existencia[$i]=$buscar->stock;

            }
            //dd($id_producto);
            if (is_null($request->observacion)) {
                $observacion="Sin Observación";
            } else {
                $observacion=$request->observacion;
            }
            return view('inventario.retiros',compact('id_producto','observacion','productos','existencia'));
        }
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
        //dd($request->all());
        $usuario=User::where('tipo_usuario','Admin')->first();

        if(\Hash::check($request->clave_admin, $usuario->password)){
        $cont=0;
        for ($i=0; $i < count($request->cantidad) ; $i++) { 
            if ($request->cantidad[$i]=="") {
                $cont++;
            }

        }
        
        if ($cont>0) {
            flash('Debe ingresar todas las cantidades!')->warning()->important();
                return redirect()->to('inventario/1/edit');
        } else {
            $supera=0;
            for ($i=0; $i < count($request->id_producto); $i++) { 
                $buscar=Productos::find($request->id_producto[$i]);
                if ($buscar->stock<$request->cantidad[$i]) {
                    $supera++;
                }
            }
        }
        if ($supera>0) {
            flash('Existe una(s) cantidad(es) ingesada que supera la existencia del producto(s)!')->warning()->important();
                return redirect()->to('inventario/1/edit');
        } else {
            for ($i=0; $i < count($request->id_producto); $i++) { 
                $buscar=Productos::find($request->id_producto[$i]);
                $buscar->stock=$buscar->stock-$request->cantidad[$i];
                $buscar->save();

                $retiro=new Retiros();
                $retiro->id_producto=$request->id_producto[$i];
                $retiro->id_usuario=\Auth::user()->id;
                $retiro->cantidad=$request->cantidad[$i];
                $retiro->observacion=$request->observacion;
                $retiro->save();


             //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Retiro de producto con id ".$request->id_producto[$i]." con la cantidad de ".$request->cantidad[$i];
                $bitacora->save();
                //---------fin de registro en bitacora---------------
            }

            flash('Retiro realizado exitosamente!')->success()->important();
                return redirect()->to('inventario');   
        }
    }else{

        flash('La calve de administrador es incorrecta!')->warning()->important();
            return redirect()->to('inventario');   
    }

    }

    public function retiros_realizados()
    {
        $retiros=Retiros::all();
        $cont=count($retiros);

        return view('inventario.index-retiros',compact('retiros','cont'));

    }

    public function cancelar(Request $request)
    {
        //dd($request->all());
        $retiro=Retiros::find($request->id_retiro);
        $id=$retiro->id_producto;
        $cantidad=$retiro->cantidad;

        if ($retiro->delete()) {

        $producto=Productos::find($id);
        $producto->stock=$producto->stock+$cantidad;
        $producto->save();

             //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Cancelación de retiro del producto con id ".$id;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
            flash('Retiro cancelado exitosamente!')->success()->important();
                return redirect()->to('inventario/index/retiros');   
        } else {
            flash('El Retiro no pudo ser cancelado!')->warning()->important();
                return redirect()->to('inventario/index/retiros');   
        }
        
    }

    public function entregas_realizadas()
    {
        $productos=Productos::all();
        $cont=count($productos);
        $i=0;$j=0;
        return view('inventario.index-entregas',compact('productos','cont','i','j'));
    }

    public function cancelar_c(Request $request)
    {
        //se recibe el id_solicitud
        $solicitudes=Solicitudes::all();
        foreach ($solicitudes as $key) {
            foreach ($key->productos as $k) {
                if ($k->pivot->id==$request->id_solicitud) {
                    $k->pivot->status="Pendiente";
                    $k->pivot->save();

                    $producto=Productos::find($k->pivot->id_producto);
                    $producto->cantidad=$producto->cantidad-$k->pivot->cantidad;
                    $producto->save();

             //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Registro de producto con id ".$producto->id." en almacen  con la cantidad de ".$producto->cantidad;
                $bitacora->save();
                //---------fin de registro en bitacora---------------
                }
            }
        }
        flash('La entrega del cliente fue cancelada exitosamente!')->success()->important();
                return redirect()->to('inventario/index/entregas');   
    }

    public function cancelar_a(Request $request)
    {
        //se recibe el id_atleta
        $atleta=AtletasProductos::where('id', request('id_atleta'))->first();
                if(!is_null($atleta)){
                    $qty=$atleta->qty;
                    $atleta->fill(['status' => "Pendiente", 'qty' => NULL])->save();

                    $producto=Productos::find($atleta->id_producto);
                    if($producto->stock>0){
                        $producto->stock=$producto->stock-$qty;
                        $producto->save();
                    }


             //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::getUser()->id;
                $bitacora->operacion="Entrega de producto con id ".$producto->id." con la cantidad de ".$producto->stock;
                $bitacora->save();
                //---------fin de registro en bitacora--------------- 
                flash('La entrega del atleta fue cancelada exitosamente!')->success()->important();
                return redirect()->to('inventario/index/entregas');

                }
        flash('Ha ocurrido un error, intentelo nuevamente!')->warning()->important();
                return redirect()->to('inventario/index/entregas');  
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
