<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use App\Atletas;
use App\Productos;
use App\Categorias;
use App\Cargos;
use App\Solicitudes;
use App\Bloques;
use App\Clientes;
use App\Espacios;
use App\Horarios;
use App\Visitas;
use App\Bitacora;
use App\Asistencia;
use PDF;
class PdfController extends Controller
{
    
    public function mostrar_empleados()
    {
    	
    	$empleados=Empleados::all();
    	$cont=count($empleados);
    	$pdf = PDF::loadView('pdfs/reportes/empleados', array('empleados'=>$empleados, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Empleados.pdf');
    }

    public function mostrar_atletas()
    {
    	
    	$atletas=Atletas::all();
    	$cont=count($atletas);
    	$pdf = PDF::loadView('pdfs/reportes/atletas', array('atletas'=>$atletas, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Atletas.pdf');
    }

    public function mostrar_clientes()
    {
        
        $clientes=Clientes::all();
        $cont=count($clientes);
        $pdf = PDF::loadView('pdfs/reportes/clientes', array('clientes'=>$clientes, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Clientes.pdf');
    }


    public function mostrar_productos()
    {
    	
    	$productos=Productos::all();
    	$cont=count($productos);
    	$pdf = PDF::loadView('pdfs/reportes/productos', array('productos'=>$productos, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Productos.pdf');
    }

    public function mostrar_categorias()
    {
    	
    	$categorias=Categorias::all();
    	$cont=count($categorias);
    	$pdf = PDF::loadView('pdfs/reportes/categorias', array('categorias'=>$categorias, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Categorias.pdf');
    }

        public function mostrar_cargos()
    {
    	
    	$cargos=Cargos::all();
    	$cont=count($cargos);
    	$pdf = PDF::loadView('pdfs/reportes/cargos', array('cargos'=>$cargos, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Cargos.pdf');
    }
    
    public function mostrar_solicitud($id_solicitud)
    {
        
        $solicitud=Solicitudes::find($id_solicitud);
        $id_bloque=$solicitud->id_bloque+($solicitud->num_bloques*7);
        $bloque_final=Bloques::find($id_bloque);
        $pdf = PDF::loadView('pdfs/reportes/solicitud', array('solicitud'=>$solicitud,'bloque_final' => $bloque_final));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_solicitud.pdf');
    }

    public function mostrar_horario($id_empleado)
    {
        
//-------- asignando horas a la primera columna
        $k=1;
        for ($i=0; $i < 10; $i++) { 
            $b=Bloques::find($k);
            $bloques[$i][0]=$b->hora;
            $bloquesx[$i][0]="";
            $k+=6;
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
        $empleado=Empleados::find($id_empleado);
        $horario=Horarios::where('id_empleado',$id_empleado)->get();
        $pdf = PDF::loadView('pdfs/reportes/horarios', 
            array('horario' => $horario,
                'bloques' => $bloques,
                'bloquesx' => $bloquesx,
                'empleado' => $empleado));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Horario_Empleado.pdf');
    }

        public function mostrar_visitas()
    {
        
        $visitas=Visitas::all();
        $cont=count($visitas);
        $pdf = PDF::loadView('pdfs/reportes/visitas', array('visitas'=>$visitas, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Visitas.pdf');
    }

        public function mostrar_bitacora()
    {
        
        $bitacora=Bitacora::all();
        $cont=count($bitacora);
        $pdf = PDF::loadView('pdfs/reportes/bitacora', array('bitacora'=>$bitacora, 'cont'=>$cont));
        //$pdf->getDomPDF()->get_option('enable_html5_parser');

            return $pdf->stream('Reporte_de_Bitacora.pdf');
    }

    public function pdf_asistencias(Request $request)
    {
        //dd($request->all());
        //$asistencia=Asistencia::where('fecha',$request->fecha)->get();
        $empleados= Empleados::where('created_at','<=',$request->fecha)->get();
        $cont=count($empleados);
        $fecha=$request->fecha;
        $fechas=strtotime($fecha);
        $dia=dia(date('D',$fechas));

        $pdf = PDF::loadView('pdfs/reportes/asistencia', array('empleados' => $empleados,'cont' => $cont,'fecha' => $fecha,'dia' => $dia));
        return $pdf->stream('Reporte_de_Asistencia.pdf');
    }

}
