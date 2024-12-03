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

    //$estudiante = Estudiante::where('ciclo', 'like','C_1%')->get();
    //foreach($estudiante as $est){
    //    echo $est->nombre .'<br>';
    //}

    $estudiante = Estudiante::where('votos','>',100)->take(10)->get();

    $salida='<ul>';
    $count = Estudiante::where('votos', '>', 100)->count();
    $maxVotos = Estudiante::max('votos');
    $minVotos = Estudiante::min('votos');
    $avgVotos = Estudiante::avg('votos');
    $sumVotos = Estudiante::sum('votos');

    $salida.='<li> Estudiantes con mas de 100 votos: '.$count.'</li>';
    $salida.='<li> Mayor número de votos: '.$maxVotos.'</li>';
    $salida.='<li> Menor número de votos: '.$minVotos.'</li>';
    $salida.='<li> Promedio de votos: '.$avgVotos.'</li>';
    $salida.='<li> Total de votos: '.$sumVotos.'</li>';

    foreach($estudiante as $estud){
        $salida.='<li>'. $estud->nombre. ' - '.$estud->votos.'</li>';
    }

    $count = Estudiante::where('votos', '>', 100)->count();
    echo 'Antes: ' . $count . '<br />';

    $estudiante = new Estudiante;
    $estudiante->nombre = 'Juan';
    $estudiante->apellidos = 'Martínez';
    $estudiante->direccion = 'Dirección de Juan';
    $estudiante->votos = 130;
    $estudiante->confirmado = true;
    $estudiante->ciclo = 'DAW';
    $estudiante->save();

    $count = Estudiante::where('votos', '>', 100)->count();
    echo 'Después: ' . $count . '<br />';

    return $salida.'</ul>';

});



include __DIR__.'/actividades.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';
