<?php

function meses($mes)
{
	$m="";
	switch ($mes) {
		case '1':
			$m="Enero";
			break;
		case '2':
			$m="Febrero";
			break;
		case '3':
			$m="Marzo";
			break;
		case '4':
			$m="Abril";
			break;
		case '5':
			$m="Mayo";
			break;
		case '6':
			$m="Junio";
			break;
		case '7':
			$m="Julio";
			break;
		case '8':
			$m="Agosto";
			break;
		case '9':
			$m="Septiembre";
			break;
		case '10':
			$m="Octubre";
			break;
		case '11':
			$m="Noviembre";
			break;
		case '12':
			$m="Diciembre";
			break;

	}
	return $m;
}

function dia($dia)
{
	$m="";
	switch ($dia) {
		case 'Mon':
			$m="Lunes";
			break;
		case 'Tue':
			$m="Martes";
			break;
		case 'Wed':
			$m="Miércoles";
			break;
		case 'Thu':
			$m="Jueves";
			break;
		case 'Fri':
			$m="Viernes";
			break;
		case 'Sat':
			$m="Sábado";
			break;
		case 'Sun':
			$m="Domingo";
			break;
	

	}
	return $m;
}






function modulos($menu)
{
	$modulos=App\Modulos::where('menu',$menu)->get();

	return $modulos;
}

function cuenta()
{
	$modulos=App\Modulos::all();	
	$cuantos = count($modulos);
	return $cuantos;
}

function buscar_p($modulo,$privilegio)
{
	$hallado="No";
	$modulo=App\Modulos::where('modulo',$modulo)->first();
	$privilegio=App\Privilegios::where('privilegio',$privilegio)->where('id_modulo',$modulo->id)->first();
	foreach ($privilegio->usuarios as $key) {
		
		if ($key->pivot->id_usuario==\Auth::getUser()->id) {
			$hallado=$key->pivot->status;
		}
	}
	return $hallado;
}

function buscar_p2($modulo,$privilegio,$id_usuario)
{
	$hallado="No";
	$modulo=App\Modulos::where('modulo',$modulo)->first();
	$privilegio=App\Privilegios::where('privilegio',$privilegio)->where('id_modulo',$modulo->id)->first();
	foreach ($privilegio->usuarios as $key) {
		
		if ($key->pivot->id_usuario==$id_usuario) {
			$hallado=$key->pivot->status;
		}
	}
	return $hallado;
}

function buscar_horario($id_empleado){
	$hallado=0;
	$buscar=App\Horarios::where('id_empleado',$id_empleado)->first();
		if (!is_null($buscar)>0) {
			$hallado=1;
		}
	return $hallado;

}
function buscar_empleado_horario($id_empleado,$dia){

	$hallado=0;
	$buscar=App\Horarios::where('id_empleado',$id_empleado)->get();
		if (!is_null($buscar)>0) {
			foreach ($buscar as $key) {
			if ($key->bloques->dia==$dia) {
			
			$hallado++;
				# code...
			}
			} 
		}
	return $hallado;	
}

function buscar_status($id_empleado,$status,$fecha){

	$buscar=App\Asistencia::where('id_empleado',$id_empleado)->where('status',$status)->where('fecha',$fecha)->first();
	$hallado=0;
		if ($buscar !== null) {
		$hallado++;
		}

	return $hallado;
}

function confirmando_clave_admin($clave)
{

	//$clave=bcrypt($clave);
	$hallado=0;
	$usuario=App\User::where('tipo_usuario','Admin')->where('password',$clave)->get();
	if(\Hash::check($clave, $$usuario->password)){

		$hallado=1;
	}
	/*if (count($usuario)>0) {
	}*/

	return $hallado;

}

function solicitudes_espacio()
{
	$hallado=0;
	$solicitud=App\Solicitudes::where('status','Pendiente')->get();
	$hallado=count($solicitud);

	return $hallado;
}

function productos_atletas($id_atleta){

	
	$productos=\DB::table('productos')->join('atletas_has_productos','atletas_has_productos.id_producto','=','productos.id')->join('atletas','atletas.id','=','atletas_has_productos.id_atleta')->select('productos.nombre',\DB::raw('productos.nombre' ))->where('atletas.id',$id_atleta)->groupby('productos.nombre')->orderby('productos.id','DESC')->get();
	//dd($productos);
	return $productos;


}