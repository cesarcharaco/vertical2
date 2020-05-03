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
    	<div class="col-lg-12">
    		<div class="card">
                <div class="card-header">
                    <strong>Retirar Productos de Inventario </strong> . <p>Todos los campos son requeridos (<b style="color:red;">*</b>)</p>
                </div>
                    {!! Form::open(['route' => ['inventario.update',1], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate']) !!}
                    
                        @csrf
                <div class="card-body card-block">
                        
                       <div class="row form-group">
                               
                                <div class="col col-md-4">
                                    <table class="table table-striped table-earning" >
                                        <tr>
                                            <th colspan="3"><label for="select" class=" form-control-label"><b style="color:red;">*</b>Productos a Retirar</label><br><small class="form-text text-muted">Debe seleccionar al menos uno</small></th>
                                        </tr>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad a Solicitar</th>
                                            <th>Existencia</th>
                                        </tr>
                                    @for($i=0;$i<count($id_producto);$i++)
                                        <tr>
                                            <td>
                                                <label for="producto" class=" form-control-label">{{ $productos[$i]}}</label>
                                                <input type="hidden" name="id_producto[]" value="{{ $id_producto[$i] }}">
                                            </td>
                                            <td>
                                                
                                                <input  type="number" id="cantidad" name="cantidad[]" value="0" class="form-control" required="required">
                                                <small class="form-text text-muted">Debe ingresar una cantidad menor a la de existencia</small>
                                            </td>
                                            <td>
                                            	{{ $existencia[$i] }}
                                            </td>
                                            
                                        </tr>  
                                    @endfor
                                    </table>
                                </div>
                        </div>
                        <div class="row form-group">
                                <div class="col col-md-1">
                                    <label for="observacion" class=" form-control-label"><b>Observación: </b></label>
                                </div>
                                <div class="col col-md-1">
                                    
                                </div>
                                <div class="col-12 col-md-6">
                                    &nbsp;&nbsp;{{$observacion}}
    								<input type="hidden" name="observacion" value="{{ $observacion }}">                                
                                </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="clave_admin" id="clave_admin">
                  	<div class="col-12 col-md-12" align="right">
                    <button type="button"  id="enviar" data-toggle="modal" data-target="#staticModal" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Enviar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Limpiar
                    </button>

                </div>

                </div>
            </div>
          {!! Form::close() !!}
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
                            <h5 class="modal-title" id="staticModalLabel">Retiro de Producto(s)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                ¿Seguro que desea retirar el/los Producto(s)?
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
<!-- modal static para ingreso de clave de superusuario-->
            <div class="modal fade" id="claveroot" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
             data-backdrop="static">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticModalLabel">Retiro de Producto(s)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
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
                            <button type="button" id="envio_datos" class="btn btn-primary">Confirmar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end modal static -->
                                           

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready( function(){

	$("#clave").on('keyup',function(event){
        var clave=this.value;
        $("#clave_admin").val(clave);
        
    });

    $("#envio_datos").on('click',function(){
        $("#form").submit();
    });
});
</script>
@endsection