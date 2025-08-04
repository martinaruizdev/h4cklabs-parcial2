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
    ->middleware('auth', 'isAdmin');

Route::get('maquinas/publicar', [\App\Http\Controllers\MachinesController::class, 'create'])
    ->name('machines.create')
    ->middleware('auth', 'isAdmin');

Route::post('noticias/publicar', [\App\Http\Controllers\NewsController::class, 'store'])
    ->name('news.store')
    ->middleware('auth', 'isAdmin');

Route::post('maquinas/publicar', [\App\Http\Controllers\MachinesController::class, 'store'])
    ->name('machines.store')
    ->middleware('auth', 'isAdmin');

Route::get('noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'delete'])
    ->name('news.delete')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::get('maquinas/{id}/eliminar', [\App\Http\Controllers\MachinesController::class, 'delete'])
    ->name('machines.delete')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::delete('noticias/{id}/eliminar', [\App\Http\Controllers\NewsController::class, 'destroy'])
    ->name('news.destroy')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::delete('maquinas/{id}/eliminar', [\App\Http\Controllers\MachinesController::class, 'destroy'])
    ->name('machines.destroy')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::get('noticias/editar/{id}', [\App\Http\Controllers\NewsController::class, 'edit'])
    ->name('news.edit')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::get('maquinas/editar/{machine}', [\App\Http\Controllers\MachinesController::class, 'edit'])
    ->name('machines.edit')
    ->whereNumber('machine')
    ->middleware('auth', 'isAdmin');

Route::put('noticias/editar/{id}', [\App\Http\Controllers\NewsController::class, 'update'])
    ->name('news.update')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::put('maquinas/editar/{id}', [\App\Http\Controllers\MachinesController::class, 'update'])
    ->name('machines.update')
    ->whereNumber('id')
    ->middleware('auth', 'isAdmin');

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth', 'isAdmin');

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::get('registrarse', [\App\Http\Controllers\RegisterController::class, 'register'])
    ->name('auth.register');

Route::post('registrarse', [\App\Http\Controllers\RegisterController::class, 'store'])
    ->name('auth.register.store');

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

Route::get('perfil', [\App\Http\Controllers\ProfileController::class, 'show'])
    ->name('profile.show')
    ->middleware('auth');

Route::get('perfil/editar', [\App\Http\Controllers\ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');

Route::put('perfil', [\App\Http\Controllers\ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('usuarios/{id}', [\App\Http\Controllers\UserController::class, 'show'])
    ->name('users.show')
    ->middleware('auth', 'isAdmin')
    ->whereNumber('id');

Route::get('usuarios/editar/{id}', [\App\Http\Controllers\UserController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth', 'isAdmin')
    ->whereNumber('id');

Route::put('usuarios/editar/{id}', [\App\Http\Controllers\UserController::class, 'update'])
    ->name('users.update')
    ->middleware('auth', 'isAdmin')
    ->whereNumber('id');

Route::delete('usuarios/{id}/eliminar', [\App\Http\Controllers\UserController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth', 'isAdmin')
    ->whereNumber('id');