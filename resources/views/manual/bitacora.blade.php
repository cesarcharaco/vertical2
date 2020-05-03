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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo de la Bitacora</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- En esta parte de la bitacora, tenemos cada una de las operaciones de los modulos del sistema que hace cada uno de los usuarios y aparte nos muestra en la parte de arriba que son: Vaciar todo, ver la la lista en un reporte en PDF y que nos permite descaragarlo y una ayuda en linea que nos muestra todo lo que hace.</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/bitacora/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/bitacora/3.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/bitacora/5.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/bitacora/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/bitacora/4.png')}}" width="100%" height="200px">
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
