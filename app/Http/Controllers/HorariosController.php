<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horarios;
use App\Empleados;
use App\Bloques;
use App\Bitacora;
class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($horarios);
        return redirect()->to('horarios/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloques=Bloques::where('dia','Lunes')->get();

        $empleados=Empleados::all();
        return view('horarios.create',compact('bloques','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       $contar=0;
    if ($request->lunes==1) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','lunes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del lunes

    
       
    if ($request->martes==2) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','martes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del martes

    if ($request->miercoles==3) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','miercoles')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del miercoles

    if ($request->jueves==4) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','jueves')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del jueves

    if ($request->viernes==5) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','viernes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del viernes
//dd($request->sabado);
    if ($request->sabado==6) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','sabado')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del sabado

    if ($request->domingo==7) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','domingo')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        for ($i=0; $i < $request->num_bloques; $i++) { 
            $horario=new Horarios();
            $horario->id_bloque=$id_bloque;
            $horario->id_empleado=$request->id_empleado;
            $horario->save();
            $id_bloque+=7;

        }
    } else {
        $contar++;
    }//fin if del domingo
    if ($contar==7) {
         flash('<i class="icon-circle-check"></i> No ha seleccionado ningun DÍA para agregar el Horario!')->warning()->important();
       return redirect()->back();
    } else {
         //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Horario registrado para empleado con id ".$request->id_empleado;
        $bitacora->save();
        //---------fin de registro en bitacora---------------
         flash('<i class="icon-circle-check"></i> Horario registrado exitosamente!')->success()->important();
       return redirect()->to('empleados');
    }
    
    }//fin de la funcion store

    /**
     * | the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //-------- asignando horas a la primera columna
        $k=1;
        for ($i=0; $i < 10; $i++) { 
            $b=Bloques::find($k);
            $bloques[$i][0]=$b->hora;
            $bloquesx[$i][0]="";
            $k+=7;
        }
        //----- inicializando la matriz en libre
        $k=1;//id_bloque
        for ($i=0; $i < 10; $i++) { 
            for ($j=1; $j <= 7; $j++) {
                
                 $bloques[$i][$j]="LIBRE"; 
                 $bloquesx[$i][$j]=$k;
                 $k++;
                 
            }
                 
        }
        $empleado=Empleados::find($id);
        $horario=Horarios::where('id_empleado',$id)->get();
        return view('horarios.show',compact('empleado','bloques','bloquesx','horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //-------- asignando horas a la primera columna
        $k=1;
        for ($i=0; $i < 10; $i++) { 
            $b=Bloques::find($k);
            $bloques[$i][0]=$b->hora;
            $bloquesx[$i][0]="";
            $k+=7;
        }
        //----- inicializando la matriz en libre
        $k=1;//id_bloque
        for ($i=0; $i < 10; $i++) { 
            for ($j=1; $j <= 7; $j++) {
                
                 $bloques[$i][$j]="LIBRE"; 
                 $bloquesx[$i][$j]=$k;
                 $k++;
                 
            }
                 
        }
        $empleado=Empleados::find($id);
        $horario=Horarios::where('id_empleado',$id)->get();
        $bloques2=Bloques::where('dia','Lunes')->get();
        return view('horarios.edit',compact('bloques2','empleado','bloques','bloquesx','horario'));
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
        $contar=0;$contar2=0;
    if ($request->lunes==1) {
        $buscar=Bloques::where('dia','lunes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;

        //buscando si el bloque ya esta asignado
        $lunes=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $lunes++;
            }
            $id_bloque+=7;
        }
        if ($lunes==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=6;

            }
        } else {
            $contar2++;
        }
        
    } else {
        $contar++;
    }//fin if del lunes

    
       
    if ($request->martes==2) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','martes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $martes=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $martes++;
            }
            $id_bloque+=7;
        }
        if ($martes==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        $contar++;
    }//fin if del martes

    if ($request->miercoles==3) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','miercoles')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $miercoles=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $miercoles++;
            }
            $id_bloque+=7;
        }
        if ($miercoles==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        $contar++;
    }//fin if del miercoles

    if ($request->jueves==4) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','jueves')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $jueves=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $jueves++;
            }
            $id_bloque+=7;
        }
        if ($jueves==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        $contar++;
    }//fin if del jueves

    if ($request->viernes==5) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','viernes')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $viernes=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $viernes++;
            }
            $id_bloque+=7;
        }
        if ($viernes==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        $contar++;
    }//fin if del viernes

    if ($request->sabado==6) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','sabado')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $sabado=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $sabado++;
            }
            $id_bloque+=7;
        }
        if ($sabado==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        
        $contar++;
    }//fin if del sabado
    if ($request->domingo==7) {
        //buscar id_bloque de inicio
        $buscar=Bloques::where('dia','domingo')->where('hora',$request->hora)->first();
        $id_bloque=$buscar->id;
        //buscando si el bloque ya esta asignado
        $domingo=0;
        for ($i=0; $i < $request->num_bloques ; $i++) { 
            $buscar_h=Horarios::where('id_bloque',$id_bloque)->where('id_empleado',$id)->first();
            if (!is_null($buscar_h)) {
                $domingo++;
            }
            $id_bloque+=7;
        }
        if ($domingo==0) {
            
            //buscar id_bloque de inicio
            $id_bloque=$buscar->id;
            for ($i=0; $i < $request->num_bloques; $i++) { 
                $horario=new Horarios();
                $horario->id_bloque=$id_bloque;
                $horario->id_empleado=$id;
                $horario->save();
                $id_bloque+=7;

            }
        } else {
            $contar2++;
        }
        
    } else {
        
        $contar++;
    }//fin if del domingo
//dd($contar);
    if ($contar2>0) {
    flash('<i class="icon-circle-check"></i> Seleccionó bloques que ya estan asignados!')->warning()->important();
       return redirect()->back();
    } else {
        if ($contar==7) {
            flash('<i class="icon-circle-check"></i> No ha seleccionado ningún DÍA para asignar el horario!')->warning()->important();
       return redirect()->back();
        } else {
             //---------------registrando en bitacora------------
        $bitacora=new Bitacora();
        $bitacora->id_usuario=\Auth::getUser()->id;
        $bitacora->operacion="Actualizando horario del empleado con id ".$id;
        $bitacora->save();
        //---------fin de registro en bitacora---------------
         flash('<i class="icon-circle-check"></i> Horario registrado exitosamente!')->success()->important();
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
    public function destroy($id)
    {
        //
    }
}
