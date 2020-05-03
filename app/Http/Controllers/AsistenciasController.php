<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use App\Espacios;
use App\Asistencia;
use App\Horarios;
use Carbon\Carbon;
use App\Bitacora;
class AsistenciasController extends Controller
{
    public function asistencias_empleados()
    {
    	
    	
    	$empleados= Empleados::all();

        $cont=count($empleados);
        $fecha=date('Y-m-d');
        $hoy=date('Y-m-d');

        $dia=dia(date('D'));

        foreach ($empleados as $key) {
        $encontrado=0;
            foreach($key->asistencia as $key2) {
                if ($key2->fecha==$fecha) {
                    $encontrado++;
                }
            }
            if ($encontrado==0) {
                $asistencia=new Asistencia();
                $asistencia->fecha=$fecha;
                $asistencia->hora="00:00:00";
                $asistencia->id_empleado=$key->id;
                $asistencia->status="No Asistió";
                $asistencia->save();
            }
            
        }
        //dd($empleados->all());
        //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Listando las Asistencias del día";
        $bitacora->save();
        //---------fin de registro en bitacora---------------
    	return view('asistencias.index',compact('dia','empleados','cont','fecha','hoy'));
   }

   public function asistencia_marcar(Request $request)
    {
 
       // dd($request->all());
        if ($request->opcion=="Marcar") {
            $buscar=Asistencia::where('id_empleado',$request->id_empleado)->where('fecha',$request->fecha)->first();
            if (isset($buscar)) {
                $asistencia= Asistencia::find($buscar->id); 
                $asistencia->hora=date('H:i:s');
                $asistencia->status='Asistió';
                $asistencia->save(); 
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::user()->id;
                $bitacora->operacion="Marcando como Asistió al empleado con id=".$request->id_empleado;
                $bitacora->save();
                //---------fin de registro en bitacora---------------   
            } else {
             
            $asistencia= new Asistencia(); 
            $asistencia->fecha=$request->fecha;
            $asistencia->hora=date('H:i:s');
            $asistencia->status='Asistió';
            $asistencia->id_empleado=$request->id_empleado;
            $asistencia->save();
                //---------------registrando en bitacora------------
                $bitacora=new Bitacora();
                $bitacora->id_usuario=\Auth::user()->id;
                $bitacora->operacion="Marcando como Asistió al empleado con id=".$request->id_empleado;
                $bitacora->save();
                //---------fin de registro en bitacora---------------   

            }
                flash('<i class="icon-circle-check"></i> Asistencia Registrada')->success()->important();
                if ($request->fecha==date('Y-m-d')) {
                    return redirect()->to('asistencias/empleados');        
                } else {
                    return redirect()->to('inasistencias/anteriores/'.$request->fecha.'/retorno');
                }
                
            
        } else {
            $asistencia=Asistencia::where('id_empleado',$request->id_empleado)->where('fecha',date('Y-m-d'))->first();
            if ($request->falto=="con") {
                $buscar=Asistencia::find($asistencia->id);
                $buscar->status="No Asistió (con justificativo)";
                $buscar->motivo=$request->motivo;
                $buscar->save();
                flash('<i class="icon-circle-check"></i> Fué Marcada Inasistencia con Justificativo')->success()->important();
            
            } else {
                $buscar=Asistencia::find($asistencia->id);
                $buscar->status="No Asistió";
                $buscar->save();
                flash('<i class="icon-circle-check"></i> Fue Marcada Inasistencia sin Justificativo')->success()->important();
            
            }
            if ($request->fecha==date('Y-m-d')) {
                    return redirect()->to('asistencias/empleados');        
                } else {
                    return redirect()->to('inasistencias/anteriores/'.$request->fecha.'/retorno');
                }
        }
        
        
               
        
   }

public function inasistencias(Request $request)
{
    $empleados= Empleados::where('created_at','<=',$request->fecha)->get();

    //dd($empleados);
    foreach ($empleados as $key) {
    $encontrado=0;
        foreach($key->asistencia as $key2) {
            if ($key2->fecha==$request->fecha) {
                $encontrado++;
            }
        }
        if ($encontrado==0) {
            $asistencia=new Asistencia();
            $asistencia->fecha=$request->fecha;
            $asistencia->hora="00:00:00";
            $asistencia->id_empleado=$key->id;
            $asistencia->status="No Asistió";
            $asistencia->save();
        }
        
    }
    $empleados= Empleados::where('created_at','<=',$request->fecha)->get();    
    $cont=count($empleados);
    $fecha=$request->fecha;
    $dia=dia(date('D'));

    return view('asistencias.index',compact('dia','empleados','cont','fecha'));
    }

    public function retorno_anteriores($fecha)
    {
        $empleados= Empleados::where('created_at','<=',$fecha)->get();

    //dd($empleados);
    foreach ($empleados as $key) {
    $encontrado=0;
        foreach($key->asistencia as $key2) {
            if ($key2->fecha==$fecha) {
                $encontrado++;
            }
        }
        if ($encontrado==0) {
            $asistencia=new Asistencia();
            $asistencia->fecha=$fecha;
            $asistencia->hora="00:00:00";
            $asistencia->id_empleado=$key->id;
            $asistencia->status="No Asistió";
            $asistencia->save();
        }
        
    }
    $empleados= Empleados::where('created_at','<=',$fecha)->get();    
    $cont=count($empleados);
    
    $dia=dia(date('D'));
        return view('asistencias.index',compact('dia','empleados','cont','fecha'));
    }

    
}
