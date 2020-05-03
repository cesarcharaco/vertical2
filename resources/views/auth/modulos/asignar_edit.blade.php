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
                        <strong>Actualización de Privilegios a Usuarios </strong>.
                    </div>
                     
                    <div class="card-body card-block">
                    {!! Form::open(['route' => ['asignar.update'], 'method' => 'POST', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="text-input" class=" form-control-label">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="{{ $usuario->id }}"><b> Usuario:</b> {{ $usuario->name }} - {{ $usuario->email }} | {{ $usuario->tipo_usuario }}</label>
                                </div>
                                
                            </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                      <th>Módulo y Privilegios</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($modulos as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->modulo}}</td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            @php $i=1; @endphp
                                            <tr>
                                            @foreach($key->privilegios as $key2)
                                            @if($i%5==0)
                                            <tr>
                                            @endif

                                                <td><b><input type="checkbox" name="id_privilegio[]" id="id_privilegio" title="Seleccionar para asignar el privilegio de {{ $key2->privilegio }} del módulo {{ $key->modulo }}" value="{{ $key2->id }}" @if(buscar_p2($key->modulo,$key2->privilegio,$usuario->id)=="Si") checked="checked" @endif> {{ $key2->privilegio }}</b></td>
                                            {{-- @if($i%5==0)    
                                            </tr>
                                            @endif --}}
                                            @php $i++; @endphp
                                            @endforeach
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
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
                {!! Form::close() !!}
                </div>
			</div>
    	</div>
    </div>
</div>


@endsection

