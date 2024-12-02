<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Estudiante;


Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function() {
    return view('auth.login');
});

Route::get('logout', function() {
    return 'Logout usuario';
});

Route::get('perfil/{id?}', function($id = null) {
    return $id ? 'Visualizar el currículo de '. $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');

Route::get('pruebaDB/{id}', function ($id) {
    //$estudiantes = Estudiante::all();
    //foreach( $estudiantes as $estudiante ) {
        //echo $estudiante->nombre . ' - ' . $estudiante->ciclo . '<br />';
    //}

    //$estudiante = Estudiante::findOrFail($id);
    //echo $estudiante->nombre . ' - ' . $estudiante->ciclo;

    $estudiante = Estudiante::where('ciclo', 'C_'. $id)->firstOrFail();
    echo $estudiante->nombre . ' - ' . $estudiante->ciclo;

});



include __DIR__.'/actividades.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';
