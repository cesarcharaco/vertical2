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
                    
                    <h3 class="title-5 m-b-35">Lista productos</h3>
                    <div class="table-data__tool">

                        <div class="table-data__tool-right">
                            @if(buscar_p('Productos','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('productos.create') }}">Registrar</a>
                            </button>
                            @endif

                            @if(buscar_p('Productos','pdf')=="Si")
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" >

                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.productos') }}">PDF</a>
                            </button>
                            @endif

                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" title="Ayuda en línea"  data-toggle="modal" data-target="#ayuda_productos"><i class="fa fa-question"></i>Ayuda</button>    
                        </div>

        <!-- Ruta de Navegación -->
        <div class="row">
            <div class="col-md-12">
                <span class="pull-right">Mantenimiento->Productos->Listado</span>
            </div>
        </div>
        <!-- fin de la ruta -->

                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Lista productos</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                            <thead>
                                <tr>
                                    
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Código</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
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
                                         @if(buscar_p('Productos','Editar')=="Si")       
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <a href="{{ route('productos.edit',$key->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            @endif
                                            <!-- volver a colocar data-target y data-toggle -->
                                            @if(buscar_p('Productos','Eliminar')=="Si")
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item"  data-toggle="modal" data-target="#staticModal"  title="Eliminar">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            @endif
                                            
                                          {{-- <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">
                                            Static
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
    <!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Eliminar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <!-- colocar atributos data-toggle y data-target y el ultimo que llame a claveroot 
                                y borrar rl formulario completo-->
                            <button type="button"  data-toggle="modal" data-target="#claveroot" class="btn btn-primary">Confirmar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end modal static -->
<!-- copiar y pegar el mismo modal abajo
    cambiar el id del modal a claveroot

 -->
<!-- modal static para ingreso de clave de superusuario-->
            <div class="modal fade" id="claveroot" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Eliminación de producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                           {!! Form::open(['route' => ['productos.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="hidden" name="id_producto" id="id_producto" >
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    
                                </div>
                                
                                <div class="col-12 col-md-9">
                                    <label for="text-input" class=" form-control-label"> <b style="color:red;">*</b> Contraseña de Administrador</label>
                                   <input type="password" id="clave" name="clave" class="form-control" required="required">
                                    <small class="form-text text-muted">Escribe la contraseña e administrador para validar la eliminación</small>
                                </div>
                            </div>
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
            @include('ayuda.index')
@endsection

@section('scripts')
<script type="text/javascript">
    function eliminar(id_producto) {

        $("#id_producto").val(id_producto);

    }
</script>
@endsection