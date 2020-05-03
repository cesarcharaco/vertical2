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
                    
                    <h3 class="title-5 m-b-35">Lista Visitas de Hoy</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            @if(buscar_p('Visitas','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('visitas.create') }}">Registrar</a>
                            @endif
                            </button>
                           <!-- @if(buscar_p('Empleados','pdf')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.empleados') }}">PDF</a>
                            @endif
                            </button>-->
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('visitas_todas') }}"> Mostrar todas</a>
                            </button>
                        </div>

                        <!-- Ruta de Navegación -->
                        <div class="table-data__tool-left" >
                        Administración->Visitas->Listado
                        </div>
                        <!-- fin de la ruta -->
                    </div>


                    </div>

                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Lista Visitas de Hoy</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead>
                                <tr>
                                    
                                    <th>Nombres</th>
                                    <th>Cedula</th>
                                    <th>Espacio</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitas as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->nombres}}</td>
                                    <td class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>
                                    <td>{{$key->espacios->espacio}}</td>
                                    <td>{{$key->entrada}}</td>
                                    <td>{{$key->salida}}</td>
            <td>{{ \Carbon\Carbon::parse($key->fecha)->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if($key->salida=="")
                                            <button onclick="salida('{{ $key->id }}')" class="item" title="Marcar Salida"  data-toggle="modal" data-target="#staticModal2">
                                                <i class="zmdi zmdi-eject"></i>
                                            </button>
                                            @endif
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item" title="Eliminar"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            
                                         
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                            {!! Form::open(['route' => ['visitas.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="hidden" name="id_visita" id="id_visita" >
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
<!-- modal static2 -->
            <div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Salida</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea marcar la salida?
                            </p>
                            {!! Form::open(['route' => ['visitas.update',1], 'method' => 'PUT']) !!}
                            <input type="hidden" name="id_visita" id="id_visita2" >
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







@endsection

@section('scripts')
<script type="text/javascript">
    function eliminar(id_visita) {

        $("#id_visita").val(id_visita);
    }
    function salida(id_visita) {

        $("#id_visita2").val(id_visita);
    }
</script>
@endsection