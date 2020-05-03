@extends('pdfs.partials.layout_atletas')
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


<table id="atletas" border="1" style="width: 100%;">
	<tr>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Cédula</th>
    
</tr>
		@if($cont==0)
	    	<tr class="tr-shadow">
	    		<td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
	    	</tr>
    	@else
				@foreach($atletas as $key)
        <tr class="tr-shadow">
					<td style="font-size: 8">{{$key->nombres}}</td>
                    <td style="font-size: 8">{{$key->apellidos}}</td>
                    <td style="font-size: 8" class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>
         </tr>           
				@endforeach
		@endif
</table>
@endsection