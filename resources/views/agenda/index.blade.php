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
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    
                    <h3 class="title-5 m-b-35">Actividades Agendadas</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                     @if(buscar_p('Solicitudes','Registrar')=="Si")
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                             <i class="zmdi zmdi-plus"></i><a style="text-decoration: none important!; color: white;" href="{{ route('solicitudes.create') }}">Solicitud de Espacio</a></button>
                    @endif             
                        </div>
                    </div>
                            
                </div>
            </div>
            <div class="row">
    <!-- /# column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Actividades Agendadas por Espacios</h4>
                        </div>
                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-parque" role="tab" aria-controls="custom-nav-home"
                                         aria-selected="true">Parque Infantil</a>


                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-auditorio" role="tab" aria-controls="custom-nav-profile"
                                         aria-selected="false">Auditorio</a>


                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-infocentro" role="tab" aria-controls="custom-nav-contact"
                                         aria-selected="false">Infocentro</a>


                                         <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-gimnasio" role="tab" aria-controls="custom-nav-contact"
                                         aria-selected="false">Gimnasio</a>


                                         <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-deportes" role="tab" aria-controls="custom-nav-contact"
                                         aria-selected="false">Deportes</a>


                                         <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-cultura" role="tab" aria-controls="custom-nav-contact"
                                         aria-selected="false">Cultura</a>


                                         <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-cancha" role="tab" aria-controls="custom-nav-contact"
                                         aria-selected="false">Cancha deportiva</a>


                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="custom-nav-parque" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==1)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $bloques[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colora[$i][$j]=$k->color;
                                                        @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colora[$i][$j]}}">
                                                        {{ $bloques[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->

                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)

                                            @if($key[0]->id_espacio==1)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td class="table-data-feature">
                                                    
                                            <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                <i class="zmdi zmdi-tag-close"></i>
                                            </button>
                                            <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                <i class="zmdi zmdi-shield-check"></i>
                                            </button>
                                            <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-auditorio" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==2)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $auditorio[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colorb[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colorb[$i][$j]}}">
                                                        {{ $auditorio[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==2)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                            <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                <i class="zmdi zmdi-tag-close"></i>
                                            </button>
                                            <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                <i class="zmdi zmdi-shield-check"></i>
                                            </button>
                                            <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                            

                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-infocentro" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==3)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $infocentro[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colorc[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colorc[$i][$j]}}">
                                                        {{ $infocentro[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==3)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                                <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                    <i class="zmdi zmdi-tag-close"></i>
                                                </button>
                                                <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                    <i class="zmdi zmdi-shield-check"></i>
                                                </button>
                                                <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>

                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                     <div class="tab-pane fade" id="custom-nav-gimnasio" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==4)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $gimnasio[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colord[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colord[$i][$j]}}">
                                                        {{ $gimnasio[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==4)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                                    <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                    <i class="zmdi zmdi-tag-close"></i>
                                                </button>
                                                <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                    <i class="zmdi zmdi-shield-check"></i>
                                                </button>
                                                <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                     <div class="tab-pane fade" id="custom-nav-deportes" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==5)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $deportes[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colore[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colore[$i][$j]}}">
                                                        {{ $deportes[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==5)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                                    <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                    <i class="zmdi zmdi-tag-close"></i>
                                                </button>
                                                <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                    <i class="zmdi zmdi-shield-check"></i>
                                                </button>
                                                <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                     
                                     <div class="tab-pane fade" id="custom-nav-cultura" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==6)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $cultura[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colorf[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colorf[$i][$j]}}">
                                                        {{ $cultura[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==6)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                                    <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                    <i class="zmdi zmdi-tag-close"></i>
                                                </button>
                                                <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                    <i class="zmdi zmdi-shield-check"></i>
                                                </button>
                                                <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>
                                     <div class="tab-pane fade" id="custom-nav-cancha" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                        <!-- inicio -->
                                        @foreach($agenda as $k)
                                        @if($k->id_espacio==7)
                                        @php  @endphp
                                            @for($i=0;$i<10;$i++)
                                            
                                                @for($j=1;$j<=7;$j++)
                                                    @if($k->id_bloque==$bloquesx[$i][$j])
                                                        
                                                        @php $cancha[$i][$j]=$k->solicitudes->nombre_actividad;
                                                        $colorg[$i][$j]=$k->color; @endphp
                                                        
                                                    @endif       
                                                @endfor
                                            
                                            @endfor
                                        @endif
                                        @endforeach
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miércoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Sábado</th>
                                                    <th>Domingo</th>
                                                </tr>
                                            </thead>
                                            @for($i=0;$i<10;$i++)
                                            <tr>
                                                @for($j=0;$j<=7;$j++)
                                                    <td style="background-color: {{$colorg[$i][$j]}}">
                                                        {{ $cancha[$i][$j] }}
                                                    </td>
                                                    
                                                @endfor
                                            </tr>
                                            @endfor
                                            </table>
                                        </div>
                                        <!-- fin -->
                                        <!-- prueba de agenda temporal -->
                                        <br><br><br><br>
                                        <p><b>Agenda de Actividades temporales</b></p>
                                        <div class="table-responsive table-responsive-data2">
                                            <table id="example2" class="table table-bordered table-striped parque">
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th>Fecha</th>
                                                    <th>Nombre de la Actividad</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            @foreach($agenda_temporal as $key)
                                            @if($key[0]->id_espacio==7)
                                            @if($key[0]->status=="Activa")
                                            <tr>
                                                <td>{{ $key[0]->bloques->hora }}</td>
                                                <td>{{ $key[0]->solicitudes->fecha }}</td>
                                                <td>{{ $key[0]->solicitudes->nombre_actividad }}</td>
                                                <td>{{ $key[0]->solicitudes->responsable }}</td>
                                                <td>
                                                    <button class="item" data-placement="top" title="Cancelar la Actividad" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Cancelada')">
                                                    <i class="zmdi zmdi-tag-close"></i>
                                                </button>
                                                <button class="item" data-placement="top" title="La Actividad será marcada como Ejecutada" data-toggle="modal" data-target="#acciones" onclick="acciones('{{ $key[0]->id_solicitud }}','Ejecutada')">
                                                    <i class="zmdi zmdi-shield-check"></i>
                                                </button>
                                                <button   class="item" id="ver" onclick="ver('{{ $key[0]->bloques->dia." Hora:".$key[0]->espacios->hora }}','{{ $key[0]->espacios->espacio." Piso: ".$key[0]->espacios->piso }}','{{ $key[0]->solicitudes->num_bloques." Hora(s)" }}','{{ $key[0]->solicitudes->nombre_actividad }}','{{ $key[0]->solicitudes->fecha }}','{{ $key[0]->solicitudes->descripcion_actividad }}','{{ $key[0]->solicitudes->num_asistentes." Máximo" }}','{{ $key[0]->solicitudes->clientes->nombres." ".$key[0]->solicitudes->clientes->apellidos }}','{{ $key[0]->solicitudes->responsable }}')" title="view"  data-toggle="modal" data-target="#view">
                                            <i class="zmdi zmdi-eye"></i>
                                            </button>
                                                </td>
                                            </tr>
                                            @endif
                                            @endif
                                            @endforeach
                                            </table>
                                        </div>
                                        <!-- fin prueba de agenda temporal -->                                        
                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
        </div>
    </div>
</div>
<!-- modal de aprobacion,negacion de solicitud -->
            <div class="modal fade" id="acciones" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel"> 
                                <span id="accion"></span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea marcar como <span id="accion2"></span>?
                            </p>
                            {!! Form::open(['route' => ['operaciones.agenda'], 'method' => 'POST']) !!}
                            <input type="hidden" name="id_solicitud" id="id_solicitud" >
                            <input type="hidden" name="operacion" id="operacion">
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
<!-- modal view -->
            <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="view">Actividad Tempral Agendada</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                <div class="table-responsive table-responsive-data2">
                    <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Datos de la actividad</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Inicio
                                    </td>
                                    <td><span id="bloque"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Lugar
                                    </td>
                                    <td><span id="lugar"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Duración
                                    </td>
                                    <td><span id="duracion"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre de actividad
                                    </td>
                                    <td><span id="nombreactividad"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Responsable
                                    </td>
                                    <td><span id="responsable"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Fecha
                                    </td>
                                    <td><span id="fecha"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Descripción actividad
                                    </td>
                                    <td><span id="descripcionactividad"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        N° Asistentes
                                    </td>
                                    <td><span id="asistentes"></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombre cliente
                                    </td>
                                    <td><span id="nombrecliente"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            
                        </div>
                        <input type="hidden" name="id_solicitud" id="id_solicitud">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        <!-- Modale de view -->
@endsection

@section('scripts')
<script type="text/javascript">
function acciones(id_solicitud,accion) {
        console.log("xcvbnm,.");
        $("#accion").text(accion);
        $("#accion2").text(accion);
        $("#id_solicitud").val(id_solicitud);
        $("#operacion").val(accion);
    }
function ver(bloque,espacio,duracion,nombreactividad,fecha,descripcionactividad,num_asistentes,nombrecliente,responsable) {
    
        //console.log(data.length);
        $("#bloque").text(bloque);
        $("#lugar").text(espacio);
        $("#duracion").text(duracion);
        $("#nombreactividad").text(nombreactividad);
        $("#fecha").text(fecha);
        $("#descripcionactividad").text(descripcionactividad);
        $("#asistentes").text(num_asistentes);
        $("#nombrecliente").text(nombrecliente);
        $("#responsable").text(responsable);
    }
</script>
@endsection