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
                    <strong>Editar Atletas </strong> .

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Atletas->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->
                    
                </div>
                
                   {!! Form::open(['route' => ['atletas.update',$atleta->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}

                        @csrf
                <div class="card-body card-block">
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Nombre</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nombres" placeholder="Ronald" class="form-control {{ $errors->has('nombres') ? ' is-invalid' : '' }}" value="{{ $atleta->nombres }}">
                                <small class="form-text text-muted">Escribe tu nombre</small>
                            </div>
                        </div>
                          <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label" > <b style="color:red;">*</b>Apellido</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="apellidos" placeholder="Ramirez" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ $atleta->apellidos }}">
                                <small class="form-text text-muted">Escribe tu apellido</small>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label"><b style="color:red;">*</b>Cédula</label>
                            </div>
                            <div class="col-9 col-md-1">
                                <select name="nacionalidad" id="select" class="form-control  {{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}">
                                    <option value="V" @if($atleta->nacionalidad=="V") selected="selected" @endif >V </option>
                                    <option value="E" @if($atleta->nacionalidad=="E") selected="selected" @endif >E</option>
                                    <option value="G" @if($atleta->nacionalidad=="G") selected="selected" @endif >G</option>
                                   
                                </select>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="cedula" placeholder="27167436" required maxlength="8" class="form-control {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ $atleta->cedula }}">
                                <small class="form-text text-muted">Escribe tu cédula</small>
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
                                    @php $productos=productos_atletas($atleta->id);
                                    $hallado=0; @endphp
                                    @foreach($productos as $k)
                                        @if($k->nombre==$key->nombre)
                                            @php $hallado++; @endphp
                                        @endif
                                    @endforeach
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="id_producto" name="id_producto[]" value="{{ $key->id }}" class="form-control" @if($hallado > 0) checked="checked" @endif >
                                        
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
            </div>
          {!! Form::close() !!}
          </div>
        </div>
      </div>
     </div>

                                           

@endsection