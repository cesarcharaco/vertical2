@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">
          @include('flash::message')
        </div>
    	<div class="col-md-12">

         @if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

		<div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Incrementando Stock en Inventario </strong><p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p> .
                    </div>
                     
                    <div class="card-body card-block">
                    <form action="{{ route('inventario.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           @csrf
                            <div class="row form-group">
                                <div class="col col-md-6">
                                    <label for="text-input" class=" form-control-label"><b style="color:red;">*</b> Producto: {{ $producto->nombre }}- Código: {{ $producto->codigo }} - Categoría: {{ $producto->categorias->categoria }}</label>
                                </div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-6">
                                    <input type="radio" id="quientrajo" name="quientrajo" value="1" checked="checked" >
                                    <label for="text-input" class=" form-control-label">Cliente</label>
                                    <input type="radio" id="quientrajo" name="quientrajo" value="2" >
                                    <label for="text-input" class=" form-control-label">Atleta</label>
                                </div>
                                
                            </div>
                            <div id="alerta" class="alert-danger" style="display: none;">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                <span id="mensaje"><b>No hay clientes pendientes por entregar este producto</b></span>
                                    </div>
                                </div>
                            </div>
                            <div id="clientes" style="display: block;">
                                <div class="row form-group">
                                    <div class="col col-md-1">
                                        <label for="select" class=" form-control-label"><b style="color:red;">*</b>Clientes</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select name="id_cliente" id="id_cliente" class="form-control" >
                                            @foreach($clientes as $k)
                                            @foreach($k->solicitudes as $key)
                                            @foreach($key->productos as $key2)
                                            @if($key2->pivot->status=="Pendiente" and $key2->pivot->id_producto==$producto->id)
                                            <option value="{{ $k->id }}">{{ $k->nombres }} {{ $k->apellidos }} {{ $k->nacionalidad }}-{{ $k->cedula }}</option>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                        </select>
                                        <small class="help-block form-text">Seleccione un Cliente</small>
                                    </div>
                                </div>
                            </div>
                            <div id="alerta2" class="alert-danger" style="display: none;">
                                <div class="row form-group">
                                    <div class="col col-md-6">
                                <span id="mensaje2"><b>No hay atletas pendientes por entregar este producto</b></span>
                                    </div>
                                </div>
                            </div>
                           <div id="atletas" style="display: none;">
                               <div class="row form-group">
                                    <div class="col col-md-1">
                                        <label for="select" class=" form-control-label"><b style="color:red;">*</b>Atletas</label>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select name="id_relacion" id="id_atleta" class="form-control select2">
                                            @foreach($atletas as $k)
                                                @foreach($k->productos as $keyp)
                                                    @if($keyp->pivot->id_producto==$producto->id && $keyp->pivot->status=="Pendiente")
                                                        <option value="{{ $keyp->pivot->id }}">{{ $k->nombres }} {{ $k->apellidos }} {{ $k->nacionalidad }}-{{ $k->cedula }} - Mes {{ $keyp->pivot->mes }}</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                        <small class="help-block form-text">Seleccione un atleta</small>
                                    </div>
                                </div>  
                            </div> 
                            <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="email-input" class=" form-control-label"><b style="color:red;">*</b>Cantidad</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" required="required" min="1">
                                    <small class="help-block form-text">Ingrese la cantidad, en caso del Atleta solo entrega un producto</small>
                                    <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                                </div>
                            </div>
                              
                           
                      <div class="row">
                      	<div class="col-12 col-md-12" align="right">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Enviar
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Limpiar
                        </button>
                    </div>
 
                    </div>
                </form>
                </div>
			</div>
    	</div>
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready( function(){
    //verificando cliente
    var valor=$('#id_cliente option').length;
    if (valor==0) {
        //console.log(valor);
        $("#clientes").css('display','none');
        $("#alerta").css('display','block');
        $("#cantidad").attr('disabled',true);
    }else{
        $("#alerta").css('display','none');
        $("#cantidad").removeAttr('disabled');
    } 
    //------------------------

    $('input[type=radio][name=quientrajo]').change(function() {
    if (this.value == 2) {
        var valor2=$('#id_atleta option').length;
        
        if (valor2==0) {
            $("#atletas").css('display','none');
            $("#alerta2").css('display','block');
            $("#cantidad").attr('disabled',true);
            $("#cantidad").removeAttr('required');
        } else {
            $("#atletas").css('display','block');  
            $("#alerta2").css('display','none');
            $("#cantidad").attr('disabled',false);
            $("#cantidad").removeAttr('required');
        }

        
        $("#clientes").css('display','none');
        
        $("#alerta").css('display','none');
        

    }
    else if (this.value == 1) {

       $("#atletas").css('display','none');
       $("#clientes").css('display','block');
       if (valor==0) {
        //console.log(valor);
        $("#clientes").css('display','none');
        $("#alerta").css('display','block');
        $("#alerta2").css('display','none');
        $("#cantidad").attr('disabled',true);
    }else{
        $("#alerta").css('display','none');
        $("#cantidad").removeAttr('disabled');
    }
    }

    });
});
</script>
@endsection