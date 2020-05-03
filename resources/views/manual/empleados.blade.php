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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Empleados</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12">
                            <img src="{{asset('manual/empleados/1.png')}}" width="100%" height="200px">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <p>1- En la parte del módulo de empleados nos muestra lista de los empleados registrados con todos sus datos y un buscador para buscarlo completo, tanto por la cedula o por el correo. Al darle click botón pequeño se despliega y muestra las opciones de: Editar el registro, eliminar, editar el horario asignado al empleado y un ver con signo del ojo para ver el horario del empleado</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/empleados/2.png')}}" width="320px" height="200px">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <p>2- En los botones de arriba tenemos: Registrar un empleado con sus campos de registro, un botón con de PDF que es para mostrar todo los empleados y descargarlos todos y el ultimo es para registrarle un horario al empleado.</br> Al registrar un nuevo empleador, se procede dar click al botón de registrar y después nos va a aparecer formulario de registro con todos sus campos para llenarnos e identificados con un asterisco rojo diciendo que todos los todos son obligatorios.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/empleados/3.png')}}" width="400px" height="100px">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <p>
                                3-  Al presionar el botón enviar nos va aparecer un alerta de que se deben llenar los campos con sus respectivas validaciones y con los campos obligatorios, marcados con un asterisco rojo
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/empleados/4.png')}}" width="500px" height="100px">
                        </div>
                        <div class="col-sm-12 mt-3">
                            <p>
                                4- Por ultimo después de llenar todos los campos con sus respectivas validaciones obligatorias
                            </p>
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
