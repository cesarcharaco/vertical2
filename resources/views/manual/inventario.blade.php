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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo De Inventario</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>En el modulo de Inventario tenemos 5 botones que son: Retiro de productos por parte del usuario, Ver Retiro de productos, Ver entrega,  agregar cantidad de producto y ayuda en linea y que aparte que incluye toda informacion una lista de los productos registrados con sus respectivo datos, tales como : nombre del producto, existencia codigo, categoria y un buscador para buscar uno o varios productos.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/inventario/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/inventario/2.png')}}" width="100%" height="200px">
                        </div>                        

                        <div class="col-sm-12 mt-3">
                            <p>1- En la parte derecha nos muestra una columna que nos muestra una opcion con el simbolo de + de agregar para cargar la cantidad de productos donados, por parte de los clientes y atletas. Se puede buscar el producto por el buscador en especifico. </p>
                        </div> 

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/3.png')}}" width="2400px" height="200px">

                        </div>

                    <div class="col-sm-12 mt-3">                    
                        2- Al darle click al boton de agregar, nos va a mostrar una vista en donde nos muestra una un formaulario en donde nos muestra para seleccionar el cliente o al atleta que quiere donar la cantidad del producto. Al seleccionar un atleta nos muestrara una lista con los atletas o el atleta, luego seleccionamos o se busca al atleta en especifico y nos va a mostrar el mes que le corresponde donar el producto.   
                    </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/4.png')}}" width="650px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/5.png')}}" width="650px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>3- luego nos va a mostrar un campo en donde nos indica colocar la cantidad del producto que el atleta va a donar.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/6.png')}}" width="650px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>4- Al poner la cantidad del producto, vamos a darle clik en el boton de enviar para guardar los datos registrados, .</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/7.png')}}" width="650px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>5- Despues de haber registrado la donacion del atleta, se verifica si la cantidad del producto donado por atleta se actualizo en la existenia del inventario aumentado, buscandolo por su codigo.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/9.png')}}" width="650px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>6- Para ver el registro con toda la informaion donado por el atleta, se puede visualizar en la parte de entregas, dandole click en el boton de ver entregas y que contiene la siguiente informacion: el mes que dono y la del producto. </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/14.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>7- En la vista de ver entrega, contiene la informacion del producto donado por parte del atleta, tambien se puede cancelar el regsitro y que a su vez se descuenta del inventario automaticamente del prodcuto que se aumento donado por la cantidad agregada.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/8.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>8- Para cancelar el resgitro la entrega, hay que darle click en el boton eliminar, luego nos va a mostrar una ventana mostrandonos la siguiente informacion: Seguro que quiere eliminar el registro.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/10.png')}}" width="450px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>9- Despues de haberle dado aceptar al boton de eliminar el registro, nos va a aparecer un una alerta diciendo: la entrega del atleta ha sido cancelado exitosamente.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/11.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/13.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>10- Luego buscamos el producto en el inventario par aver si se desconto automaticamente.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/13.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>11- Por ultimo vemos otra vez en la vista de ver entregas, para verificar que no este el registro.  </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/15.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>12- Para el retiro de productos, volvemos a ir para la parte del inventario, luego darle al boton de retirar prodcutos.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/inventario/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>13-Despues de haberle dado al boton de retiros Nos mostrara una vista con el formulario de retiros y esto lo hace unicamente el usuario o los usuarios autorizados. Despues de seleccionar el producto a retirar, luego se tiende a darle al boton enviar.</p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/16.png')}}" width="300px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/19.png')}}" width="600px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>14- Despues nos va a aparecer un formulario en donde nos va a aparecer el producto con la cantiddad para llenarlo y despues se le da al boton de enviar para poder registrar el retiro deel producto.</p>
                        </div>                        

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/20.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/21.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>15- Luego nos aparecera una ventana que nos dira si desea retirar el producto, despues se le da en confimar .</p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/22.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>16- Despues nos aparece un formulario de confirmacíon de clave .</p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/23.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>17- Se llena el formulario con la clave de usuario y despues se le da al boton de confirmar .</p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/24.png')}}" width="500px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">

                            <img src="{{asset('manual/inventario/27.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>18- Para ver el registro con toda la informaion del producto retirado por parte  del usuario, le damos en el boton de ver retiros </p>
                        </div>                        

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/28.png')}}" width="800px" height="200px">

                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>19- para eliminar el registro del retiro de productos, le damos en eliminar </p>
                        </div> 

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/31.png')}}" width="400px" height="200px">
                        </div>                       

                        <div class="col-sm-12 mt-3">
                            <p>20- Despues de darle confirmar nos va a aparecer un alerta diciendo lo siguiente </p>
                        </div>

                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/29.png')}}" width="800px" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>21- Despues de que se elimino el registro, volvemos a buscar el producto y vemos otra vez que el producto con la cantidad actualizada otra vez </p>
                        </div>


                        <div class="col-sm-12 mt-3 d-flex justify-content-center">
                            <img src="{{asset('manual/inventario/30.png')}}" width="650px" height="200px">
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
