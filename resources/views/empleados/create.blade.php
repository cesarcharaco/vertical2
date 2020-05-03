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
                        <strong>Registro de Empleados </strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Empleados->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->



                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Nombre</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="nombres" name="nombres" placeholder="Ronald" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" value="{{ old('nombres') }}" >
                                    <small class="form-text text-muted">Escribe sus nombres</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Apellidos</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="apellidos" name="apellidos" placeholder="Ramirez" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ old('apellidos') }}">
                                    <small class="form-text text-muted">Escribe sus apellidos</small>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="cedula" class=" form-control-label"><b style="color:red;">*</b>Cédula</label>
                                </div>
                                <div class="col-9 col-md-1">
                                    <select name="nacionalidad" id="nacionalidad" class="form-control">
                                        <option value="V">V </option>
                                        <option value="E">E</option>
                                        <option value="G">G</option>
                                       
                                    </select>
                                </div>
                                <div class="col-8 col-md-9">
                                    <input type="text" id="cedula" name="cedula" placeholder="27167436" class="form-control soloNumeros {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}" max="8" maxlength="8">
                                    <small class="form-text text-muted">Escribe tu cedula</small>
                                    
                                </div>
                            </div>
                             
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="email" class=" form-control-label"><b style="color:red;">*</b>Email</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="email" id="correo" name="correo" placeholder="example@gmail.com" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ old('correo') }}">
                                    <small class="help-block form-text">Ingresa tu email</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="telefono" class=" form-control-label"><b style="color:red;">*</b> Teléfono</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="local" name="local" placeholder="Numero telefonico" class="form-control {{ $errors->has('local') ? ' is-invalid' : '' }}" value="{{ old('local') }}" max="11" maxlength="11">
                                    <small class="form-text text-muted">Escribe tu teléfono</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="movil" class=" form-control-label"><b style="color:red;">*</b> Movil</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <input type="text" id="movil" name="movil" placeholder="Numero telefonico" class="form-control {{ $errors->has('movil') ? ' is-invalid' : '' }}" value="{{ old('movil') }}" max="11" maxlength="11">
                                    <small class="form-text text-muted">Escribe tu teléfono</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="cargo" class=" form-control-label"><b style="color:red;">*</b>Cargo</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <select name="id_cargo" id="id_cargo" class="form-control">
                                        @foreach($cargos as $k)
                                        @if($k->cargo!="Administrador")
                                        <option value="{{ $k->id }}">{{ $k->cargo }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione un cargo para el empleado</small>
                                </div>
                            </div>  
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label class=" form-control-label"> Acceso</label>
                                </div>
                                <div class="col col-md-10">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="acceso" class="form-check-label ">
                                                <input type="checkbox" id="acceso" name="acceso" value="Si" class="form-check-input">
                                                Seleccione si tendrá acceso al sistema
                                            </label>
                                        </div>
                                                                                
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-12">
                                    <div id="registro_usuario" style="display: none">
                                        <div class="row form-group">
                                        <div class="col col-md-2">
                                        <label for="tipo_user" class=" form-control-label"><b style="color:red;">*</b> Tipo de Usuario</label>
                                        </div>
                                        <div class="col-12 col-md-10">
                                        <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                                            <option value="Telecomunicaciones">Telecomunicaciones</option>
                                            <option value="Cultura">Cultura</option>
                                            <option value="Deporte">Deporte</option>
                                            <option value="Administración">Administración</option>
                                            <option value="Coordinación">Coordinación</option>
                                            <option value="Recepción">Recepción</option>
                                        </select>
                                        <small class="form-text text-muted">Seleccione el tipo de usuario</small>
                                        </div>
                                        </div>
                                        <div class="row form-group">
                                        <div class="col col-md-2">
                                        <label for="clave" class=" form-control-label"><b style="color:red;">*</b> Clave</label>
                                        </div>
                                        <div class="col-12 col-md-10">
                                        <input type="password" id="password" name="password" class="form-control">
                                        <small class="form-text text-muted">Escribe clave de acceso</small>
                                        </div>
                                        </div>
                                        <div class="row form-group">
                                        <div class="col col-md-2">
                                        <label for="clave" class=" form-control-label"><b style="color:red;">*</b> Reescriba Clave</label>
                                        </div>
                                        <div class="col-12 col-md-10">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                        <small class="form-text text-muted">Vuelva a escribir la clave para confirmación</small>
                                        </div>
                                        </div>
                                        <div class="row form-group">
                                        <div class="col col-md-2">
                                        <label for="pregunta" class=" form-control-label"><b style="color:red;">*</b> Pregunta de Seguridad</label>
                                        </div>
                                        <div class="col-12 col-md-10">
                                        <input type="text" id="pregunta" name="pregunta" class="form-control" placeholder="Nombre de mi Mascota">
                                        <small class="form-text text-muted">Escribe su pregunta de seguridad</small>
                                        </div>
                                        </div>
                                        <div class="row form-group">
                                        <div class="col col-md-2">
                                        <label for="respuesta" class=" form-control-label"><b style="color:red;">*</b> Respuesta</label>
                                        </div>
                                        <div class="col-12 col-md-10">
                                        <input type="password" id="respuesta" name="respuesta" class="form-control">
                                        <small class="form-text text-muted">Escriba su respuesta de seguridad</small>
                                        </div>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                           
                      <div class="row">
                      	<div class="col-12 col-md-12" align="right">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Enviar
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Limpiar
                        </button>
                    </div>

                    </div>
                </form>
                </div>
			</div>
    	</div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">
        
        $(document).ready( function(){
            $("#acceso").on("change",function (event) {
                
                if( $('#acceso').is(':checked') ) {
                    $("#registro_usuario").css('display','block');
                    $("#password").attr('required',true);
                    $("#password_confirmation").attr('required',true);
                    $("#pregunta").attr('required',true);
                    $("#respuesta").attr('required',true);
                }else{
                    $("#registro_usuario").css('display','none');
                    $("#password").removeAttr('required');
                    $("#password_confirmation").removeAttr('required');
                    $("#pregunta").removeAttr('required');
                    $("#respuesta").removeAttr('required');
                }
                     
            });
        });
    </script>
@endsection
