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
                    
                    <h3 class="title-5 m-b-35">Todas las visitas </h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                             <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <a style="text-decoration: none important!; color: white;" href="{{ route('visitas.index') }}"> Listado de Hoy</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('visitas.create') }}">Registrar</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.visitas') }}">PDF</a>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('visitas.search') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                    <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="fecha" class=" form-control-label"> Desde </label>
                                </div>
                                <div class="col col-md-3">
                                    <input type="date" id="desde" name="desde" value="{{$hoy}}" max="{{$hoy}}" class="form-control" required="required">
                                    <small class="form-text text-muted">  </small>
                                </div>
                            
                                <div class="col col-md-2">
                                    <label for="fecha" class=" form-control-label"> Hasta </label>
                                </div>
                                <div class="col col-md-3">
                                    <input type="date" id="hasta" name="hasta" value="{{$hoy}}" max="{{$hoy}}" class="form-control" required="required">
                                    <small class="form-text text-muted">  </small>
                                </div>
                         <button type="submit" class="btn btn-primary"> Buscar</button></div>

                            </div>

                        </form>                    


                    <div class="table-responsive table-responsive-data2">
                        <table id="dataTable9" class="table table-bordered table-striped">
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
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
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