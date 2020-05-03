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
                    
                    <h3 class="title-5 m-b-35">Lista Módulos del Sistema</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('asignar.create') }}">Asignar Privilegios</a></button>
                            
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                      <th>Módulo</th>

                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cont==0)
                                <tr class="tr-shadow">
                                    <td colspan="10" align="center"><b>Sin datos para mostrar</b></td>
                                </tr>
                                @else
                                @foreach($modulos as $key)
                                <tr class="tr-shadow">
                                   
                                    <td>{{$key->modulo}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a href="{{ route('modulos.edit',$key->id) }}"><i class="zmdi zmdi-edit"></i></a>
                                            </button>
                                            <button onclick="eliminar('{{ $key->id }}')"  class="item" title="Delete"  data-toggle="modal" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                         
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            @php $i=1; @endphp
                                            <tr>
                                            @foreach($key->privilegios as $key2)
                                            @if($i%5==0)
                                            <tr>
                                            @endif
                                                <td><b>{{ $key2->privilegio }}</b></td>
                                            {{-- @if($i%5==0)    
                                            </tr>
                                            @endif --}}
                                            @php $i++; @endphp
                                            @endforeach
                                            </tr>
                                        </table>
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
                            <h5 class="modal-title" id="staticModalLabel"> Eliminar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea eliminar?
                            {!! Form::open(['route' => ['cargos.destroy',1033], 'method' => 'DELETE']) !!}
                            <input type="text" name="id_cargo" id="id_cargo" >
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
    function eliminar(id_cargo) {

        $("#id_cargo").val(id_cargo);
    }
</script>
@endsection