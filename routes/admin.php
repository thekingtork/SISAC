<?php
Route::resource('users', 'UserController');
Route::resource('estudiantes', 'EstudianteController');
Route::resource('institucions', 'InstitucionController');
Route::resource('docentes', 'DocenteController');
Route::resource('asignaturas', 'AsignaturaController');
Route::resource('aspectos', 'AspectoController');
Route::resource('anios', 'AnioController');
Route::resource('areas', 'AreaController');
Route::resource('grupos', 'GrupoController');
Route::resource('definitivas', 'DefinitivaController');
Route::resource('grados', 'GradoController');
Route::get('grados/asignaturas/{grado}','GradoController@showAsignaturas')->name('grados.asignaturas');
Route::get('grados/vincular/asignaturas/{grado}','GradoController@VincularAsignaturas')->name('vincular.gradosasignaturas');
Route::post('grados/vincular/asignaturas/','GradoController@VincularAsignaturasStore')->name('vincular.grados.asignaturas');
Route::resource('jornadas', 'JornadaController');
Route::resource('estandars', 'EstandarController');
Route::resource('dbas', 'DBAController');
Route::resource('indicadors', 'IndicadorController');
Route::resource('notas', 'NotaController');
Route::resource('asignacions', 'AsignacionController');
Route::resource('periodos', 'PeriodoController');
Route::get('planillas/reset/{planilla}','PlanillaController@reset')->name('planillas.reset');
Route::get('planillas/refresh/{planilla}', 'PlanillaController@updateDefinitivas')->name('planillas.refresh');
Route::get('planillas/print/{planilla}', 'PlanillaController@print')->name('planillas.print');
Route::get('suggestions/import','SuggestionController@import')->name('suggestions.import');
Route::post('suggestions/process','SuggestionController@process')->name('suggestions.process');
Route::resource('suggestions', 'SuggestionController');
Route::resource('planillas', 'PlanillaController')->except(['show']);
Route::resource('reportes', 'ReportesController')->only(['index']);
Route::resource('acudiente', 'AcudienteController')->only(['edit','store','update','destroy']);
Route::get('planillas/getFiltro','PlanillaController@getFiltro')->name('planillas.getfiltro');
Route::middleware(['verifyIndicadores'])->group(function (){
    Route::get('planillas/{planilla}','PlanillaController@show')->name('planillas.show');
});

Route::get('acudiente/{estudiante}', 'AcudienteController@create')->name('acudiente.create');
Route::post('reportes/academico/', 'ReportesController@reporteAcademico')->name('reportes.academico');
Route::post('reportes/academico/sabana', 'ReportesController@sabana')->name('reportes.academico.sabana');
Route::post('reportes/academico/logros', 'ReportesController@reporteLogros')->name('reportes.academico.logros');
Route::resource('import-users', 'InportUserController')->only(['index', 'store']);
Route::resource('import-estudiantes', 'ImportEstudianteController')->only(['index', 'store']);
Route::post('docentes/addAsignaturas/{id}',['as' => 'docentes.addAsignaturas', 'uses' => 'DocenteController@addAsignaturas']);
Route::get('estudiantes/municipios/{id}',['as' => 'municipios', 'uses' => 'MunicipioController']);
Route::get('estudiantes-import/','ImportEstudianteController@index')->name('import-estudiantes.index');
Route::post('estudiantes-import/','ImportEstudianteController@store')->name('import-estudiantes.store');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');


Route::get('notas/dataPlanilla/asignacion/{asignacion}/periodo/{periodo}','NotaController@dataPlanilla')->name('notas.dataplanilla');
Route::get('notas/getPlanilla/asignacion/{asignacion}/periodo/{periodo}','NotaController@getPlanilla')->name('notas.getplanilla');
