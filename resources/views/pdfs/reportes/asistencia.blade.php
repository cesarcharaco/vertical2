
<!DOCTYPE html>
<html>

<body>
<h3 align="center" class="title-5 m-b-35"> Asistencias de empleados - fecha: {{ $fecha  }}</h3>
                    
                    
            <table border="1" style="width: 95%;">
            <thead>
                <tr>
                    
                    <th align="center">Nombres</th>
                    <th align="center">Apellidos</th>
                    <th align="center">Cédula</th>
                    <th align="center">Hora</th>
                    <th align="center">Status</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
             @if($cont==0)
                <tr class="tr-shadow">
                    <td colspan="9" align="center"><b>Sin datos para mostrar</b></td>
                </tr>
                @else
                @foreach($empleados as $key)
                @if(buscar_empleado_horario($key->id,$dia)>0)
                <tr class="tr-shadow">
                   
                
                    <td style="font-size: 8" align="center">{{$key->nombres}}</td>
                    <td style="font-size: 8" align="center">{{$key->apellidos}}</td>
                    <td td style="font-size: 8" class="desc" align="center">{{$key->nacionalidad}}-{{$key->cedula}}</td>


                    @forelse($key->asistencia as $k)
                        @if($k->fecha==$fecha)
                            <td style="font-size: 8" align="center">{{ $k->hora }}</td>
                            <td style="font-size: 8" align="center">{{ $k->status }}</td>
                            <td style="font-size: 8" align="center">{{ $k->motivo }}</td>
                        @endif
                    @empty
                        <td></td>
                        <td>Aún Sin Marcar</td>
                    @endforelse
                    
                </tr>
                
                @endif
                @endforeach
           
            @endif

            

            </tbody>
        </table>
</body>
</html>

                    
                    