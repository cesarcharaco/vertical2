@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
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
                        <strong>Registro de Productos</strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Productos->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                         <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>.
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Nombre</label>
                                </div>
                                <div class="col-12 col-md-9">
                                   <input type="text" id="nombre" name="nombre" placeholder="Productos" value="{{ old('nombre') }}" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe el Nombre del Producto</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Stock <b style="color:red;">*</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" name="stock" placeholder="Ramirez" required maxlength="5" value="{{ old('stock') }}" class="form-control {{ $errors->has('stock') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe el stock existente</small>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"> <b style="color:red;">*</b> Código </label>
                                </div>
                            
                                <div class="col-8 col-md-8">
                                    <input type="number" id="text-input" name="codigo" placeholder="2343436" value="{{ old('codigo') }}" class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Código del producto</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="categoria" class=" form-control-label"><b style="color:red;">*</b>Categoría</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_categoria" id="id_categoria" class="form-control">
                                        @foreach($categorias as $k)
                                        <option value="{{ $k->id }}">{{ $k->categoria }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione una categoría del producto</small>
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

