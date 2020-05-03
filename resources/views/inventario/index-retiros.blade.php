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
                    
                    <h3 class="title-5 m-b-35">Inventario: Productos retirados</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-minus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('inventario.edit',1) }}">Retirar Productos</a></button> --}}
                            
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="dataTable7" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Usuario</th>
                                    <th>Observación</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($retiros as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->productos->nombre}}</td>
                                    <td>{{$key->cantidad}}</td>
                                    <td>{{$key->usuarios->name}}</td>
                                    <td>{{$key->observacion}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            {{--<a href="{{ route('inventario.create',[$key->id]) }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Agregar"   data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>
                                            </a>
                                            <button>
                                                <a href="{{ route('empleados.edit',$key->id) }}"><i class="zmdi zmdi-minus"></i></a>
                                            </button>
                                             <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                             --}}
                                            <button onclick="cancelar('{{ $key->id }}')"  class="item" title="Delete"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
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
 <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Cancelar Retiro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar el registro?
                            </p>
                            {!! Form::open(['route' => ['inventario.cancelar'], 'method' => 'POST']) !!}
                            <input type="hidden" name="id_retiro" id="id_retiro" >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- end modal static -->
@endsection

@section('scripts')
<script type="text/javascript">
    function cancelar(id_retiro) {

         $("#id_retiro").val(id_retiro);
    }
</script>
@endsection