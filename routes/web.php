<?php
use App\Bolsa;
use App\Contacto;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*Son ligas para enviar correos*/
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;

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

Route::get('/', function () {
    $getAllBolsas = Bolsa::all();
    $totalBolsas = $getAllBolsas->count();
    $bolsas= Bolsa::paginate(9);
    return view('welcome', compact('bolsas', 'totalBolsas'));
});


Route::post('/contactoProcess', function (Request $request) {
    $comentario = $request->all();
    Contacto::create($comentario); 

    Mail::to('mineydi27122015@gmail.com')->send(new MessageReceived($comentario));
    return redirect('/')->with('success', 'Tu comentario se ha enviado');
});

Auth::routes();

Route::resource('/bags', 'HomeController');
//Route::get('/bags', 'HomeController@index')->name('admin');

Route::resource('/contactos', 'ContactoController');


Route::post('/modal/{id}', function ($id) {
    $bolsa = Bolsa::findOrFail($id);
    return view('modal', compact('bolsa'));
});