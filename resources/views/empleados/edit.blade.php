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

    	<div class="col-lg-12">

    		<div class="card">
                <div class="card-header">
                    <strong>Editar empleados </strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Empleados->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                </div>
                    {!! Form::open(['route' => ['empleados.update',$empleado->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    
                        @csrf
                <div class="card-body card-block">
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Nombre</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nombres" name="nombres" placeholder="Ronald" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" value="{{ $empleado->nombres }}">
                                <small class="form-text text-muted">Escribe tu nombre</small>
                            </div>
                        </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" ><b style="color:red;">*</b> Apellido</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="apellidos" name="apellidos" placeholder="Ramirez" class="form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ $empleado->apellidos }}">
                                <small class="form-text text-muted">Escribe tu apellido</small>
                            </div>
                        </div>
                        <!-- en caso de que el usuario no sea Admin -->
                        @if(\Auth::getUser()->tipo_usuario!=="Admin")
                         <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cédula</label>
                            </div>
                            <div class="col-9 col-md-1">
                                <input type="hidden" name="nacionalidad" id="nacionalidad" value="{{ $empleado->nacionalidad }}">
                                <input type="hidden" name="cedula" id="cedula" value="{{ $empleado->cedula }}">
                                <select name="nacionalidad_2" id="nacionalidad_2" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" disabled="disabled">
                                    <option value="V" @if($empleado->nacionalidad=="V") selected="selected" @endif >V </option>
                                    <option value="E" @if($empleado->nacionalidad=="E") selected="selected" @endif >E</option>
                                    <option value="G" @if($empleado->nacionalidad=="G") selected="selected" @endif >G</option>
                                   
                                </select>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="cedula_2" name="cedula_2" placeholder="27167436" disabled="disabled" title="Para modificar la cédula debe contactar al administrador"  maxlength="8" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ $empleado->cedula }}">
                                <small class="form-text text-muted">Escribe tu cedula</small>
                            </div>
                        </div>
                        @else
                            <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cédula</label>
                            </div>
                            <div class="col-9 col-md-1">
                                
                                <select name="nacionalidad" id="nacionalidad" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" >
                                    <option value="V" @if($empleado->nacionalidad=="V") selected="selected" @endif >V </option>
                                    <option value="E" @if($empleado->nacionalidad=="E") selected="selected" @endif >E</option>
                                    <option value="G" @if($empleado->nacionalidad=="G") selected="selected" @endif >G</option>
                                   
                                </select>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="cedula" name="cedula" placeholder="27167436" title="Para modificar la cédula debe contactar al administrador"  maxlength="8" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ $empleado->cedula }}">
                                <small class="form-text text-muted">Escribe tu cedula</small>
                            </div>
                        </div>

                        @endif
                         <!-- fin del caso -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label"><b style="color:red;">*</b>Email</label>
                            </div>
                            @if(\Auth::getUser()->tipo_usuario!=="Admin")
                            <div class="col-12 col-md-9">
                                <input type="email" id="correo_2" title="Para modificar el correo debe hacerlo desde su perfil" name="correo2" placeholder="ejemplo@gmail.com" disabled="disabled" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ $empleado->correo }}">
                                <small class="help-block form-text">Ingresa tu correo</small>
                                <input type="hidden" name="correo" id="correo" value="{{ $empleado->correo }}">
                            </div>
                            @else
                                <div class="col-12 col-md-9">
                                <input type="email" id="correo" name="correo" placeholder="ejemplo@gmail.com"  class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ $empleado->correo }}">
                                <small class="help-block form-text">Ingresa tu correo</small>
                                
                            </div>
                            @endif
                        </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"> Teléfono</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="local" name="local" placeholder="04142342464" class="form-control {{ $errors->has('local') ? ' is-invalid' : '' }}" value="{{ $empleado->local }}">
                                <small class="form-text text-muted">Escribe tu teléfono</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"> Movil</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="movil" placeholder="Ronald" class="form-control {{ $errors->has('movil') ? ' is-invalid' : '' }}" value="{{ $empleado->movil}}">
                                <small class="form-text text-muted">Escribe tu movil</small>
                            </div>
                        </div>
                        
                       <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cargo</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_cargo" id="select" class="form-control {{ $errors->has('id_cargo') ? ' is-invalid' : '' }}">
                                    @foreach($cargos as $k)
                                    <option value="{{ $k->id }}" @if($k->id==$empleado->id_cargo) selected="selected" @endif >{{ $k->cargo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($usuario=="No")
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label"> Acceso</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="acceso" class="form-check-label ">
                                            <input type="checkbox" id="acceso" name="acceso" value="Si" @if($empleado->acceso=="Si") checked="checked" @endif class="form-check-input">
                                            Seleccione si tendrá acceso al sistema
                                        </label>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        @else

                            <div class="row form-group">
                            <div class="col col-md-7">
                                <label class=" form-control-label"> <b>Para modificar los datos de su usuario diríjase al módulo de Usuarios</b></label>
                            </div>
                            
                        </div>
                        @endif
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
            </div>
          {!! Form::close() !!}
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
