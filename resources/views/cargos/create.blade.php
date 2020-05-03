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
                        <strong>Registro de Cargos </strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Cargos->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('cargos.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Nombre del cargo</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="cargo" name="cargo" placeholder="Gerente" value="{{ old('cargos') }}" class="form-control {{ $errors->has('cargo') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe su cargo</small>
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

