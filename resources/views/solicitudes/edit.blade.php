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
                        <strong>Actualizando datos de Solicitud de espacios</strong>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Solicitudes->Editar</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    {!! Form::open(['route' => ['solicitudes.update',$solicitud->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="bloques" class=" form-control-label"><b style="color:red;">*</b> Bloques</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_bloque" id="id_bloque" required="required" class="form-control">
                                        @foreach($bloques as $k)
                                        <option value="{{ $k->id }}" @if($solicitud->id_bloque==$k->id) selected="selected" @endif >{{ $k->dia }} - Hora: {{ $k->hora }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione el bloque que corresponde al inicio de la actividad</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="num_bloques" class=" form-control-label"><b style="color:red;">*</b>N° de Bloques</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="num_bloques" id="num_bloques" required="required" class="form-control">
                                        @for($i=1;$i<=10;$i++)
                                        <option value="{{ $i }}" @if($solicitud->num_bloques==$i) selected="selected" @endif >{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <small class="form-text text-muted">Seleccione el número de horas o bloques que durará la actividad</small>
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"><b style="color:red;">*</b>Espacio </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_espacio" id="id_espacio" class="form-control" required="required">
                                        @foreach($espacios as $k)
                                        <option value="{{ $k->id }}" @if($solicitud->id_espacio==$k->id) selected="selected" @endif >{{ $k->espacio }} - Piso: {{ $k->piso }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione el espacio que desea utilizar para la actividad</small>
                                </div>
                            </div>
                             
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="dirigido" class=" form-control-label"><b style="color:red;">*</b>A quién va dirigida?</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="dirigido" name="dirigido" placeholder="Ej: Niños, Niñas y Adolescentes" class="form-control" required="required" value="{{ $solicitud->dirigido }}">
                                    <small class="help-block form-text">Ingresa hacia quien va dirigida la actividad</small>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nombre_act" class=" form-control-label"><b style="color:red;">*</b> Nombre de la Act.</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="nombre_actividad" name="nombre_actividad" placeholder="Ej: Deberes y Derechos de los Niños, Niñas y Adolescentes" class="form-control" required="required" value="{{ $solicitud->nombre_actividad }}">
                                    <small class="form-text text-muted">Escribe el nombre de la actividad</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cliente" class=" form-control-label"><b style="color:red;">*</b> Cliente Responsable</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_cliente" id="id_cliente" class="form-control" required="required">
                                        <option value="">Seleccione un cliente</option>
                                        @foreach($clientes as $k)
                                        <option value="{{ $k->id }}" @if($solicitud->id_cliente==$k->id) selected="selected" @endif >{{ $k->nombres }} {{ $k->apellidos }}, {{ $k->nacionalidad }}-{{ $k->cedula }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione el bloque que corresponde al inicio de la actividad</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="responsable" class=" form-control-label"><b style="color:red;">*</b> Responsable</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="responsable" name="responsable" placeholder="Ej: Ramón Pérez" class="form-control" required="required" value="{{ $solicitud->responsable }}">
                                    <small class="form-text text-muted">Escriba el nombre completo del responsable de la actividad</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label"> Tipo de Actividad</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="permanente" name="permanente" value="Si" class="form-check-input" @if($solicitud->permanente=="Si") checked="checked" @endif >
                                                Seleccione si la actividad será permanente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="fecha" class=" form-control-label"><b style="color:red;">*</b> Fecha de Realización</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="fecha" name="fecha" value="{{$solicitud->fecha}}" min="{{$hoy}}" class="form-control" required="required">
                                    <small class="form-text text-muted">Indique la fecha en la que se llevará a cabo la actividad</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="descripcion_actividad" class=" form-control-label"><b style="color:red;">*</b> Descripción de la Actividad</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="descripcion_actividad" id="descripcion_actividad" cols="10" rows="5" class="form-control" required="required">{{ $solicitud->descripcion_actividad }}</textarea>
                                    <small class="form-text text-muted">Describa brevemente la actividad a realizar</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="num_asistentes" class=" form-control-label"><b style="color:red;">*</b>N° máximo de asistentes</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="num_asistentes" name="num_asistentes" placeholder="Ej: 100" class="form-control" required="required" value="{{ $solicitud->num_asistentes }}">
                                    <small class="form-text text-muted">Ingrese el número máximo aproximado de personas que espera que asistan a la actividad</small>
                                </div>
                            </div>
                            <div id="productos" style="display: none;">
                                <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="productos" class=" form-control-label"><b style="color:red;">*</b>Productos</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_producto" id="id_producto" class="form-control">
                                        @foreach($productos as $k)
                                        <option value="{{ $k->id }}"  @if($id_producto==$k->id) selected="selected" @endif >{{ $k->nombre }} </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="colaborar" id="colaborar">
                                    <small class="form-text text-muted">Seleccione el producto con el cual va a colaborar</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="cantidad" class=" form-control-label"><b style="color:red;">*</b>Cantidad</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="cantidad" name="cantidad" placeholder="Ej: 10" class="form-control" required="required" value="{{ $cantidad }}">
                                    <small class="form-text text-muted">Ingrese la cantidad de productos con los cuales desea colaborar</small>
                                </div>
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
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">
        
        $(document).ready( function(){
            $("#id_cliente").on("change",function (event) {
                var id_cliente=event.target.value;
                $.get("/solicitud/"+id_cliente+"/buscar",function (data) {
                        //console.log(data.length);
                        var confirma=data.length;
                        if (confirma>0) {
                            $("#productos").css('display','block');
                            $("#productos").attr('required',true);
                            $("#colaborar").val(1);
                        } else {
                            $("#productos").css('display','none');
                            $("#productos").removeAttr('required');
                            $("#colaborar").val(0);
                        }
                });     
            });
        });
    </script>
@endsection