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

                        <strong>Registro de horarios</strong>


        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Vertical->Horarios->Registro</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('horarios.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                           
                        
	                      <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="empleados class=" form-control-label"><b style="color:red;">*</b> Empleados</label>
                                </div>
                                <div class="col col-md-10">
                                    <select name="id_empleado" id="id_empleado" class="form-control">
                                        @foreach($empleados as $k)
                                        <option value="{{ $k->id }}">{{ $k->nombres }} - {{ $k->apellidos }} - {{ $k->nacionalidad }} - {{ $k->cedula }} </option>
                                        
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted"> Seleccione un empleado</small>
                                </div>
                            </div>     
                                <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="bloques" class=" form-control-label"><b style="color:red;">*</b> Bloques</label>
                                </div>
                                <div class="col col-md-10">
                                    <select name="hora" id="hora" required="required" class="form-control">
                                        @foreach($bloques as $k)
                                        <option value="{{ $k->hora }}">Hora: {{ $k->hora }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Seleccione el bloque que corresponde al inicio de la actividad</small>
                                </div>
                                </div> 

                             <div class="row form-group">
                                    <div class="col col-md-3">
                                <label class=" form-control-label"><b style="color:red;">*</b>Cantidad de bloques</label>
                             </div>
                            <div class="col-2 col-md-9">
                                    <select name="num_bloques" id="num_bloques" required="required" class="form-control">
                                        @for($i=1;$i<=10;$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <small class="form-text text-muted">Seleccione el número de horas o bloques que durará la actividad</small>
                            </div>
                        </div>



                            <div class="row form-group">
                                    <div class="col col-md-3">
                                <label class=" form-control-label"> <b style="color:red;">*</b> Día de la semana</label>
                             </div>
                                         <div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="1" name="lunes" value="1" class="form-check-input"> Lunes
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="2" name="martes" value="2" class="form-check-input"> Martes
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="3" name="miercoles" value="3" class="form-check-input"> Miercoles                                                     </label>
                                                        </div>
                                                         <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="4" name="jueves" value="4" class="form-check-input"> Jueves                                                    </label>
                                                        </div>
                                                         <div class="checkbox">
                                                            <label for="radio5" class="form-check-label ">
                                                                <input type="checkbox" id="5" name="viernes" value="5" class="form-check-input"> Viernes                                                    </label>
                                                        </div>
                                                         <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="6" name="sabado" value="6" class="form-check-input"> Sábado                                                   </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkbox" class="form-check-label ">
                                                                <input type="checkbox" id="7" name="domingo" value="7" class="form-check-input"> Domingo                                                   </label>
                                                        </div>
                                                    </div>
                                                    <small class="form-text text-muted">Seleccione los días</small>
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

