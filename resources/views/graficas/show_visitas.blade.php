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
                    <strong>Gráficas por filtro</strong>
                    <!-- Ruta de Navegación -->
                    <div class="row">
                        <div class="col-md-12">
                            <span class="pull-right">Administración->Graficas</span>
                        </div>
                    </div>
                    <!-- fin de la ruta -->
                    <!--<p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>-->
                </div>
                <!-- ------------- -->
                <div class="card-body card-block">
                    <!--<form action="{{ route('graficas.store') }}" method="POST" enctype="multipart/form-data" class="">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="num_bloques" class=" form-control-label"><b style="color:red;">*</b>Tipo de gráfica:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="num_bloques" id="num_bloques" required="required" class="form-control">
                                   <option value="asistencia">Asistencia</option>
                                    <option value="solicitudes">Solicitudes</option>
                                    <option value="visitas" selected="">Visitas</option>
                                </select>
                                <small class="form-text text-muted">Seleccione el tipo de gráfica a consultar</small>
                            </div>
                            <div class="col col-md-3">
                                <label for="num_bloques" class=" form-control-label"><b style="color:red;">*</b>Cliente:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="id_cliente" id="id_cliente" required="required" class="form-control">
                                    @foreach($clientes as $key)
                                    <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Seleccione el empleado a consultar</small>
                            </div>
                        </div>
                             
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="fecha_desde" class=" form-control-label"><b style="color:red;">*</b>Fecha desde:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="date" id="fecha_desde" name="fecha_desde" placeholder="Ej: Niños, Niñas y Adolescentes" class="form-control {{ $errors->has('fecha_desde') ? ' is-invalid' : '' }}" required="required" value="{{ old('fecha_desde') }}">
                                <small class="help-block form-text">Ingresa fecha desde</small>
                            </div>
                            <div class="col col-md-3">
                                <label for="fecha_hasta" class=" form-control-label"><b style="color:red;">*</b> Fecha hasta:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="date" id="fecha_hasta" name="fecha_hasta" placeholder="Ej: Deberes y Derechos de los Niños, Niñas y Adolescentes" class="form-control {{ $errors->has('fecha_hasta') ? ' is-invalid' : '' }}" value="{{ old('fecha_hasta') }}" required="required">
                                <small class="form-text text-muted">Ingresa fecha hasta</small>
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
                    </form>-->
                </div>
                <!-- -------------- -->
                <div class="card-body card-block">
                    <form action="#" method="POST" enctype="multipart/form-data" class="">
                           @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                Solicitudes del Cliente: <b>{{$cliente->nombres}} {{$cliente->apellidos}} C.I.: {{$cliente->nacionalidad}}-{{$cliente->cedula}}</b><br>
                                Entre las fechas <b>{{Carbon\Carbon::parse($desde)->format('d-m-Y')}} al {{Carbon\Carbon::parse($hasta)->format('d-m-Y')}} </b>
                            </div>
                        </div>
                        <div class="row">
                            <div style="width:100%;">
                                {!! $chartjs->render() !!}
                            </div>
                        </div>                      
                        <div class="row">
                            <div class="col-12 col-md-12" align="center">
                                <a href="{{ route('graficas.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Regresar... </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection