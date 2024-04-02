<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/productos', function () {
//     return view('Hello, world');
// });

//Ruta para mostrar el formulario de crear producto

Route::get('/productos', [App\Http\Controllers\productoscontroller::class, 'index']);  

//Enviamos los datos del formulario a la base de datos con esta ruta

Route::get('/productos/mostrar', [App\Http\Controllers\productoscontroller::class, 'mostrar']);  

Route::get('/productos/crear', [App\Http\Controllers\productoscontroller::class, 'crear']);  


