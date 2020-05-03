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
                    
                    <h3 class="title-5 m-b-35">Solicitudes de Espacios</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">

                            @if(buscar_p('Solicitudes','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('solicitudes.create') }}">Registrar</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('solicitudes.index') }}">Buscar</a>
                            </button>
                            @endif
                             <button class="au-btn au-btn-icon au-btn--green au-btn--small" title="Ayuda en línea"  data-toggle="modal" data-target="#ayuda_solicitud"><i class="fa fa-question"></i>Ayuda</button>
                        </div>

                        <!-- Ruta de Navegación -->
                        <div class="table-data__tool-left" >
                        Vertical->Empleados->Listado
                        </div>
                        <!-- fin de la ruta -->
                    </div>
                </div>

        

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Solicitudes de Espacios</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead>
                                <tr>
                                    <th>Inicio</th>
                                    <th>Lugar</th>
                                    <th>Duración (horas)</th>
                                    <th>Nombre actividad</th>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if($cont==0)
                            	<tr class="tr-shadow">
                            		<td colspan="12" align="center"><b>Sin datos para mostrar</b></td>
                            	</tr>
                            	@else
                            	@foreach($solicitudes as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->bloques->dia}}-Hora: {{ $key->bloques->hora }}</td>
                                    <td>{{$key->espacios->espacio}} Piso: {{ $key->espacios->piso }}</td>
                                    <td>{{$key->num_bloques}}</td>
                                   
                                    <td>{{$key->nombre_actividad}}</td>
                                    <td>{{ $key->status }}</td>
                                    <td>{{ $key->permanente }}</td>
                                    <td>
                                        <div class="table-data-feature">

                                            <button   class="item" id="ver" onclick="ver('{{ $key->bloques->dia." Hora:".$key->espacios->hora }}','{{ $key->espacios->espacio." Piso: ".$key->espacios->piso }}','{{ $key->num_bloques." Hora(s)" }}','{{ $key->nombre_actividad }}','{{ \Carbon\Carbon::parse($key->fecha)->format('d/m/Y') }}','{{ $key->descripcion_actividad }}','{{ $key->num_asistentes." Máximo" }}','{{ $key->clientes->nombres." ".$key->clientes->apellidos }}','{{ $key->responsable }}')" title="Ver"  data-toggle="modal" data-target="#view">
                                           
                                                <i class="zmdi zmdi-eye"></i>
                                            </button>
                                            @if($key->status=="Pendiente")
                                            <button class="item" data-placement="top" title="Aprobar" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key->id }}','Aprobar')">
                                                <i class="zmdi zmdi-shield-check"></i>
                                            </button>
                                            <button class="item" data-placement="top" title="Negar" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key->id }}','Negar')">
                                                <i class="zmdi zmdi-tag-close"></i>
                                            </button>

                                            @endif
                                            @if($key->status=="Pendiente")
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <a href="{{ route('solicitudes.edit',$key->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            @endif
                                            @if($key->status=="Negado")
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item" title="Eiminar"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            @endif

                                        @if(buscar_p('Solicitudes','pdf')=="Si")
                                            <button class="item" title="Descargar PDF">
                                            <a href="{{ route('pdf.solicitud',$key->id) }}">
                                                <i class="zmdi zmdi-collection-pdf"></i></a>
                                            </button>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
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
   <!-- modal eliminar -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Eliminar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            </p>
                            {!! Form::open(['route' => ['solicitudes.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="text" name="id_solicitud" id="id_solicitud" >
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
            <!-- modal view -->
            <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="view">Solicitudes de espacios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                <div class="table-responsive table-responsive-data2">
                    <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Datos de la actividad</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Inicio
                                    </td>
                                    <td><span id="bloque"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Lugar
                                    </td>
                                    <td><span id="lugar"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Duración
                                    </td>
                                    <td><span id="duracion"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre de actividad
                                    </td>
                                    <td><span id="nombreactividad"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Responsable
                                    </td>
                                    <td><span id="responsable"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Fecha
                                    </td>
                                    <td><span id="fecha"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Descripción actividad
                                    </td>
                                    <td><span id="descripcionactividad"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        N° Asistentes
                                    </td>
                                    <td><span id="asistentes"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre cliente
                                    </td>
                                    <td><span id="nombrecliente"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            
                        </div>
                        <input type="hidden" name="id_solicitud" id="id_solicitud">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modale de view -->
        <!-- modal de aprobacion,negacion de solicitud -->
            <div class="modal fade" id="acciones" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> 
                                <span id="accion"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea <span id="accion2"></span>?
                            </p>
                            {!! Form::open(['route' => ['operaciones'], 'method' => 'POST']) !!}
                            <input type="hidden" name="id_solicitud" id="id_solicitud2" >
                            <input type="hidden" name="operacion" id="operacion">
                            <div id="motivo" style="display: none;">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    <label for="motivos" class=" form-control-label"><b style="color:red;">*</b> Motivos:</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="motivos" id="motivos" cols="10" rows="5" class="form-control"></textarea>
                                    <small class="form-text text-muted">Describa brevemente el o los motivos por los cuales se niega la solicitud</small>
                                </div>
                                </div>
                            </div>
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
            @include('ayuda.index')
@endsection

@section('scripts')
<script type="text/javascript">
    function eliminar(id_solicitud) {

        $("#id_solicitud").val(id_solicitud);
    }

    function ver(bloque,espacio,duracion,nombreactividad,fecha,descripcionactividad,num_asistentes,nombrecliente,responsable) {
    
        //console.log(data.length);
        $("#bloque").text(bloque);
        $("#lugar").text(espacio);
        $("#duracion").text(duracion);
        $("#nombreactividad").text(nombreactividad);
        $("#fecha").text(fecha);
        $("#descripcionactividad").text(descripcionactividad);
        $("#asistentes").text(num_asistentes);
        $("#nombrecliente").text(nombrecliente);
        $("#responsable").text(responsable);
    }

    function acciones(id_solicitud,accion) {
        
        if (accion=="Negar") {

        $("#accion").text(accion);
        $("#accion2").text(accion);
        $("#id_solicitud2").val(id_solicitud);
        $("#operacion").val(accion);
        $("#motivo").css('display','block');
        $("#motivos").attr('required',true);
        } else {

        $("#accion").text(accion);
        $("#accion2").text(accion);
        $("#id_solicitud2").val(id_solicitud);
        $("#operacion").val(accion);
        $("#motivo").css('display','none');
        $("#motivos").removeAttr('required');
        }
    }



</script>
@endsection

























