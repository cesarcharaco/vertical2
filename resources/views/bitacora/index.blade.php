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
                    <h3 class="title-5 m-b-35">Lista de Bitácora</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <div class="table-data__tool-RIGHT">
                                @if($cont!=0)
                                @if(buscar_p('Bitácora','Vaciar')=="Si")
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                    <i class="zmdi zmdi-plus"></i><a   data-toggle="modal" data-target="#staticModal" style="text-decoration: none important!; color: white;" href="#">Vaciar Todo</a>
                                </button>
                                @endif
                                @endif


                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-collection-pdf"></i><a style="text-decoration: none important!; color: white;" href="{{ route('pdf.bitacora') }}">PDF</a>
                            </button>

                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" title="Ayuda en línea"  data-toggle="modal" data-target="#ayuda_bitacora"><i class="fa fa-question"></i>Ayuda</button>  
                            </div>
                        </div>
                        <!-- Ruta de Navegación -->
                        <div class="row">
                            <div class="col-md-12">
                                <span class="pull-right">Mantenimiento->Bitácora->listado</span>
                            </div>
                        </div>
                        <!-- fin de la ruta -->
                    </div>
                </div>
                    
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-search"></i> Filtro:</div>
                        <div class="table-responsive table-responsive-data2">
                            <form action="{{ url('bitacora/filtro') }}" name="buscar_bitacora" method="GET">
                            @csrf  
                                <table id="example1" class="table table-bordered table-striped" border="0px">
                                    <thead>
                                        <tr>
                                            <th>Fecha desde:</th>
                                            <th>Fecha hasta:</th>
                                            <th>Buscar:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td><input type="date" name="fecha_desde" class="form-control"></td>
                                            <td><input type="date" name="fecha_hasta" class="form-control"></td>
                                            <td><input type="submit" name="buscar" class="btn btn-success" value="Buscar"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-list-alt"></i> Bitacora</div>
                        <div class="data-tables datatable-dark" style="width: 95%; margin: 0 auto; padding: 20px;">
                            <table id="dataTable" class="text-center" border="0px" width="95%">
                              <thead class="bg-light text-capitalize">
                                <tr>
                                  <th>#</th>
                                  <th>Usuario</th>
                                  <th>Operaciones</th>
                                  <th>Fecha/hora</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if($cont!==0)
                                    @foreach($bitacora as $key)
                                        <tr class="tr-shadow">
                                            <td>{{$plus++}}</td>
                                            <td>{{ $key->usuarios->email }}</td>
                                            <td>{{ $key->operacion }}</td>
                                            <td>{{ \Carbon\Carbon::parse($key->created_at)->format('d/m/Y H:i:s a') }}</td>
                                            
                                        </tr>
                                    @endforeach
                                @elseif(empty($hallado))
                                    @foreach($bitacora as $key)
                                    <tr class="tr-shadow">
                                        <td>{{$hallado++}}</td>
                                        <td>{{ $key->usuarios->email }}</td>
                                        <td>{{ $key->operacion }}</td>
                                        <td>{{ \Carbon\Carbon::parse($key->created_at)->format('d/m/Y H:i:s a') }}</td>
                                        
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
<!-- modal static -->
            <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> Vaciar la Bitácora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea vaciar la bitácora completamente? recuerde que no podrán ser recuperados los datos una vez que confirme
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary"><a href="{{ route('bitacora.vaciar') }}" style="color: white; text-decoration: none;">Confirmar</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal static -->
            @include('ayuda.index')

@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection