@extends('pdfs.partials.layout')
@section('css')
<style>
  th {
    padding: 5px;
  }
  td{
  	text-align: center;
  	font-size: ;
  	padding: 5px;
  	height: 100px;
  }
</style>
@endsection

@section('content')
<h3>Lista de Cargos</h3>

<table id="cargos" border="1">
	<tr>
    <th>Cargos</th>
    
</tr>
		@if($cont==0)
	    	<tr class="tr-shadow">
	    		<td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
	    	</tr>
    	@else
				@foreach($cargos as $key)
        <tr class="tr-shadow">
					<td>{{$key->cargo}}</td>
        </tr>            
				@endforeach
		@endif
</table>
@endsection