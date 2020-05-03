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
                    
                    <h3 class="title-5 m-b-35">Lista empleados</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            @if(buscar_p('Empleados','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('empleados.create') }}">Registrar</a>
                            </button>
                            @endif

                            @if(buscar_p('Empleados','pdf')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.empleados') }}">PDF</a>
                            </button>
                            @endif
                            @if(buscar_p('Horarios','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('horarios.create') }}">Registrar Horario</a>
                            </button>
                            @endif
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" title="Ayuda en línea"  data-toggle="modal" data-target="#ayuda_empleados"><i class="fa fa-question"></i>Ayuda</button>
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
                        <div class="card-header"><i class="fa fa-user"></i> Lista Empleados</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cédula</th>
                                    <th>Correo</th>
                                    <th>Móvil</th>
                                    <th>Local</th>
                                    <th>Acceso</th>
                                    <th>Cargo</th>                                    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($empleados as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->nombres}}</td>
                                    <td>{{$key->apellidos}}</td>
                                    <td class="desc">{{$key->nacionalidad}}-{{$key->cedula}}</td>
                                    <td><span class="block-email">{{$key->correo}}</span></td>
                                    <td>{{$key->movil}}</td>
                                    <td>{{$key->local}}</td>
                                    <td><span class="status--process">{{$key->acceso}}</span></td>
                                    <td>{{$key->cargos->cargo}}</td>
                                    <td>
                                        <div class="">
                                            @if(buscar_p('Empleados','Editar')=="Si")
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <a href="{{ route('empleados.edit',$key->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            @endif

                                            @if(buscar_p('Empleados','Eliminar')=="Si")   
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item"  data-toggle="modal" data-target="#staticModal"  title="Eliminar">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            @endif
                                            @if(buscar_horario($key->id)==1)
                                            @if(buscar_p('Horarios','Editar')=="Si")   
                                            <button   class="item" title="Editar Horario"  name="Editar">
                                                <a href="{{ route('horarios.edit',$key->id) }}"><i class="zmdi zmdi-brush"></i></a>
                                            </button>

                                            @endif
                                            @if(buscar_p('Horarios','Ver')=="Si")   
                                            <button   class="item" title="Ver Horario"  name="Ver">
                                                <a href="{{ route('horarios.show',$key->id) }}"><i class="zmdi zmdi-eye"></i></a>
                                            </button>
                                            
                                            @endif
                                            @if(buscar_p('Horarios','pdf')=="Si")
                                                <button class="item" >
                                                <a style="text-decoration: none important!; color: white;" href="{{ route('pdf.horario',$key->id) }}"><i class="zmdi zmdi-collection-pdf"></i></a>
                                                </button>
                                                @endif  
                                            @endif
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
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Eliminar empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <!-- colocar atributos data-toggle y data-target y el ultimo que llame a claveroot 
                                y borrar rl formulario completo-->
                            <button type="button"  data-toggle="modal" data-target="#claveroot" class="btn btn-primary">Confirmar</button>
                        </div>
                        
                    </div>
                </div>
            </div>

   <!-- modal static -->
            <div class="modal fade" id="claveroot" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Eliminación de un Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                            {!! Form::open(['route' => ['empleados.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="hidden" name="id_empleado" id="id_empleado" >
                        

                            <div class="row form-group">
                                <div class="col col-md-1">
                                    
                                </div>                        

                                <div class="col-12 col-md-9">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Contraseña de Administrador</label>
                                   <input type="password" id="clave" name="clave" class="form-control" required="required">
                                    <small class="form-text text-muted">Escribe la contraseña e administrador para validar la eliminación</small>
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

<!-- end modal vista empleados -->


@include('ayuda.index')
@endsection

@section('scripts')
<script type="text/javascript">
    function eliminar(id_empleado) {

        $("#id_empleado").val(id_empleado);

    }
</script>
@endsection