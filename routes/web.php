<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\USerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('login');
});

//-------------------- Dashboard:
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  //before page dashboard -> must verified email


//-------------------- Profile:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//-------------------- Panel admin:
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/' , [PanelController::class , 'index']);
    Route::resource('/users' , USerController::class);
    Route::resource('/roles' , RoleController::class);
    Route::get('/create_user_roles/{id}' , [USerController::class , 'createUserRoles'])->name('create.user.roles');
    Route::post('/store_user_roles/{id}' , [USerController::class , 'storeUserRoles'])->name('store.user.roles');
});



//TODO -> upload image -> create + update
//TODO -> xampp/php/php.init -> ;extension=gd  -> extension=gd برمیداریم
//TODO -> @hasanyrole('مدیر سایت') -> dont work

