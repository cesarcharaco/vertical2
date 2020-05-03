@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>
        <div class="col-lg-12">
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
        
            <div class="card">
                <div class="card-header">
                    <strong>Editar cliente </strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Clientes->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->


                </div>
                
                   {!! Form::open(['route' => ['clientes.update',$cliente->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}

                        @csrf
                <div class="card-body card-block">
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Nombre</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nombres" placeholder="Ronald" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" value="{{ $cliente->nombres }}">
                                <small class="form-text text-muted">Escribe tu nombre</small>
                            </div>
                        </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" > <b style="color:red;">*</b>Apellido</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="apellidos" placeholder="Ramirez" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ $cliente->apellidos }}">
                                <small class="form-text text-muted">Escribe tu apellido</small>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cédula</label>
                            </div>
                            <div class="col-9 col-md-1">
                                <select name="nacionalidad" id="select" class="form-control  {{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}">
                                    <option value="V" @if($cliente->nacionalidad=="V") selected="selected" @endif >V </option>
                                    <option value="E" @if($cliente->nacionalidad=="E") selected="selected" @endif >E</option>
                                    <option value="G" @if($cliente->nacionalidad=="G") selected="selected" @endif >G</option>
                                   
                                </select>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="cedula" placeholder="27167436" required maxlength="8" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ $cliente->cedula }}">
                                <small class="form-text text-muted">Escribe tu cédula</small>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Teléfono</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="local" name="telefono" placeholder="04142342464" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ $cliente->telefono }}">
                                <small class="form-text text-muted">Escribe tu teléfono</small>
                            </div>
                        </div>
                        <div class="row form-group">
                                 <div class="col col-md-3">
                                    <label for="correo" class=" form-control-label"><b style="color:red;">*</b> Correo</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="correo" name="correo" placeholder="Ej: micorreo@gmail.com" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ $cliente->correo }}">
                                    <small class="form-text text-muted">Escribe tu correo</small>
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