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
                    
                    <h3 class="title-5 m-b-35">Inventario</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-minus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('inventario.edit',1) }}">Retirar Productos</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue au-btn--small" >
                                <i class="zmdi zmdi-eye"></i><a style="text-decoration: none important!; color: white;" href="{{ route('retiros.realizados') }}">Ver Retiros</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-eye"></i><a style="text-decoration: none important!; color: white;" href="{{ route('entregas.realizadas') }}">Ver Entregas</a>
                            </button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" title="Ayuda en línea"  data-toggle="modal" data-target="#ayuda_inventario"><i class="fa fa-question"></i>Ayuda</button>  
                        </div>
                    </div>
<div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Inventario</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead>
                                <tr>
                                    
                                    <th>Producto</th>
                                    <th>Existencia</th>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($productos as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->nombre}}</td>
                                    <td>{{$key->stock}}</td>
                                    <td>{{$key->codigo}}</td>
                                    <td>{{$key->categorias->categoria}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('inventario.create',[$key->id]) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Agregar"   data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>
                                            </a>
                                            {{--<button>
                                                <a href="{{ route('empleados.edit',$key->id) }}"><i class="zmdi zmdi-minus"></i></a>
                                            </button>
                                             <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Más">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                           
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('ayuda.index')
@endsection