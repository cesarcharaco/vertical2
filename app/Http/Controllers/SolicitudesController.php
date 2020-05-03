<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitudes;
use App\Bloques;
use App\Clientes;
use App\Productos;
use App\Espacios;
use App\Agenda;
use Carbon\Carbon;
use App\Http\Requests\SolicitudesRequest;
use Alert;
use Mail;
use App\Mail\Adjuntar;
use App\Bitacora;
date_default_timezone_set("America/Caracas");
ini_set('date.timezone','America/Caracas');
class SolicitudesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $solicitudes= Solicitudes::all();
        $cont=count($solicitudes);
        //dd($solicitudes);
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando solicitudes registradas";
        $bitacora->save();
        $hoy=date('Y-m-d');
        //---------fin de registro en bitacora---------------
        return view('solicitudes.buscar_solicitudes',compact('solicitudes','cont','hoy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=Clientes::all();
        $espacios=Espacios::all();
        $productos=Productos::all();
        $bloques=Bloques::all();
        $hoy=Carbon::now()->format('Y-m-d');
        return view('solicitudes.create',compact('clientes','espacios','productos','bloques','hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudesRequest $request)
    { 
      //Buscando si hay actividades en los bloques elegidos
      //dd($request->fecha);
      //verificando si la fecha seleccionada coincide con el bloque
      $fecha=Carbon::parse($request->fecha);
      //dd($fecha->dayOfWeek);
      $dia=$fecha->dayOfWeek;
      //dd($dia."---");
      $x=0;
      switch ($dia) {
        case 1:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Lunes") {
              $x++;
            } 
          break;
        case 2:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Martes") {
              $x++;
            }
          break;
        case 3:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Miércoles") {
              $x++;
            }
          break;
        case 4:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Jueves") {
              $x++;
            }
          break;
        case 5:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Viernes") {
              $x++;
            }
          break;
        case 6:
          $bloque=Bloques::find($request->id_bloque);
          if ($bloque->dia=="Sábado") {
              $x++;
            }
          break;
        case 0:
          $bloque=Bloques::find($request->id_bloque);
          //dd($bloque);
          if ($bloque->dia=="Domingo") {
              $x++;
            }
          break;
      }
      //dd($x);
      //------------------------------
      if ($x==0) {
        flash('<i class="icon-circle-check"></i> La Fecha seleccionada no coincide con el bloque seleccionado, verifique el día!')->warning()->important();
       return redirect()->back()->withInput();  
      } else {
              
      $cont=0;
      $suma=(int)$request->id_bloque;
      
      for ($i=0; $i < $request->num_bloques; $i++) { 
        $agenda=Agenda::where('id_bloque',$suma)->where('id_espacio',$request->id_espacio)->first();
        $suma+=7;
        
        if (isset($agenda)) {
          $cont++;
          //dd($agenda);
        }
        
      }
      //dd($cont);
      if ($cont==0) {
        //la variable debe ser el singular por que estas haciendo un solo registro
        //verificando que la cantidad de personas a poder ingresar no supera el limite de capacidad del espacio solicitado...
        $espacio=Espacios::find($request->id_espacio);
      if ($request->num_asistentes>$espacio->limite_personas) {
          flash('<i class="icon-circle-check"></i> La cantidad de personas a asistir supera la capacidad del espacio seleccionado!')->warning()->important();
          return redirect()->back();   
      } else {
        
      $solicitud= New Solicitudes();
      $solicitud->id_bloque=$request->id_bloque;
      $solicitud->id_espacio=$request->id_espacio;
      $solicitud->num_bloques=$request->num_bloques;
      $solicitud->dirigido=$request->dirigido;
      $solicitud->nombre_actividad=$request->nombre_actividad;
      $solicitud->responsable=$request->responsable;
      if ($request->permanente=="") {
        $permanente="No";
      } else {
        $permanente=$request->permanente;
      }
      $solicitud->permanente=$permanente;
      
      $solicitud->fecha=$request->fecha;
      $solicitud->descripcion_actividad=$request->descripcion_actividad;
      $solicitud->num_asistentes=$request->num_asistentes;
      $solicitud->id_cliente=$request->id_cliente;
      $solicitud->save();
      
      if ($request->colaborar==1) {
        $fecha=Carbon::now()->format('Y-m-d');
        //dd($request->id_producto."-".$fecha."-".$request->cantidad."-".$solicitud->id);
        \DB::table('clientes_has_productos')->insert([
                    'id_producto' => $request->id_producto,
                    'status' => 'Pendiente',
                    'fecha_entrega' => $fecha,
                    'cantidad' => $request->cantidad,
                    'id_solicitud' => $solicitud->id
                    ]);
      }
       //dd($this->conexion()); 
      if ($this->conexion()) {
        //si hay internet envia el correo

          try{
            $response=Mail::to($solicitud->clientes->correo)->send(new Adjuntar($solicitud->id,""));
            
        }catch(\Swift_TransportException $e){
            $response = $e->getMessage() ;
            //dd($response);
        }      
        }
            //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Solicitud con id ".$solicitud->id." registrada";
            $bitacora->save();
            //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> Solicitud  registrada exitosamente!')->success()->important();
       return redirect()->to('solicitudes');

      }//cierre de if de cantidad de personas
      } else {
        flash('<i class="icon-circle-check"></i> Solicitud  no puede ser registrada debido a que ya hay una actividad para ese día!')->warning()->important();
       return redirect()->to('solicitudes');  
      }
      
      
      }//fin del condicional del dia

    }

    public function buscar_clientes($id)
    {
        return $cliente=Clientes::where('id',$id)->where('colabora','Si')->get();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $solicitud=Solicitudes::where('id',$id)->get();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $id_producto=0;
      $cantidad="";
        $solicitud=Solicitudes::find($id);//la variable singular por que estas buscando un solo registro
        foreach ($solicitud->productos as $key) {
          $id_producto=$key->pivot->id_producto;
          $cantidad=$key->pivot->cantidad;
        }


        $clientes=Clientes::all();
        $espacios=Espacios::all();
        $productos=Productos::all();
        $bloques=Bloques::all();
        $hoy=Carbon::now()->format('Y-m-d');
        return view('solicitudes.edit',compact('solicitud','clientes','espacios','productos','bloques','hoy','id_producto','cantidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SolicitudesRequest $request, $id)
    {
      //dd($request->all());
       //la variable debe ser el singular por que estas haciendo un solo registro
      
      //verificando que la cantidad de personas a poder ingresar no supera el limite de capacidad del espacio solicitado...
        $espacio=Espacios::find($request->id_espacio);
      if ($request->num_asistentes>$espacio->limite_personas) {
          flash('<i class="icon-circle-check"></i> La cantidad de personas a asistir supera la capacidad del espacio seleccionado!')->warning()->important();
          return redirect()->back();   
      } else {

      $solicitud= Solicitudes::find($id);
      $solicitud->id_bloque=$request->id_bloque;
      $solicitud->id_espacio=$request->id_espacio;
      $solicitud->num_bloques=$request->num_bloques;
      $solicitud->dirigido=$request->dirigido;
      $solicitud->nombre_actividad=$request->nombre_actividad;
      $solicitud->responsable=$request->responsable;
      if ($request->permanente=="") {
        $permanente="No";
      } else {
        $permanente=$request->permanente;
      }
      $solicitud->permanente=$permanente;
      
      $solicitud->fecha=$request->fecha;
      $solicitud->descripcion_actividad=$request->descripcion_actividad;
      $solicitud->num_asistentes=$request->num_asistentes;
      $solicitud->id_cliente=$request->id_cliente;
      $solicitud->save();
      
      if ($request->colaborar==1) {
        $fecha=Carbon::now()->format('Y-m-d');
        //dd($request->id_producto."-".$fecha."-".$request->cantidad."-".$solicitud->id);
        \DB::table('clientes_has_productos')->where('id_solicitud','=',$solicitud->id)->update([
                    'id_producto' => $request->id_producto,
                    'status' => 'Pendiente',
                    'fecha_entrega' => $fecha,
                    'cantidad' => $request->cantidad
                    ]);
      } 
      if ($this->conexion()) {
        //si hay internet envia el correo
      Mail::to($solicitud->clientes->correo)->send(new Adjuntar($solicitud->id,"")); 
      }
      //---------------registrando en bitacora------------
      $bitacora=new Bitacora();
      $bitacora->id_usuario=\Auth::getUser()->id;
      $bitacora->operacion="Actualización de datos de la solicitud con id ".$solicitud->id;
      $bitacora->save();
      //---------fin de registro en bitacora---------------
       flash('<i class="icon-circle-check"></i> solicitud  actualizada exitosamente!')->success()->important();
       return redirect()->to('solicitudes');
      }//cierre de condicional de limite de personas  
    }

    public function operaciones(Request $request)
    {
      if ($request->operacion=="Aprobar") {
        $solicitud=Solicitudes::find($request->id_solicitud);
        $solicitud->status="Aprobado";
        $solicitud->save();
        $id_bloque=$solicitud->id_bloque;
        $color='#'.$this->generar_codigo();
        for ($i=0; $i < $solicitud->num_bloques; $i++) { 
            $agenda=new Agenda();
            $agenda->id_solicitud=$solicitud->id;
            $agenda->id_espacio=$solicitud->id_espacio;
            $agenda->id_bloque=$id_bloque;
            $agenda->permanente=$solicitud->permanente;
            $agenda->color=$color;
            $agenda->save();
            $id_bloque+=7;
        }
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Aprobada solicitud con id ".$solicitud->id;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
        if ($this->conexion()) {
          //si hay internet envia el correo
        Mail::to($solicitud->clientes->correo)->send(new Adjuntar($solicitud->id,"")); 
        }
        flash('<i class="icon-circle-check"></i> La Solicitud  ha sido APROBADA!')->success()->important();
       return redirect()->to('solicitudes');
      } else {
        
        $solicitud=Solicitudes::find($request->id_solicitud);
        $solicitud->status="Negado";
        $solicitud->save();
        //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Negada la slicitud con id ".$solicitud->id;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
        if ($this->conexion()) {
          //si hay internet envia el correo
        Mail::to($solicitud->clientes->correo)->send(new Adjuntar($solicitud->id,$request->motivos)); 
        }
        flash('<i class="icon-circle-check"></i> La Solicitud  ha sido NEGADA!')->success()->important();
       return redirect()->to('solicitudes');
         
        
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
        $solicitud=Solicitudes::find($request->id_solicitud);
        $id=$solicitud->id;
        if ($solicitud->delete()) {
          //---------------registrando en bitacora------------
            $bitacora=new Bitacora();
            $bitacora->id_usuario=\Auth::getUser()->id;
            $bitacora->operacion="Eliminada solicitud con id ".$id;
            $bitacora->save();
            //---------fin de registro en bitacora---------------
            flash('Registro eliminado exitosamente!', 'success');
                return redirect()->back();
        } else {
            flash('No se pudo eliminar el registro, posiblemente esté siendo usada su información en otra área!', 'error');
                return redirect()->back();
        }
        
    }

    protected function generar_codigo(){

      $key='';
      $pattern="0123456789ABCDEF";
      $max=strlen($pattern)-1;
      for ($i=0; $i < 6; $i++) 
        $key.=$pattern{mt_rand(0,$max)};
      return $key;
      
    }

    public function buscar_solicitudes(Request $request)
    {
      //dd($request->all());
      if ($request->estado=="0") {
      $solicitudes= Solicitudes::whereBetween('fecha',[$request->desde,$request->hasta])->get();
      //dd("a");
      } else {
        //dd("b");
      $solicitudes= Solicitudes::whereBetween('fecha',[$request->desde,$request->hasta])->where('status',$request->estado)->get();
      }
      
        $cont=count($solicitudes);
        //dd($solicitudes);
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando solicitudes registradas";
        $bitacora->save();
        $hoy=date('Y-m-d');
        //---------fin de registro en bitacora---------------
        return view('solicitudes.index',compact('solicitudes','cont','hoy'));
    }
    protected function conexion()
    {
        $connected = @fopen("http://www.google.com:80/","r"); 

        if($connected) { return true; } else { return false; }
        
    }
}
