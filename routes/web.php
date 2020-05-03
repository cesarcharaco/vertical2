<?php

Route::group(['middleware' => ['web']], function() { 

    Route::post('login', 'Auth\LoginController@login'); 
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login'); 
    Route::get('form_reset','ForgotPasswordController@form_reset')->name('form_reset');
    Route::post('form_question','ForgotPasswordController@form_question')->name('form_question');
    Route::post('reset','ForgotPasswordController@reset')->name('reset');
    Route::post('resetpassword','ForgotPasswordController@reset_password')->name('resetpassword');
});
    
    Route::group(['middleware' => ['auth', 'web']], function () {
    Route::get('/', 'HomeController@index')->name('home');  
    Route::get('logout', 'Auth\LoginController@logout')->name('logout'); 
	Route::resource('empleados','EmpleadosController');
	Route::resource('productos','ProductosController');
	Route::resource('atletas','AtletasController');
    Route::resource('categorias','CategoriasController');
    Route::resource('cargos','CargosController');
    Route::resource('clientes','ClientesController');
    Route::resource('visitas','VisitasController');
    Route::get('visitas_todas','VisitasController@visitas_todas')->name('visitas_todas'); 
    Route::post('visitas_buscar','VisitasController@search')->name('visitas.search');
    Route::resource('horarios','HorariosController');
    

    //-----INVENTARIO----------    

    Route::resource('inventario','InventarioController')->except(['create']);
    Route::get('create/{id}/agregar','InventarioController@create')->name('inventario.create');
    Route::post('inventario/retiro','InventarioController@retiros')->name('retiros');
    Route::get('inventario/index/retiros','InventarioController@retiros_realizados')->name('retiros.realizados');
    Route::post('inventario/cancelar','InventarioController@cancelar')->name('inventario.cancelar');
    Route::get('inventario/index/entregas','InventarioController@entregas_realizadas')->name('entregas.realizadas');
    Route::post('inventario/cancelar_c','InventarioController@cancelar_c')->name('inventario.cancelar_c');
    Route::post('inventario/cancelar_a','InventarioController@cancelar_a')->name('inventario.cancelar_a');


    //------------------------------
    //---------SOLICITUDES----------

    Route::resource('solicitudes','SolicitudesController');
    Route::get('solicitud/{id}/buscar','SolicitudesController@buscar_clientes');
    Route::post('solicitudes/buscar_solicitudes','SolicitudesController@buscar_solicitudes')->name('solicitudes.buscar_solicitudes');
    Route::post('solicitudes/operaciones','SolicitudesController@operaciones')->name('operaciones');
    //------------------------
    //---------Agenda---------    
    Route::resource('agenda','AgendaController');
    Route::post('agenda/operaciones','AgendaController@operaciones')->name('operaciones.agenda');

    //-------------------- asistencias

    Route::get('asistencias/empleados','AsistenciasController@asistencias_empleados')->name('asistencias.empleados');
    Route::post('asistencia/marcar','AsistenciasController@asistencia_marcar')->name('asistencia.marcar');

    Route::post('inasistencias/anteriores','AsistenciasController@inasistencias')->name('inasistencias');
    Route::get('inasistencias/anteriores/{fecha}/retorno','AsistenciasController@retorno_anteriores')->name('asistencias.anteriores.retorno');
    


    //---------- modulos y privilegios

    Route::resource('modulos','ModulosController');
    Route::resource('usuarios','UsuariosController');
    Route::get('asignar/create','ModulosController@asignar_create')->name('asignar.create');
    Route::post('asignar/privilegios','ModulosController@asignar_privilegios')->name('asignar.privilegios');
    Route::get('asignar/{id_usuario}/edit','ModulosController@asignar_edit')->name('asignar.edit');
    Route::post('asignar/update','ModulosController@asignar_update')->name('asignar.update');
 
    //------------PDFS-----------------

    Route::get('pdf/empleados','PdfController@mostrar_empleados')->name('pdf.empleados');
    Route::get('pdf/atletas','PdfController@mostrar_atletas')->name('pdf.atletas');
    Route::get('pdf/clientes','PdfController@mostrar_clientes')->name('pdf.clientes');    
    Route::get('pdf/productos','PdfController@mostrar_productos')->name('pdf.productos');
    Route::get('pdf/categorias','PdfController@mostrar_categorias')->name('pdf.categorias');
    Route::get('pdf/cargos','PdfController@mostrar_cargos')->name('pdf.cargos');
    Route::get('pdf/{id_solicitud}/solicitud','PdfController@mostrar_solicitud')->name('pdf.solicitud');
    Route::get('pdf/{id_empleado}/horario','PdfController@mostrar_horario')->name('pdf.horario');
    Route::get('pdf/visitas','PdfController@mostrar_visitas')->name('pdf.visitas');
    Route::get('pdf/bitacora','PdfController@mostrar_bitacora')->name('pdf.bitacora');    
    Route::post('pdf/asistencias','PdfController@pdf_asistencias')->name('pdf.asistencias');
    //----------------------------
    // Backup routes
    Route::get('backup', 'BackupController@index')->name('backup.index');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/restore/{filename}', 'BackupController@restore')->name('backup.restore');
    Route::get('backup/download/{filename}', 'BackupController@download')->name('backup.download');
    Route::post('backup/delete', 'BackupController@delete')->name('backup.delete');

    Route::resource('graficas','GraficasController');
    Route::get('bitacora','BitacoraController@index')->name('bitacora.index');
    Route::get('bitacora/vaciar','BitacoraController@vaciar')->name('bitacora.vaciar');
    Route::get('bitacora/filtro','BitacoraController@filtro_fecha')->name('bitacora.filtro');
    
    //Ayuda
    Route::get('ayuda_linea','AyudaController@index')->name('ayuda_linea');
    Route::get('ayuda_empleado','AyudaController@ayudaEmpleado')->name('ayuda_empleado');
    Route::get('ayuda_horario','AyudaController@ayudaHorario')->name('ayuda_horario');
    Route::get('ayuda_agenda','AyudaController@ayudaAgenda')->name('ayuda_agenda');
    Route::get('ayuda_asistencia','AyudaController@ayudaAsistencia')->name('ayuda_asistencia');
    Route::get('ayuda_visita','AyudaController@ayudaVisita')->name('ayuda_visita');
    Route::get('ayuda_atleta','AyudaController@ayudaAtleta')->name('ayuda_atleta');
    Route::get('ayuda_inventario','AyudaController@ayudaInventario')->name('ayuda_inventario');
    Route::get('ayuda_bitacora','AyudaController@ayudaBitacora')->name('ayuda_bitacora');
    Route::get('ayuda_usuario','AyudaController@ayudaUsuario')->name('ayuda_usuario');        

});


