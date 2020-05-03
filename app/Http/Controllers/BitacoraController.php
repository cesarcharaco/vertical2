<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
class BitacoraController extends Controller
{
    
    public function index()
    {
    	$bitacora=Bitacora::all();
        $plus=1;
    	$cont=count($bitacora);


    	return view('bitacora.index',compact('bitacora','cont','plus'));
    }

    public function vaciar()
    {
    	\DB::statement("SET foreign_key_checks=0");
    	$bitacora=Bitacora::truncate();
    	\DB::statement("SET foreign_key_checks=1");

    	flash('Bitácora vaciada con éxito!', 'success');
                return redirect()->back();
    }
    public function filtro_fecha(Request $request)
    {
        //dd($request->all());
        $bitacora = Bitacora::select('bitacora.created_at','bitacora.id_usuario','bitacora.operacion')
                ->whereBetween('bitacora.created_at', [$request->fecha_desde, $request->fecha_hasta])->get();
        $hallado=count($bitacora);
        $cont=0;
        //dd($cont);
        return view('bitacora.index', compact('bitacora','hallado','cont'));
    }
}
