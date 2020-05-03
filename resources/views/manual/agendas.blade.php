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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Agendas</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- En la agenda nos muestra las actividades agendadas. Para registrar una solicitud de actividad, seprocede a darle al boton solicitud de espacio.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/agenda/1.png')}}" width="100%" height="200px">
                        </div>
                        
                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/agenda/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>2- En el formulario del registro nos mostrara todos los campos al llenar y que son obligatorios, verificando en la agenda la disponibilidad espacio, seleccionando al cliente responsable y que lo solicito, el encargado del espacio y el numero de personas que va a asistir al evento de la actividad y por ultimo darle al boton seleccionar en guardar.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/agenda/5.png')}}" width="100%" height="100px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>3- Despues de haber registrado la solicitud del espacio de la actividad el evento. Se puede buscar en la lista de las solicitudes y que contiene un buscador con el cual se puede buscar por el nombre de la actividad y por el nombre del espacio.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/agenda/6.png')}}" width="300px" height="100px">
                        </div>

                        <div class="col-sm-12 mt-3">

                        <p>4- Despues de haber buscado la solicitud en el listado, nos motrara unas opciones de las cuales se puede editar el registro, ver la informacion de la solitud, aprobar y negar  e imprimir el registro con la planilla  y dependiendo del estatus, se acepta la actividad, se acepta, se ejecuta y se cancela.
                        </p>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/agenda/7.png')}}" width="100%" height="100px">
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
