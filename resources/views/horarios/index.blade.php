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
                    
                    <h3 class="title-5 m-b-35">Lista de horarios</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">

                            @if(buscar_p('Horarios,'Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('horarios.create') }}">Registrar</a>
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Bloque</th>
                                    <th>Empleados</th>
                                   

                                    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            	@foreach($horarios as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->id_bloque}}</td>
                                    <td>{{$key->id_empleado}}</td>
                                    
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Enviar">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>   
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <a href="{{ route('horarios.edit',$key->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item" title="Eliminar"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Más">
                                                <i class="zmdi zmdi-more"></i>
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
                            {!! Form::open(['route' => ['horarios.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="hidden" name="id_empleado" id="id_empleado" >
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
    function eliminar(id_empleado) {

        $("#id_empleado").val(id_empleado);
    }
</script>
@endsection