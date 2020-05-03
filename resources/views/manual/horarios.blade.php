@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Manual Interactivo</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">

                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <a style="color: white;" href="{{ route('ayuda_linea') }}">Regresar</a>
                            </button>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Horarios</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12">
                            <p>1- Para asignar un horario a un empleado, debemos solucionarlo en el listado en donde nos muestran todos los empleados registrados. Luego se debe seleccionar la lista los bloques de horas la cantidad de bloques, los días que de  la semana que va a tener y por ultimo hacer click en el botón de enviar para guardar el horario asignado al empleado.</p>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/horarios/1.png')}}" width="100%" height="200px">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <p>2- Para ver el horario del empleado asignado y después poder descargarlo, buscamos al empleado en lista de y después vamos a las opciones para darle clik al botón de ver y después nos mostrara el horario asignado al empleado y también lo podemos descargar dándole al botón del PDF </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/horarios/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/horarios/3.png')}}" width="100%" height="200px">
                        </div>


                      </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection
