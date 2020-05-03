@extends('pdfs.partials.layout_horario')
@section('css')
<style>
  table{
    border-color: blue;
  }
  th {
    padding: 5px;
    border-color: #C0C0C0;
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
                        <strong>Empleado: </strong>{{$empleado->nombres}} {{$empleado->apellidos}} | {{$empleado->nacionalidad}}-{{$empleado->cedula}} .

                                        @foreach($horario as $k)
                                        
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $bloques[$i][$j]="ASIGNADO" @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        
                                        @endforeach

                                            <table border="1" style="width: 100%;" id="example2" class="">
                                            <thead>
                                                <tr bgcolor="#C0C0C0">
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<7;$j++)
                                                    <td style="font-size: 8">
                                                        {{ $bloques[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </tbody>
                                            </table>
                                        
@endsection