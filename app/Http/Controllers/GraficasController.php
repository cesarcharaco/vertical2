<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Empleados;
use App\Clientes;
use App\Espacios;
use App\Solicitudes;
use App\Visitas;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados=Empleados::all();
        $clientes=Clientes::all();
        $espacios=Espacios::all();
        $visitas=Visitas::groupBy('cedula')->get();

        return view('graficas.index', compact('empleados','clientes','espacios','visitas'));
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

    if($request->num_bloques == 'asistencia'){
        $asistio = Asistencia::select('asistencias.created_at','asistencias.status')
                ->whereBetween('asistencia.created_at', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['asistencia.status','Asistió'],['asistencia.id_empleado',$request->id_empleado]])->count();

        $noasistio = Asistencia::select('asistencias.created_at','asistencias.status')
                ->whereBetween('asistencia.created_at', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['asistencia.status','No asistió'],['asistencia.id_empleado',$request->id_empleado]])->count();

        $noasistio_j = Asistencia::select('asistencias.created_at','asistencias.status')
                ->whereBetween('asistencia.created_at', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['asistencia.status','No Asistió (con justificativo)'],['asistencia.id_empleado',$request->id_empleado]])->count();

                if($request->tipo_grafica == 'barras'){
                    $chartjs = app()->chartjs
                    ->name('barChartTest')
                    ->type('bar')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels(['Estadísticas de asistencia por empleados'])
                    ->datasets([
                        [
                            "label" => "Asistió",
                            'backgroundColor' => ['rgba(54, 162, 235, 0.2)'],
                            'data' => [$asistio]
                        ],
                        [
                            "label" => "No asistió",
                            'backgroundColor' => ['rgba(255, 99, 132, 0.3)'],
                            'data' => [$noasistio]
                        ],
                        [
                            "label" => "No Asistió (con justificativo)",
                            'backgroundColor' => ['rgba(255, 99, 00, 0.3)'],
                            'data' => [$noasistio_j]
                        ]
                    ])
                    ->options([]);
                }

               

                if($request->tipo_grafica == 'pastel'){
                    $chartjs = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels(['Asistió','No Asistió','No Asistió (con justificativo)'])
                    ->datasets([
                        [
                        "label" => "Asistió",
                        'backgroundColor' => ['rgba(54, 162, 235, 0.2)','rgba(255, 99, 132, 0.3)','rgba(255, 99, 00, 0.3)'],
                        'hoverBackgroundColor' => ['rgba(54, 162, 235, 0.2)','rgba(255, 99, 132, 0.3)','rgba(255, 99, 00, 0.3)'],
                        'data' => [$asistio,$noasistio,$noasistio_j]
                        ]
                    ])
                    ->options([]);
                }

                    $empleados=Empleados::all();
                    $empleado=Empleados::find($request->id_empleado);
                    $desde=$request->fecha_desde;
                    $hasta=$request->fecha_hasta;
                    
                    return view('graficas.show', compact('chartjs','empleados','empleado','desde','hasta'));
        }

        if($request->num_bloques == 'solicitudes'){
            $pendiente = Solicitudes::select('solicitudes.fecha','solicitudes.status')
                ->whereBetween('solicitudes.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['solicitudes.status','Pendiente'],['solicitudes.id_cliente',$request->id_cliente]])
                ->count();

            $aprobada = Solicitudes::select('solicitudes.fecha','solicitudes.status')
                ->whereBetween('solicitudes.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['solicitudes.status','Aprobado'],['solicitudes.id_cliente',$request->id_cliente]])
                ->count();

            $negada = Solicitudes::select('solicitudes.fecha','solicitudes.status')
                ->whereBetween('solicitudes.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where([['solicitudes.status','Negado'],['solicitudes.id_cliente',$request->id_cliente]])
                ->count();

                if($request->tipo_grafica == 'barras'){

                    $chartjs = app()->chartjs
                    ->name('barChartTest')
                    ->type('bar')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels(['Estadísticas de solicitudes por clientes'])
                    ->datasets([
                        [
                            "label" => "Pendientes",
                            'backgroundColor' => ['rgba(54, 162, 235, 0.2)'],
                            'data' => [$pendiente]
                        ],
                        [
                            "label" => "Aprobadas",
                            'backgroundColor' => ['rgba(255, 99, 132, 0.3)'],
                            'data' => [$aprobada]
                        ],
                        [
                            "label" => "Negadas",
                            'backgroundColor' => ['rgba(255, 99, 00, 0.3)'],
                            'data' => [$negada]
                        ]
                    ])
                    ->options([]);
                }

                if($request->tipo_grafica == 'pastel'){
                    $chartjs = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels(['Pendientes','Aprobadas','Negadas'])
                    ->datasets([
                        [
                        'backgroundColor' => ['rgba(54, 162, 235, 0.2)','rgba(255, 99, 132, 0.3)','rgba(255, 99, 00, 0.3)'],
                        'data' => [$pendiente,$aprobada,$negada]
                        ]
                    ])
                    ->options([]);
                }
                    $clientes=Clientes::all();
                    $cliente=Clientes::find($request->id_cliente);
                    $desde=$request->fecha_desde;
                    $hasta=$request->fecha_hasta;
        return view('graficas.show_solicitudes', compact('chartjs','clientes','cliente','desde','hasta'));
        }

        if($request->num_bloques == 'visitas'){


            $espacio1=Espacios::find(1);
            $espacio2=Espacios::find(2);
            $espacio3=Espacios::find(3);
            $espacio4=Espacios::find(4);
            $espacio5=Espacios::find(5);


            $visita1 = Visitas::select('visitas.fecha','visitas.cedula','visitas.id_espacio')
                ->whereBetween('visitas.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('visitas.cedula',$request->visitante)
                ->where('visitas.id_espacio',1)
                ->count();

            $visita2 = Visitas::select('visitas.fecha','visitas.cedula','visitas.id_espacio')
                ->whereBetween('visitas.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('visitas.cedula',$request->visitante)
                ->where('visitas.id_espacio',2)
                ->count();

            $visita3 = Visitas::select('visitas.fecha','visitas.cedula','visitas.id_espacio')
                ->whereBetween('visitas.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('visitas.cedula',$request->cedula)
                ->where('visitas.id_espacio',3)
                ->count();

            $visita4 = Visitas::select('visitas.fecha','visitas.cedula','visitas.id_espacio')
                ->whereBetween('visitas.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('visitas.cedula',$request->cedula)
                ->where('visitas.id_espacio',4)
                ->count();

            $visita5 = Visitas::select('visitas.fecha','visitas.cedula','visitas.id_espacio')
                ->whereBetween('visitas.fecha', [$request->fecha_desde, $request->fecha_hasta])
                ->where('visitas.cedula',$request->cedula)
                ->where('visitas.id_espacio',5)
                ->count();

                if($request->tipo_grafica == 'barras'){
                    $chartjs = app()->chartjs
                    ->name('barChartTest')
                    ->type('bar')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels(['Estadísticas de visitas por cliente'])
                    ->datasets([
                        [
                            "label" => $espacio1->espacio,
                            'backgroundColor' => ['rgba(54, 162, 235, 0.2)'],
                            'data' => [$visita1]
                        ],
                        [
                            "label" => $espacio2->espacio,
                            'backgroundColor' => ['rgba(255, 99, 132, 0.3)'],
                            'data' => [$visita2]
                        ],
                        [
                            "label" => $espacio3->espacio,
                            'backgroundColor' => ['rgba(255, 99, 00, 0.3)'],
                            'data' => [$visita3]
                        ],
                        [
                            "label" => $espacio4->espacio,
                            'backgroundColor' => ['rgba(54, 162, 230, 0.2)'],
                            'data' => [$visita4]
                        ],
                        [
                            "label" => $espacio5->espacio,
                            'backgroundColor' => ['rgba(54, 162, 190, 0.2)'],
                            'data' => [$visita5]
                        ]
                    ])
                    ->options([]);

                }

                if($request->tipo_grafica == 'pastel'){
                    $chartjs = app()->chartjs
                    ->name('pieChartTest')
                    ->type('pie')
                    ->size(['width' => 800, 'height' => 400])
                    ->labels([$espacio1->espacio,$espacio2->espacio,$espacio3->espacio,$espacio4->espacio,$espacio5->espacio])
                    ->datasets([
                        [
                        'backgroundColor' => ['rgba(54, 162, 235, 0.2)','rgba(255, 99, 132, 0.3)','rgba(255, 99, 00, 0.3)','rgba(82, 142, 10, 0.2)','rgba(124, 62, 150, 0.2)'],
                        'hoverBackgroundColor' => ['rgba(54, 162, 235, 0.2)','rgba(255, 99, 132, 0.3)','rgba(255, 99, 00, 0.3)','rgba(54, 162, 230, 0.2)','rgba(54, 162, 190, 0.2'],
                        'data' => [$visita1,$visita2,$visita3,$visita4,$visita5]
                        ]
                    ])
                    ->options([]);
                }


                    $clientes=Clientes::all();
                    $cliente=Clientes::find($request->id_cliente);
                    $desde=$request->fecha_desde;
                    $hasta=$request->fecha_hasta;
        return view('graficas.show_visitas', compact('chartjs','clientes','cliente','desde','hasta'));
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
}
