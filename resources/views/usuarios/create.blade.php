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
                        <strong>Registro de usuarios </strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Administración->Usuarios->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->


                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                      
                    <div class="card-body card-block">
                    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Nombres</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Ronald" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe sus nombres</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label"><b style="color:red;">*</b> Correo </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="email" name="email" placeholder="ejemplo@gmail.com" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escriba su correo electronico</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label"><b style="color:red;">*</b> Contraseña </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input id="password" title="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. Puede tener otros símbolos." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small class="form-text text-muted">Escriba su contraseña, ejemplo: w3Unpocodet0d0 w3Unpot0d0</small>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label"><b style="color:red;">*</b>Confirme Contraseña </label>
                                </div>

                                <div class="col-12 col-md-9">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <small class="form-text text-muted">Confirme la contraseña</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"><b style="color:red;">*</b>Tipo de Usuario</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                                       
                                        <option value="Telecomunicaciones">Telecomunicaciones</option>
                                        <option value="Cultura">Cultura</option>
                                        <option value="Deporte">Deporte</option>
                                        <option value="Administración">Administración</option>
                                        <option value="Coordinación">Coordinación</option>
                                        <option value="Recepción">Recepción</option>
                                       
                                    </select>
                                    <small class="form-text text-muted">Seleccione el tipo se usuario</small>
                                </div>
                            </div>

                             
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b>Pregunta de seguridad</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="pregunta" name="pregunta" placeholder="Ingrediente favorito de la pizza" value="{{ old('pregunta') }}" class="form-control {{ $errors->has('pregunta') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe tu seguridad</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Respuesta</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="respuesta" name="respuesta" placeholder="Queso" value="{{ old('respuesta') }}" class="form-control {{ $errors->has('respuesta') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe tu respuesta</small>
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

