<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/test2', function(){
    return view('plantilla0');
});

Route::get('/test3', function (){
   return view('test');
});

/////////////// LAYOUTS/////////////////

Route::get('/', function (){
    return view('main');
});

#########################################
############## RAW SQL ##################
Route::get('/select', function() {
    $regiones = DB::select('SELECT regID,regNombre FROM regiones ');
    return view('vistaRegiones', [
        'regiones' => $regiones
    ]);
});

Route::get('/insert', function(){
    DB::insert('INSERT INTO regiones (regNombre) VALUES ("Asgard")' );
    return redirect('/select')->with('mensaje', 'Region: '.'Asgard'.' agregada con exito') ;
});

Route::get('/update', function(){
    DB::update('UPDATE regiones SET regNombre = "Argentinner" WHERE regID = 9');
    return redirect('/select')->with('mensaje', 'Region: '.'Asgard'.' modificada con exito') ;
});

##################################################
############ QUERY BUILDER #######################

Route::get('/qbSelect', function(){
    //$regiones = DB::table('regiones')->get();
    /*$regiones = DB::table('regiones')
                            ->where('regNombre','LIKE','%del%')
                            ->get();
    $regiones = DB::table('regiones')
        ->whereIn('regID', [9, 2])
        ->get();

    return dd($regiones);
});
*//*
####################################################
############# Admin Regiones ######################

Route::get('/adminRegiones', function(){
    $regiones = DB::table('regiones')->get();
    return view('/adminRegiones', ['regiones'=> $regiones ]);
});

Route::get('/formAgregarRegion', function(){
    return view('formAgregarRegion');
});

Route::post('/agregarRegion', function(){
    $regNombre = $_POST['regNombre'];
    DB::table('regiones')->insert(
            ['regNombre'=>$regNombre]
    );
    return redirect('/adminRegiones')->with('agregarConfirmado', 'Region: '.$regNombre.' agregado con exito');
});

Route::get('/formModificarRegion/{regID}', function($regID){
    $region = DB::table('regiones')
                    ->where('regID', $regID)
                    ->first();
    return view('/formModificarRegion', ['region' => $region]);
});

Route::post('/modificarRegion', function(){
    $regNombre = $_POST['regNombre'];
    $regID = $_POST['regID'];
    DB::table('regiones')
            ->WHERE('regID', $regID)
            ->UPDATE(['regNombre'=> $regNombre]);
    return redirect('/adminRegiones')->with('agregarConfirmado', 'Region: '.$regNombre.' modificado con exito');
});
Route::get('formEliminarRegion/{regID}', function($regID){
    $region = DB::table('regiones')
                ->WHERE('regID', $regID)
                ->FIRST();

    return view('formEliminarRegion', ['region'=>$region]);

});

Route::post('/eliminarRegion',function (){
    $regNombre = $_POST['regNombre'];
    $regID = $_POST['regID'];
    DB::table('regiones')
        ->WHERE('regID',$regID)
        ->DELETE();
    return redirect('/adminRegioness')->with('agregarConfirmado', 'La Region '.$regNombre.' ha sido eliminada');
});

#######################################################
################## ADMIN DESTINOS #####################

Route::get('/adminDestinos', function() {
    $destinos = DB::table('destinos')
        ->join('regiones', 'destinos.regID', '=', 'regiones.regID')
        ->get();
    return view('/adminDestinos', ['destinos' => $destinos]);
});

Route::get('/formAgregarDestino', function(){
    $regiones = DB::table('regiones')
                ->get();
    return view('formAgregarDestino', ['regiones'=>$regiones]);
});

Route::post('/agregarDestino', function(){
    $destNombre = $_POST['destNombre'];
    $regID = $_POST['regID'];
    $destPrecio = $_POST['destPrecio'];
    $destAsientos = $_POST['destAsientos'];
    $destDisponibles = $_POST['destDisponibles'];
    $destActivo = $_POST['destActivo'];

    DB::table('destinos')->insert(
        ['destNombre'=>$destNombre,
            'regID'=>$regID,
            'destPrecio'=>$destPrecio,
            'destAsientos'=>$destAsientos,
            'destDisponibles'=>$destDisponibles,
            'destActivo'=>$destActivo]
    );
    return redirect('/adminDestinos')->with('agregarConfirmado', 'Region: '.$destNombre.' agregado con exito');
});

Route::get('/formModificarDestino/{destID}', function($destID){
    $destino = DB::table('destinos')
        ->where('destID', $destID)
        ->first();
    return view('/formModificarDestino', ['destino' => $destino]);
});

Route::post('/modificarDestino', function(){
    $destNombre = $_POST['destNombre'];
    $destID = $_POST['destID'];
    DB::table('destinos')
        ->WHERE('destID', $destID)
        ->UPDATE(['destNombre'=> $destNombre]);
    return redirect('/adminDestinos')->with('agregarConfirmado', 'Region: '.$destNombre.' modificado con exito');
});

Route::get('/formEliminarDestino/{destID}', function($destID){
    $destino = DB::table('destinos')
                    ->where('destID',$destID)
                    ->join('regiones', 'destinos.regID', '=', 'regiones.regID')
                    ->first();
    return view('formEliminarDestino', ['destino'=>$destino]);
});

Route::post('/eliminarDestino',function (){
    $destNombre = $_POST['destNombre'];
    $destID = $_POST['destID'];
    DB::table('destinos')
        ->WHERE('destID',$destID)
        ->DELETE();
    return redirect('/adminDestinos')->with('agregarConfirmado', 'El Destino '.$destNombre.' ha sido eliminado');
});

####################################################
############# ELOQUENT #############################

use \App\Noticia;
use App\Region;

Route::get('/traerNoticias', function(){
    $noticia = \App\Noticia::find(4);

    dd($noticia);
});

Route::get('/crearNoticia', function (){
    $noticia = new Noticia;
    $noticia->titulo = 'Nueva noticia';
    $noticia->noticia = 'Texto noticia';
    $noticia->autor = 'Autor noticia';
    $noticia->imagen = 'nombre.jpg';
    $noticia->save();

});

Route::get('/modificarNoticia', function (){
    $noticia = Noticia::find(6);
    $noticia->titulo = 'Noticia modificada';
    $noticia->noticia = 'Texto modificado';
    $noticia->autor = 'Noticia modificada';
    $noticia->imagen = 'nombreModificado.jpg';
    $noticia->save();
});

Route::get('/adminRegiones2', function(){
    $regiones = \App\Region::get();
    return view('adminRegiones', ['regiones'=>$regiones]);
});*/

Route::get('/', 'RegionesController@index');

Route::get('/adminRegiones', 'RegionesController@index');

Route::get('/formAgregarRegion', 'RegionesController@create');

Route::post('/agregarRegion', 'RegionesController@store');

Route::get('/formModificarRegion/{regID}', 'RegionesController@edit');

Route::post('/modificarRegion', 'RegionesController@update');

Route::get('/formEliminarRegion/{regID}', 'RegionesController@show');

Route::get('/eliminarRegion/{regID}', 'RegionesController@destroy');

///////////////Destinos/////////////////////

Route::get('/adminDestinos', 'DestinosController@index');

Route::get('/formAgregarDestino', 'DestinosController@create');

Route::post('/agregarDestino', 'DestinosController@store');

Route::get('/formModificarDestino/{destID}', 'DestinosController@edit');

Route::post('/modificarDestino', 'DestinosController@update');

Route::get('/formEliminarDestino/{destID}', 'DestinosController@show');

Route::get('/eliminarDestino/{destID}', 'DestinosController@destroy');
