<!DOCTYPE html>
<html>
<head>
	<title>Estado de Solicitud</title>
</head>
<body>
<p>Su Solicitud de espacio:</p>
<table>
	<tr>
		<td>Espacio Solicitado: {{ $solicitud->espacios->espacio }}</td>
	</tr>
	<tr>
		<td>Actividad: {{ $solicitud->nombre_actividad }}</td>
	</tr>
	<tr>
		<td>Fecha: {{ $solicitud->fecha }}</td>
	</tr>
	<tr>
		<td>Status: {{ $solicitud->status }}</td>
	</tr>
	@if($motivos!=="")
	<tr>
		<td>Motivos: {{ $motivos }}</td>
	</tr>
	@endif
</table>
</body>
</html>