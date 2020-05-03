@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>
        <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-dange">
            <p>Corrige los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    
                    <h3 class="title-5 m-b-35"> Asistencias de empleados - fecha: {{ $fecha }}</h3>
                    <div class="table-data__tool">
                        <div class="row">
                        <div class="col col-md-12">
                            <form action="{{ route('inasistencias') }}" method="POST">
                                @csrf
                        <div class="form-group"> 
                                <input type="date" class="form-control" name="fecha" value="{{$fecha}}" max="{{date('Y-m-d')}}">
                        <button type="submit" class="au-btn au-btn--green au-btn--small" >
                        Cargar asistencia anterior
                        </button>
                            </div>
                            </form>
                        
                        </div>
                         </div>
                        
                    </div>
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Asistencias De Empleados
                                <div align="right">
                            @if(buscar_p('Asistencia de Empleados','pdf')=="Si")
                            <form action="{{ route('pdf.asistencias')}}" method="post">
                                @csrf
                                <input type="hidden" name="fecha" value="{{$fecha}}">
                            <input type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" value="PDF">
                            </form>
                            @endif
                            </div>

                        </div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead>
                                <tr>
                                    
                                    <th>Empleado</th>
                                    <th>Cédula</th>
                                    <th>Hora</th>
                                    <th>Status</th>
                                    <th>Motivo</th>
                                    <th>Opciones</th>
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
                                   
                                
                                    <td>{{$key->nombres}} {{$key->apellidos}}</td>
                                    <td class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>

                                    @forelse($key->asistencia as $k)
                                        @if($k->fecha==$fecha)
                                            <td>{{ $k->hora }}</td>
                                            <td>{{ $k->status }}</td>
                                            <td>{{ $k->motivo }}</td>
                                        @endif
                                    @empty
                                        <td></td>
                                        <td>Aún Sin Marcar</td>
                                    @endforelse
                                    <td>
                                    <div class="form-group">
                                    {{-- <input  type="checkbox"  class="form-control" onclick="asistir({{$key->id}},'{{ $fecha }}')" name="asistio" id="asistio" value="{{$key->id}}" data-toggle="modal" data-target="#staticModal" @if(buscar_status($key->id,'Asistió',$fecha)==1) checked="checked" @endif > --}}
                                    {{-- <small class="form-text text-muted">Marcar o Desmarcar para colocar asistencia del empleado</small> --}}
                                    @if(buscar_status($key->id,'Asistió',$fecha)==1)
                                    <button class="au-btn2 au-btn-icon au-btn--red au-btn--small"  id="no_asistio" data-toggle="modal" data-target="#staticModal" onclick="no_asistir({{$key->id}},'{{ $fecha }}','Desmarcar')" >
                                    <i class="zmdi zmdi-check"></i><font color="#FFFFFF">MARCAR COMO NO ASISTIÓ</font>
                                    </button>
                                    @else
                                    <button class="au-btn au-btn-icon au-btn--blue2 au-btn--small"  id="asistio" data-toggle="modal" data-target="#staticModal" onclick="asistir({{$key->id}},'{{ $fecha }}','Marcar')" >
                                    <i class="zmdi zmdi-check"></i><font color="#FFFFFF">MARCAR COMO ASISTIÓ</font>
                                    </button>
                                    @endif
                                    </div>    

                                    </td>
                                </tr>
                                
                                @endif
                                @endforeach
                           
                            @endif

                            
                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
   <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Marcar Asistencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que <span id="opcion"></span> la asistencia?
                            </p>
                            <br>    
                            
                            {!! Form::open(['route' => ['asistencia.marcar'], 'method' => 'POST']) !!}
                            <div id="inasistencia" style="display: none;">
                               
                                <div class="row form-group">
                                   <div class="col col-md-2">
                                    <label for="texto" class=" form-control-label">El empleado faltó...</label>
                                    </div>
                                <div class="col col-md-3">
                                <label for="con" class="form-check-label ">
                                    <input type="radio" class="form-check-input" name="falto" id="falto_con" value="con">Con Justificativo
                                </label>
                                </div>
                                <div class="col col-md-3">
                                <label for="con" class="form-check-label ">
                                    <input type="radio" id="falto_sin" checked="checked" class="form-check-input" name="falto" value="sin">Sin Justificativo
                                </label>
                                </div>
                                <div class="col col-md-3">
                                <label for="con" class="form-check-label ">
                                    <label for="texto" class=" form-control-label">Motivo</label><input type="text" class="form-control" disabled="disabled" name="motivo" id="motivo">
                                </label>
                                </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_empleado" id="id_empleado" >
                            <input type="hidden" name="opcion" id="opcion2">
                            <input type="hidden" name="fecha" id="fecha">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- end modal static -->

<!-- end modal vista empleados -->

@endsection

@section('scripts')
<script type="text/javascript">
    
    function asistir(id_empleado,fecha,opcion) {
        
        $("#opcion").text(opcion);
        $("#opcion2").val(opcion); 
        $("#fecha").val(fecha);
        $("#id_empleado").val(id_empleado);
    }
    function no_asistir(id_empleado,fecha,opcion) {
    
        $("#inasistencia").css('display','block');
        $("#opcion").text(opcion);
        $("#opcion2").val(opcion);               
        $("#fecha").val(fecha);
        $("#id_empleado").val(id_empleado);
    }

    $("#falto_con").on('change',function(){
        if ($("#falto_con").is(':checked')) {
            $("#motivo").removeAttr('disabled');
            $("#motivo").attr('required',true);
        } 
    });
    $("#falto_sin").on('change',function(){ 

        if($("#falto_sin").is(':checked')) {
            $("#motivo").attr('disabled',true);
            $("#motivo").removeAttr('required');
        }
    });
</script>
@endsection