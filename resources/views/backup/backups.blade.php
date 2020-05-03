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
                    
                    <h3 class="title-5 m-b-35">Lista de Respaldos</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            {{-- @if(buscar_p('Respaldos','Backup')=="Si") --}}
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ url('backup/create') }}">Crear Respaldo</a></button>
                            {{-- @endif --}}

                                

                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                      <th>Archivo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($backups as $backup)
                        <tr>
                            <td>{{ substr($backup,15) }}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-info" target="_blank" href="{{ route('backup.download', substr($backup,15)) }}">
                                    Descargar
                                </a>
                                <a class="btn btn-xs btn-primary" href="{{ route('backup.restore', substr($backup,15)) }}">
                                    Restaurar
                                </a>
                                <a class="btn btn-xs btn-danger" data-button-type="delete" onclick="eliminar('{{substr($backup,15)}}')" data-target="#staticModal" data-toggle="modal" href="#" >
                                    Borrar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No hay respaldos realizados</td>
                        </tr>
                    @endforelse
                            </tbody>
                        </table>
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
                            <h5 class="modal-title" id="staticModalLabel"> Eliminar Respaldo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            {!! Form::open(['route' => ['cargos.destroy',1033], 'method' => 'DELETE']) !!}
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" data-target="#claveroot" data-toggle="modal" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- end modal eliminar -->

   <!-- modal static para ingreso de clave de superusuario-->
            <div class="modal fade" id="claveroot" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Eliminar Respaldo</h5>

                        </div>
                        <div class="modal-body">
                            <p>                        
                            @if(buscar_p('Respaldos','Eliminar')=="Si")
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @endif
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            {!! Form::open(['route' => ['backup.delete'], 'method' => 'POST']) !!}
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <input type="hidden" name="archivo" id="archivo" >        
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
@endsection

@section('scripts')
<script type="text/javascript">
    function eliminar(archivo) {
        console.log(archivo);
        $("#archivo").val(archivo);
    }

</script>
@endsection