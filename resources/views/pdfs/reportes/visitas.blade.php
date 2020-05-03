@extends('pdfs.partials.layout_visitas')
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

<table id="Clientes" border="1" style="width: 100%;">>
  <tr>
    <th>Nombres</th>
    <th>Cédula</th>
    <th>Espacio</th>
    <th>Entrada</th>
    <th>Salida</th>
    <th>Fecha</th>
    
</tr>
    @if($cont==0)
        <tr class="tr-shadow">
          <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
        </tr>
      @else
        @foreach($visitas as $key)
        <tr class="tr-shadow">
          <td style="font-size: 8">{{$key->nombres}}</td>
                    
                    <td style="font-size: 8" class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>
                    <td style="font-size: 8">{{$key->espacios->espacio}}</td>

                    <td style="font-size: 8">{{$key->entrada}}</td>
                    <td style="font-size: 8">{{$key->salida}}</td>
<td style="font-size: 8"> {{ \Carbon\Carbon::parse($key->fecha)->format('d/m/Y') }}</td>


                  </tr>
        @endforeach
    @endif
</table>
@endsection