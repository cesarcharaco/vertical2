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
        @include('flash::message')
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
                        <strong>Registro de Atletas</strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Atletas->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->


                         <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>
                    </div>

                     
                    <div class="card-body card-block">
                    <form action="{{ route('atletas.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b>Nombre </label>
                                </div>
                                <div class="col-12 col-md-6">
                                   <input type="text" id="nombres" name="nombres" placeholder="Ronald" value="{{ old('nombres') }}" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe sus nombres</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b>Apellidos </label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="apellidos" name="apellidos" placeholder="Ramirez" value="{{ old('apellidos') }}" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe sus apellidos</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-1">

                                    <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cédula </label>
                                </div>
                                <div class="col-9 col-md-1">
                                    <select name="nacionalidad" id="select" class="form-control" >
                                        <option value="V">V </option>
                                        <option value="E">E</option>
                                        <option value="G">G</option>
                                       
                                    </select>
                                </div>
                                <div class="col-8 col-md-5">
                                    <input type="text" id="cedula" name="cedula" placeholder="27167436"class="form-control soloNumeros" max="8" maxlength="8" value="{{ old('cedula') }}" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe tu cedula</small>
                                </div>
                            </div>
                                <!-- init productos entregar-->
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="select" class=" form-control-label"><b style="color:red;">*</b>Productos a Entregar</label>

                                </div>
                                <div class="col col-md-1">
                                    
                                </div>
                               
                                <div class="col col-md-6">
                                    <table class="table table-striped" >
                                        <tr>
                                            <td colspan="2"><small class="form-text text-muted">Debe seleccionar al menos uno</small></td>
                                        </tr>
                                    @foreach($productos as $key)
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="id_producto" name="id_producto[]" value="{{ $key->id }}" class="form-control">
                                            </td>
                                            <td>
                                                <label for="producto" class=" form-control-label">{{ $key->nombre }}</label>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                            <!-- END productos entregar-->
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
</div>


@endsection

