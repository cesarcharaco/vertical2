@extends('pdfs.partials.layout_bitacora')
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

<table id="User" border="1" style="width: 100%;">>
  <tr>
    <th>Usuario</th>
    <th>Operaciones</th>
    <th>Fecha/hora</th>
    
</tr>
    @if($cont==0)
        <tr class="tr-shadow">
          <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
        </tr>
      @else
        @foreach($bitacora as $key)
        <tr class="tr-shadow">
          <td style="font-size: 8">{{ $key->usuarios->email }}</td>
          <td style="font-size: 8">{{ $key->operacion }}</td>
                    
<td style="font-size: 8">{{ \Carbon\Carbon::parse($key->created_at)->format('d/m/Y H:i:s a') }}</td>

                  </tr>
        @endforeach
    @endif
</table>
@endsection