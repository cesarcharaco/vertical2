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
                    
                    <h3 class="title-5 m-b-35">Inventario: Productos entregados por Clientes</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-minus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('inventario.edit',1) }}">Retirar Productos</a></button> --}}
                            
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-data2">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Cliente</th>
                                    <th>Entregado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($productos as $k)
                                
                                @foreach($k->solicitudes as $key)
                                @if($key->pivot->status=="Entregado")
                                <tr class="tr-shadow">
                                   
                                    <td>{{$k->nombre}}</td>
                                    <td>{{$key->pivot->cantidad}}</td>
                                    <td>{{$key->clientes->nombres}}, {{$key->clientes->nombres}} </td>
                                    <td>{{$key->pivot->fecha_entrega}}</td>
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
                                            <button onclick="cancelar_c('{{ $key->pivot->id }}')"  class="item" title="Delete"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                           
                                        </div>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                                @endif
                            @endforeach
                            @endforeach
                            @if($i==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>No existen productos entregados registrados de clientes</b></td>
                                </tr>
                            @endif
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br><br><br>
                    <hr>
                    <br><br><br>
                </div>
            </div>
            {{-- para atletas --}}
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    
                    <h3 class="title-5 m-b-35">Inventario: Productos entregados por Atletas</h3>
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
                                    <th>Atleta</th>
                                    <th>Mes Entregado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($productos as $k)
                                
                                @foreach($k->atletas as $key)
                                @if($key->pivot->status=="Entregado")
                                <tr class="tr-shadow">
                                   
                                    <td>{{$k->nombre}}</td>
                                    <td>{{$key->nombres}}, {{$key->nombres}} </td>
                                    <td>{{meses($key->pivot->mes)}}</td>
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
                                            <button onclick="cancelar_a('{{ $key->pivot->id }}')"  class="item" title="Delete"  data-toggle="modal" data-target="#staticModal1">
                                                <i class="zmdi zmdi-delete"></i>
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                           
                                        </div>
                                    </td>
                                </tr>
                                @php $j++; @endphp
                                @endif
                            @endforeach
                            @endforeach
                            @if($j==0)
                                <tr class="tr-shadow">
                                    <td colspan="5" align="center"><b>No existen productos entregados registrados de atletas</b></td>
                                </tr>
                            @endif
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
                            <h5 class="modal-title" id="staticModalLabel"> Cancelar Entrega de Cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar el registro?
                            </p>
                            {!! Form::open(['route' => ['inventario.cancelar_c'], 'method' => 'POST']) !!}
                            <input type="hidden" name="id_solicitud" id="id_solicitud" >
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
<!-- modal static del atleta -->
            <div class="modal fade" id="staticModal1" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Cancelar Entrega del Atleta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar el registro?
                            </p>
                            {!! Form::open(['route' => ['inventario.cancelar_a'], 'method' => 'POST']) !!}
                            <input type="hidden" name="id_atleta" id="id_atleta" >
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
    function cancelar_c(id_solicitud) {

         $("#id_solicitud").val(id_solicitud);
    }
    function cancelar_a(id_atleta) {

         $("#id_atleta").val(id_atleta);
    }
</script>
@endsection