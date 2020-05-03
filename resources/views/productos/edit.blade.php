@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Editar Productos </strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Productos->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                </div>
                
                    {!! Form::open(['route' => ['productos.update',$producto->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                        @csrf
                <div class="card-body card-block">
                        
                        <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nombre" class=" form-control-label"> <b style="color:red;">*</b> Nombre</label>
                                </div>
                                <div class="col-12 col-md-9">
                                   <input type="text" id="nombre" name="nombre" placeholder="Productos" value="{{ $producto->nombre }}" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe el nombre</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="stock" class=" form-control-label"> <b style="color:red;">*</b> Stock <b style="color:red;">*</b></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="stock" name="stock" placeholder="Ramirez" required maxlength="5" value="{{ $producto->stock }}" class="form-control {{ $errors->has('stock') ? ' is-invalid' : '' }}">
                                    <small class="form-text text-muted">Escribe el stock existente</small>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="codigo" class=" form-control-label"> <b style="color:red;">*</b> Código </label>
                                </div>
                            
                                <div class="col-8 col-md-9">
                                    <input type="number" id="codigo" name="codigo" placeholder="2343436" value="{{ $producto->codigo }}" class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}">
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
                                        <option value="{{ $k->id }}" @if($k->id==$producto->id_categoria) selected="selected" @endif >{{ $k->categoria }}</option>
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
            </div>
          {!! Form::close() !!}
          </div>
        </div>
      </div>
     </div>

                                           

@endsection