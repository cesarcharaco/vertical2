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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Atletas</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- En la parte del modulo de atletas nos muestra una lista de los atletas registrados con todos sus datos para buscarlo por completo, por la cedula, nombre y apellido.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/atletas/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>2- En la parte derecha nos muestra una columna y que nos muestra unas opciones que son los simbolos de lapiz que es editar y una basura  Eliminar.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/2.png')}}" width="200px" height="200px">

                        </div>

                    <div class="col-sm-12 mt-3">                    
                        3- al darle click en el boton de eliminar nos mostrara un alerta diciendo Si quiere eliminar al atleta y al darle en aceptar nos mostrara otra ventana agregando la contraseña del usuario.
                    </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/8.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/15.png')}}" width="500px" height="200px">

                        </div>


                        <div class="col-sm-12 mt-3">
                            <p>4- Al ingresar una contraseña incorrecta nos mostrara un alerta diciendo que clave del usario es incorrecta   </p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/14.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/9.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>5- Al ingresar una contraseña correcta nos mostrara un alerta diciendo que el atleta ha sido eliminado exitosamente.   </p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/14.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/11.png')}}" width="800px" height="200px">

                        </div>


                        <div class="col-sm-12 mt-3">
                            <p>4- En los botones de arriba que nos muestra en el listado de atletas son: Registrar un atleta con sus campos de registro, un botón con de PDF que es para mostrar todo los empleados y por ultimao uno de ayuda.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center" >
                            <img src="{{asset('manual/atletas/12.png')}}" width="300px" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>6- En el registro de un nuevo atleta nos muestra todos los campos a llenar con sus respectivo datos y que son lo siguientes: Nombre, Apellido, Cedula y el Producto. Al darle al bonton de enviar sin llenar el formulario nos motrara un alerta diciendo como hay que llenar el registro</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/3.png')}}" width="500px" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/6.png')}}" width="200px" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>7- Despues de llenar todo el registro con sus respectivos campos obligatorios, marcado con un asterisco rojo. Desúes se procede a darle al boton de enviar para guardar el registro del atleta y despues ns mostrara un alerta con diciendo atleta registrado exitosamente.
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/4.png')}}" width="500px" height="200px">
                        </div> 

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/6.png')}}" width="200px" height="200px">
                        </div>                       


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/atletas/5.png')}}" width="800px" height="200px">
                        </div> 


                        <div class="col-sm-12 mt-3">
                            <p>8- Despues haber registrado al atleta exitosamente, vamos a lista de atleta para buscarlo especificadamente en el buscador por la cedula para ver sus datos.
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/atletas/13.png')}}" width="100%" height="200px">
                        </div>                        

                        <div class="col-sm-12 mt-3">
                            <p>9- En el boton del PDF podemos ver toda la lista de los atletas y descargarlo.
                            </p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/atletas/16.png')}}" width="100%" height="200px">
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
