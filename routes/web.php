<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/users', function () {
    // sleep(3);
    return Inertia::render('Users', [
        'users' => User::paginate(5)
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::post('logout', function () {
    return redirect('/');
});

Route::delete('/delete' , function(){
    User::find(request('id'))->delete();
    return redirect('/users');
});
