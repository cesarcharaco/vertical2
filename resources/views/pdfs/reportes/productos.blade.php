@extends('pdfs.partials.layout_productos')
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

<table id="productos" border="1" style="width: 100%;">
	<tr>
    <th>Nombre</th>
    <th>Stock</th>
    <th>Codigo</th>
    
</tr>
		@if($cont==0)
	    	<tr class="tr-shadow">
	    		<td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
	    	</tr>
    	@else
				@foreach($productos as $key)
        <tr class="tr-shadow">
				<td style="font-size: 8">{{$key->nombre}}</td>
        <td style="font-size: 8">{{$key->stock}}</td>
        <td style="font-size: 8">{{$key->codigo}}</td>
        </tr>            
                    
				@endforeach
		@endif
</table>
@endsection