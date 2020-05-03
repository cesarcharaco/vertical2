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
                    <div class="card-header"><i class="fa fa-list-alt"></i> Modúlo Asistencias</div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12 mt-3">
                            <p>1- Para marcar una asistencia de una empleado se busca el empleado y luego se selecciona el botón para marcar que asistió y luego aparecerá un alerta diciendo que si desear marcar la asistencia</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/asistencia/1.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/asistencia/2.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>2- Para marcar una asistencia de que porque falto, nos mostrara un alerta con justificativo con y describiendo que por el que y la otra sin justificativo</p>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/asistencia/3.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>3- Nos mostrara una alerta de que la inasistencia fue marcada con justificativo</p>
                        </div>

                         <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/asistencia/4.png')}}" width="100%" height="200px">
                        </div>

                        <div class="col-sm-12 mt-3">
                            <p>4- Luego se marca la inasistencia confirmando, del que por que no vino</p>
                        </div>

                         <div class="col-sm-12 mt-3">
                            <img src="{{asset('manual/asistencia/5.png')}}" width="100%" height="200px">
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
