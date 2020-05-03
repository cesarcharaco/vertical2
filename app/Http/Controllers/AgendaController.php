<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Bloques;
use App\Espacios;
use Carbon\Carbon;
use App\Solicitudes;
use App\Bitacora;
class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$bloques= Bloques::where('dia','Lunes')->get();
        //$horas= array();
        $espacios=Espacios::all();
        
    
        //-------- asignando horas a la primera columna
        $k=1;
        for ($i=0; $i < 10; $i++) { 
            $b=Bloques::find($k);
            $bloques[$i][0]=$b->hora;
            $bloquesx[$i][0]="";
            $auditorio[$i][0]=$b->hora;
            $infocentro[$i][0]=$b->hora;
            $gimnasio[$i][0]=$b->hora;
            $deportes[$i][0]=$b->hora;
            $cultura[$i][0]=$b->hora;
            $cancha[$i][0]=$b->hora;
            //arreglos para colores
            $colora[$i][0]="#1E90FF";
            $colorb[$i][0]="#1E90FF";
            $colorc[$i][0]="#1E90FF";
            $colord[$i][0]="#1E90FF";
            $colore[$i][0]="#1E90FF";
            $colorf[$i][0]="#1E90FF";
            $colorg[$i][0]="#1E90FF";

            //----------------------
            $k+=7;
        }
        //---------------------------
        //----- inicializando la matriz en libre
        $k=1;//id_bloque
        for ($i=0; $i < 10; $i++) { 
            for ($j=1; $j <= 7; $j++) {
                
                 $bloques[$i][$j]="LIBRE"; 
                 $bloquesx[$i][$j]=$k;
                 $auditorio[$i][$j]="LIBRE";
                 $infocentro[$i][$j]="LIBRE";
                 $gimnasio[$i][$j]="LIBRE";
                 $deportes[$i][$j]="LIBRE";
                 $cultura[$i][$j]="LIBRE";
                 $cancha[$i][$j]="LIBRE";
                 //arreglo de  colores
                 $colora[$i][$j]="#FFFFFF";
                 $colorb[$i][$j]="#FFFFFF";
                 $colorc[$i][$j]="#FFFFFF";
                 $colord[$i][$j]="#FFFFFF";
                 $colore[$i][$j]="#FFFFFF";
                 $colorf[$i][$j]="#FFFFFF";
                 $colorg[$i][$j]="#FFFFFF";

                 //---------
                 $k++;
                 
            }
                 
        }
        $agenda=Agenda::where('permanente','Si')->get();
        $agenda_temporal=Agenda::where('permanente','No')->orderBy('id_solicitud')->get()->groupBy('id_solicitud');
        
        /*foreach ($agenda_temporal as $key) {
            echo $key[0]->espacios->id."----";
        }*/
        //--------------------------------
        //dd($colora);
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando la Agenda";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        return view('agenda.index',compact('valor','espacios','bloquesx','bloques', 'auditorio','infocentro','gimnasio','deportes','cultura','cancha','agenda','agenda_temporal','colora','colorb','colorc','colord','colore','colorf','colorg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function operaciones(Request $request)
    {
      if ($request->operacion=="Cancelada") {
        $agenda=Agenda::where('id_solicitud',$request->id_solicitud)->get();
        foreach ($agenda as $key) {
            $buscar=Agenda::find($key->id);
            $buscar->status="Cancelada";
            $buscar->save();    
        }

        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Cancelando la Actividad con id= ".$request->id_solicitud.", en la Agenda";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
        flash('<i class="icon-circle-check"></i> La Actividad  ha sido CANCELADA!')->success()->important();
       return redirect()->to('agenda');
      } else {
        $solicitud=Solicitudes::find($request->id_solicitud);
        $fecha=Carbon::parse($solicitud->fecha);
        $hoy=Carbon::now()->format('Y-m-d');
        if($fecha>$hoy){

        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Intentando cancelar actividad con id= ".$request->id_solicitud.",fuera de fecha de ejecución";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
            flash('<i class="icon-circle-check"></i> La Actividad no puede ser marcada como EJECUTADA, ya que aún no se ha llegado a la fecha de ejecución de la misma!')->warning()->important();
            return redirect()->to('agenda');
        }else{
        
            $agenda=Agenda::where('id_solicitud',$request->id_solicitud)->get();
            foreach ($agenda as $key) {
                $buscar=Agenda::find($key->id);
                $buscar->status="Ejecutada";
                $buscar->save();    
            }
            //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Marcando como ejecuatada la actividad con id= ".$request->id_solicitud.", en la agenda";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
            flash('<i class="icon-circle-check"></i> La Actividad ha sido EJECUTADA!')->success()->important();
           return redirect()->to('agenda');
        } 
        
      }
      
    }
}
