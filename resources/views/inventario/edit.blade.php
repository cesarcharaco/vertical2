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
                    <strong>Retirar Productos de Inventario </strong> . <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>
                </div>
                    {!! Form::open(['route' => ['retiros'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    
                        @csrf
                <div class="card-body card-block">
                        
                       <div class="row form-group">
                               
                                <div class="col col-md-6">
                                    <table class="table table-striped table-earning" >
                                        <tr>
                                            <th colspan="3"><label for="select" class=" form-control-label"><b style="color:red;">*</b>Productos a Retirar</label><br><small class="form-text text-muted">Debe seleccionar al menos uno</small></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Producto</th>
                                            <th>Existencia</th>
                                        </tr>
                                    @foreach($productos as $key)
                                        <tr>
                                            <td>
                                                <input  type="checkbox" id="id_producto" name="id_producto[]" value="{{ $key->id }}" class="form-control">
                                            </td>
                                            <td>
                                                <label for="producto" class=" form-control-label">{{ $key->nombre }}</label>
                                            </td>
                                            <td>
                                                <label for="existencia" class=" form-control-label">{{ $key->stock }}</label>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    </table>
                                </div>
                        </div>
                        <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="observacion" class=" form-control-label">Observación</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <textarea  id="observacion" name="observacion" class="form-control" cols="10" rows="5" ></textarea>
                                    <small class="help-block form-text">Ingrese una observación o motivo d retiro</small>
                                    
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

