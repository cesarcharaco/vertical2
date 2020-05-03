@extends('pdfs.partials.layout_empleados')
@section('css')
<style>
  th {
    padding: 5px;
  }
  td{
  	text-align: center;
  	font-size: ;
  	padding: 5px;
  	height: 10px;
  }
</style>
@endsection

@section('content')

<table id="empleados" border="1" style="width: 100%;">>
	<tr>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Cédula</th>
    <th>Correo</th>
    <th>Móvil</th>
    <th>Local</th>
    <th>Cargo</th>
    
</tr>
		@if($cont==0)
	    	<tr class="tr-shadow">
	    		<td colspan="19" align="center"><b>Sin datos para mostrar</b></td>
	    	</tr>
    	@else
				@foreach($empleados as $key)
        <tr class="tr-shadow">
					<td style="font-size: 8">{{$key->nombres}}</td>
                    <td style="font-size: 8">{{$key->apellidos}}</td>
                    <td style="font-size: 8" class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>
                    <td style="font-size: 8"><span class="block-email">{{$key->correo}}</span></td>
                    <td style="font-size: 8">{{$key->movil}}</td>
                    <td style="font-size: 8">{{$key->local}}</td>
                    <td style="font-size: 8">{{$key->cargos->cargo}}</td>
                  </tr>
				@endforeach
		@endif
</table>
@endsection