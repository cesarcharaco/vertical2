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
                        <strong>Entrada de Visitantes</strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Administración->Visitas->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('visitas.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                    <label for="select" class=" form-control-label"><b style="color:red;">*</b>Espacio </label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <select name="id_espacio" id="id_espacio" class="form-control" required="required">
                                        @foreach($espacios as $k)
                                        <option value="{{ $k->id }}">{{ $k->espacio }} - Piso: {{ $k->piso }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione el espacio que desea utilizar para la actividad</small>
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