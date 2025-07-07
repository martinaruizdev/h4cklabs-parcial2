<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
//nombre ruta en frontend
Route::get('quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about'); //nombre ruta a nivel logico

Route::get('noticias/listado', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name('news.index');

Route::get('maquinas/listado', [\App\Http\Controllers\MachinesController::class, 'index'])
    ->name('machines.index');

Route::get('noticias/{id}', [\App\Http\Controllers\NewsController::class, 'view'])
    ->name('news.view')
    ->whereNumber('id');

Route::get('maquinas/{machine}', [\App\Http\Controllers\MachinesController::class, 'view'])
    ->name('machines.view')
    ->middleware('required-level')
    ->whereNumber('machine');

Route::get('noticias/publicar', [\App\Http\Controllers\NewsController::class, 'create'])
    ->name('news.create')
    ->middleware('auth');

Route::get('maquinas/publicar', [\App\Http\Controllers\MachinesController::class, 'create'])
    ->name('machines.create')
    ->middleware('auth');

Route::post('noticias/publicar', [\App\Http\Controllers\NewsController::class, 'store'])
    ->name('news.store')
    ->middleware('auth');

Route::post('maquinas/publicar', [\App\Http\Controllers\MachinesController::class, 'store'])
    ->name('machines.store')
    ->middleware('auth');

Route::get('noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'delete'])
    ->name('news.delete')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('maquinas/{id}/eliminar', [\App\Http\Controllers\MachinesController::class, 'delete'])
    ->name('machines.delete')
    ->whereNumber('id')
    ->middleware('auth');

Route::delete('noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'destroy'])
    ->name('news.destroy')
    ->whereNumber('id')
    ->middleware('auth');

Route::delete('maquinas/{id}/eliminar', [\App\Http\Controllers\MachinesController::class, 'destroy'])
    ->name('machines.destroy')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('noticias/editar/{id}', [\App\Http\Controllers\NewsController::class, 'edit'])
    ->name('news.edit')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('maquinas/editar/{machine}', [\App\Http\Controllers\MachinesController::class, 'edit'])
    ->name('machines.edit')
    ->whereNumber('machine')
    ->middleware('auth');

Route::put('noticias/editar/{id}', [\App\Http\Controllers\NewsController::class, 'update'])
    ->name('news.update')
    ->whereNumber('id')
    ->middleware('auth');

Route::put('maquinas/editar/{id}', [\App\Http\Controllers\MachinesController::class, 'update'])
    ->name('machines.update')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

Route::get('maquinas/{id}/verificar-nivel', [\App\Http\Controllers\LevelVerificationController::class, 'show'])
    ->name('machines.level-verification.show')
    ->whereNumber('id');

Route::post('maquinas/{id}/verificar-nivel', [\App\Http\Controllers\LevelVerificationController::class, 'save'])
    ->name('machines.level-verification.save')
    ->whereNumber('id');