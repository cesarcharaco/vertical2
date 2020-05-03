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
                    <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('graficas.store') }}" method="POST" enctype="multipart/form-data" class="">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="num_bloques" class=" form-control-label"><b style="color:red;">*</b>Modulo de la gráfica:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="num_bloques" id="num_bloques" required="required" class="form-control" onchange="mostrar();">
                                    <option value="asistencia">Asistencia</option>
                                    <option value="solicitudes">Solicitudes</option>
                                    <option value="visitas">Visitas</option>
                                </select>
                                <small class="form-text text-muted">Seleccione el Modulo de la gráfica a consultar</small>
                            </div>
                        </div>

                    <div id="esconder">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="id_empleado" class=" form-control-label"><b style="color:red;">*</b>Empleado:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_empleado" id="id_empleado" required="required" class="form-control select2">
                                    @foreach($empleados as $key)
                                    <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Seleccione el empleado a consultar</small>
                            </div>
                        </div>
                    </div>

                    <div id="esconder2" style="position: absolute;opacity: 0;">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="id_cliente" class=" form-control-label"><b style="color:red;">*</b> Cliente:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_cliente" id="id_cliente" class="form-control select2">
                                    @foreach($clientes as $c)
                                    <option value="{{$c->id}}">{{$c->nombres}} {{$c->apellidos}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Seleccione el clientes a consultar</small>
                            </div>
                        </div>
                </div>

                <div id="esconder3" style="position: absolute;opacity: 0;">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="visitante" class=" form-control-label"><b style="color:red;">*</b> Visitante:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="visitante" id="visitante" class="form-control select2">
                                    @foreach($visitas as $v)
                                    <option value="{{$v->cedula}}">{{$v->nombres}} {{$v->nacionalidad}}-{{$v->cedula}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Seleccione el visitante a consultar</small>
                            </div>
                        </div>
                </div>

                <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="tipo_grafica" class=" form-control-label"><b style="color:red;">*</b>Tipo de gráfica:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="tipo_grafica" id="tipo_grafica" required="required" class="form-control" onchange="mostrar();">
                                    <option value="barras">Barras</option>
                                    <option value="pastel">Pastel</option>
                                </select>
                                <small class="form-text text-muted">Seleccione el tipo de gráfica a consultar</small>
                            </div>
                        </div>
                             
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="fecha_desde" class=" form-control-label"><b style="color:red;">*</b>Fecha desde:</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="fecha_desde" name="fecha_desde" placeholder="Ej: Niños, Niñas y Adolescentes" class="form-control {{ $errors->has('fecha_desde') ? ' is-invalid' : '' }}" required="required" value="{{ old('fecha_desde') }}">
                                <small class="help-block form-text">Ingresa fecha desde</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="fecha_hasta" class=" form-control-label"><b style="color:red;">*</b> Fecha hasta:</label>
                            </div>
                            <div class="col-12 col-md-9">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
    function mostrar(){
        var seleccion=$('#num_bloques').val();
        if(seleccion === 'solicitudes'){
            $('#esconder2').css('position','relative');
            $('#esconder2').css('opacity','100');
            $('#esconder').css('position','absolute');
            $('#esconder').css('opacity','0');
            $('#esconder3').css('position','absolute');
            $('#esconder3').css('opacity','0');
            $('#div_visitas').css('position','absolute');
            $('#div_visitas').css('opacity','0');

        }else if(seleccion === 'visitas'){
            $('#esconder3').css('position','relative');
            $('#esconder3').css('opacity','100');
            $('#esconder').css('position','absolute');
            $('#esconder').css('opacity','0');
            $('#esconder2').css('position','absolute');
            $('#esconder2').css('opacity','0');
            $('#div_visitas').css('position','relative');
            $('#div_visitas').css('opacity','100');
        }else{
            $('#esconder2').css('position','absolute');
            $('#esconder2').css('opacity','0');
            $('#esconder').css('position','relative');
            $('#esconder').css('opacity','100');
            $('#esconder3').css('position','absolute');
            $('#esconder3').css('opacity','0');
            $('#div_visitas').css('position','absolute');
            $('#div_visitas').css('opacity','0');

        }
    }
</script>
@endsection