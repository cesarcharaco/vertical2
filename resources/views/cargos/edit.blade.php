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
                    <strong>Editar cargos</strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Cargos->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                </div>
                    {!! Form::open(['route' => ['cargos.update',$cargo->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    
                        @csrf
                <div class="card-body card-block">
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Nombre del cargo</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="cargo" name="cargo" placeholder="Escribe el cargo" class="form-control {{ $errors->has('cargo') ? ' is-invalid' : '' }}" value="{{ $cargo->cargo }}">
                                <small class="form-text text-muted">Escribe tu cargo</small>
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