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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Visitas</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- En esta parte de la visitas, es para registrar los visitantes para los que van a ir para cada uno de los espacios y que implica la hora de entrada y salida.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/visitas/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>2- Se registrara los datos del visitante llenando todo los campos del registro y luego muestra los datos registrado con la hora de entrada </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/visitas/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/visitas/3.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>3- En la información del registro muestra dos opciones, una es marcar la salida y la otra es eliminar el registro de la visita</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/visitas/4.png')}}" width="300px" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>4- Después de haber marcado la salida del visitante, muestra por completo toda la información.
                            Para ver todas las visitas, hacer click en el botón de mostrar todas y después nos mostrara la lista de todos  los visitantes de las fechas de los días anteriores y más de las de hoy
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/visitas/5.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>5- En botón de PDF podemos descargar la lista de los visitantes como se ya había mencionado
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/visitas/6.png')}}" width="100%" height="200px">
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
