<?php

use App\Http\Livewire\Cotizaciones;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Deudas;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Proveedores;
use App\Http\Livewire\Pdv;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('/productos',Productos::class)->name('productos');
    Route::get('/cotizaciones',Cotizaciones::class)->name('cotizaciones');
    Route::get('/proveedores',Proveedores::class)->name('proveedores');
    Route::get('/pdv',Pdv::class)->name('pdv'); 
    Route::get('/contabilidad/deudas',Deudas::class)->name('deudas');   

    // Route::view('/dashboard','dashboard')->name('dashboard');
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
});

