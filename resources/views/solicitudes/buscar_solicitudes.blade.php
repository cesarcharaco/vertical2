@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>
        <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-dange">
            <p>Corrige los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid">
			<div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    
                    <h3 class="title-5 m-b-35">Buscar Solicitudes de Espacios</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">

                            @if(buscar_p('Solicitudes','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('solicitudes.create') }}">Registrar</a>
                            </button>
                            @endif
                        </div>

                        <!-- Ruta de Navegación -->
                        <div class="table-data__tool-left" >
                        Vertical->Solicitudes->Buscar
                        </div>
                        <!-- fin de la ruta -->
                    </div>
                </div>

        

                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Solicitudes de Espacios</div>
                        <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> <br>
                        <form action="{{ route('solicitudes.buscar_solicitudes') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                        <div class=" row form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                            <label><b>Desde</b><b style="color:red;">*</b> </label>
                            <input type="date" required="required" name="desde" id="desde" max="{{$hoy}}" class="form-control">
                            </div>
                            
                            <div class="col-md-3">
                            <label><b>Hasta</b><b style="color:red;">*</b> </label>
                            <input type="date" required="required" name="hasta" id="hasta"  class="form-control">
                            </div>

                            <div class="col-md-3">
                            <label><b>Estado</b><b style="color:red;">*</b> </label>
                            <select name="estado" required="required" id="estado" class="form-control" title="Seleccione el estado de la solicitud">
                                <option value="0">Todas</option>
                                <option value="Aprobado">Aprobadas</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Negado">Negada</option>
                            </select>
                            </div>
                            <div class="col-md-2">
                            <label><b>&nbsp;</b></label>
                            <br>
                            <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Buscar
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        
@endsection


























