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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Usuarios</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- En la parte del modulo de usuarios nos muestra una lista de los usuarios registrados con todos sus datos para buscarlo por completo, por el nombre y por correo.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/1.png')}}" width="100%" height="200px">
                        </div>                        

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>2- En la parte derecha de la lista de usuarios nos aparece una columna con unas opciones de los usuarios y que son las siguinetes: Editar, Eliminar y Editar Privilegios.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/3.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/4.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/5.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>3- En la parte de arriba de la lista de usuarios nos muestra un boton de registrar. Luego de darle al boton de registro, nos va a mostrar una vita con un formulario, mostrandonos cada uno de sus campos a llenar y que son obligatorios</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/6.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/7.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>4- Despues de llanar todos los campos obligatorios, seleccionamos el tipo de susuario y despues se procede a darle al boton de enviar</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/8.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/9.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>5- Si despues de darle al boton de enviar para registrar el usuaio nuevo y nos aparece con problemas con la contraseña, es porque no se lleno el campo como es debido, nos va a aparecer un alerta diciendo que vuelva poner a escribir la contraseña con los datos correctos y que las contraseña coincidan. Despues de volver a llenar campo bien, poniendo los datos como los pide, volvemos a darle al boton de enviar para registrar al nuevo usuario.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/10.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/11.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>6- Despues buscando en la lista de usuarios, por el nombre o por correo al nuevo usuario registrado y despues como se menciono antes. Le damos al boton de privilegios y que nos va a mostrar una vista que nos va a mostrar una lista de cada uno de los modulos del sistema con sus respectivas acciones a cumplir, en esa vista podemos marcar o quitar las ciones que tiene la lista de los modulos. </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/12.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/13.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/16.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/14.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/15.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/17.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/usuarios/18.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>7- Despues de haber seleccionado e/o quitado una accion de modulo escogido, se procede a darle al boton de enviar para darle prioridad o acceso a ese usuario</p>
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
