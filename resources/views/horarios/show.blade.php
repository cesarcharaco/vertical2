@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>
    	<div class="col-md-12">

         @if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Horario del empleado: </strong>{{$empleado->nombres}} {{$empleado->apellidos}} | {{$empleado->nacionalidad}}-{{$empleado->cedula}} .

                            @if(buscar_p('Horarios','pdf')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.horario',$empleado->id) }}">PDF</a>
                            </button>
                            @endif                        
                    </div>
                     
                    <div class="card-body card-block">
                           
                        	<!-- inicio -->
                                        @foreach($horario as $k)
                                        
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $bloques[$i][$j]="ASIGNADO" @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td>
                                                        {{ $bloques[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                            
                </div>
			</div>
    	</div>
    </div>
</div>


@endsection

