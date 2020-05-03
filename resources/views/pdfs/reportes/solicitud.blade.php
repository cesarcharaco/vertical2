@extends('pdfs.partials.layout-cintillo')
@section('css')
<style>
  th {
    padding: 5px;
  }
  td{
  	text-align: center;
  	font-size: 10;
  	padding: 5px;
  	height: 10px;
  }
</style>
@endsection

@section('content')


<table id="solicitud" border="0" width="100%">
		
<tr>
<td colspan="3" style="text-align: left;"><b>Dirigido a:</b> {{ $solicitud->dirigido }}</td>    
</tr>           
<tr>
  <td colspan="3" style="text-align: left;"><b>Nombre de la Actividad:</b> {{ $solicitud->nombre_actividad }}</td>
</tr>
<tr>
  <td style="text-align: left;"><b>Nombre del Responsable de la Actividad:</b> {{ $solicitud->responsable }}</td>
  <td colspan="2" style="text-align: left;"><b>Teléfonos:</b> {{ $solicitud->clientes->telefono }}</td>
</tr>

<tr>
  <td style="text-align: left;"><b>Por medio de la presente se solicita el espacio:</b> {{ $solicitud->espacios->espacio }}</td><td colspan="2" style="text-align: left;"><b>del piso:</b> {{ $solicitud->espacios->piso }}</td>
</tr>
<tr>
  <td style="text-align: left;"><b>Para el día:</b> {{ \Carbon\Carbon::parse($solicitud->fecha)->format('d/m/Y') }}</td><td style="text-align: left;"><b>a partir de:</b> {{ str_limit($solicitud->bloques->hora,8) }}</td><td style="text-align: left;"><b>Hasta:</b> {{ str_limit($bloque_final->hora,8) }}</td>
</tr>
<tr>
  <td colspan="3" style="text-align: left;"><b>Espacio donde estaremos relizando la siguiente actividad:</b> {{ $solicitud->descripcion_actividad }}</td>
</tr>
<tr>
  <td colspan="3" style="text-align: left;"><b>Que contará con la participación de apróximadamente: </b> ({{ $solicitud->num_asistentes }}) asistentes</td>
</tr>
<tr>
  <td colspan="3" style="text-align: left;"><b>En tal sentido nos comprometemos a traer la donación de :</b><ul> @foreach($solicitud->productos as $key)
                          <li>{{ $key->nombre }}</li>
                       @endforeach
                     </ul>
  </td>
</tr>
<tr>
  <td colspan="3" style="text-align: justify;">
  <p>
    Que seras entragado con tres días de anticipación a la realización de la actividad. De igual manera nos comprometemos a cumplir las siguientes normas:
  </p>
    
  <ul style="font-size: 12px !important;">
    <li>Entrega el espacio en las mismas condiciones que nos ha sido entregado (limpio y ordenado)</li>
    <li>No utilizar cinta adhesiva ni clavos en las paredes (cualquier cambio a la infraestructura para ambientar el espacio notificar a la Coordinacion General de la GBMP La Victoria para su aprobación)</li>
    <li> Respetar las normas  buenas costumbres dentro y fuera de los espacios. </li>
    <li> Utilizar los epsacios con responsabildiad y sentido de pertenencia </li>
    <li>Se encuentra terminantemente PROHIBIDO consumir alimentos o bebidas en el auditorio de la GBMP La Victoria, el único sitio donde se puede ingerir alimentos es en el edificio. </li>
    <li>Las instalaciones son gratuitas, por lo tanto queda prohibido el cobro de incentivos monetaros de inscripción o mensualidad pra la participación en cualquier evento o actividad </li>
    <li>Durante la realización de algún evento o actividad no debe colocarse musica con contenido violento u ofensivo </li>
    <li>Respetar a los trabajadores y trabajadoras de la GBMP Hugo Chavez </li>
    <li>Prohibido fumar dentro y en los alrededores de las instalaciones de la gran base</li>
    <li>Respetar y acatar las instrucciones de la Guardia del Pueblo </li>
    <li>Hacer mencion a la GBMP Hugo Chavez, en las palabras de bienvenida de la actividad asi como hacer entrega de un reconocimiento por escrito </li>
    <li>No se prestan sillas, ni mesas </li>
    <li>Por favor respeta el tiempo que solicitó para la actividad </li>
    <li>Cuando son actividades masivas deben traer una persona de su selección solicitando la cedula lamitada y tomar asistencia para no colapsar los espacios en recepcion </li>
    <li> Las instalaciones son completamente gratuitas y se phohibe hacer cualquier cobra para el evento o actividad que este realizando.</li>
  </ul>
  </td>
<tr>
  <td colspan="3" style="text-align: center !important;">
    ________________________________________ <br>
    FIRMA DEL SOLICITANTE <br>
    CI: <br>
    TELÉFONO:
  </td>
</tr>
</table>
@endsection 