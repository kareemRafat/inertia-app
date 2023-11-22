<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    // user with search and pagination and save the old querystring parameters
    $users = User::when(request('search') , function ($query, $search) {
        $query->where('name', 'like', "%{$search}%");
    })->paginate(5)->withQueryString();
    return Inertia::render('Users', [
        'users' => $users,
        'searchFilter' => request('search')
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});

# users form #
Route::get('/create', function () {
    return Inertia::render('Create');
});

# users form post #
Route::post('/users' , function(Request $request){
    $validatedUser = $request -> validate([
        'name' => ['required'] ,
        'email' => ['required', 'email'],
        'password' => ['required' ,'max:5']
    ]);

    User::create($validatedUser);

    return redirect('/users');
});

Route::post('logout', function () {
    return redirect('/');
});

Route::delete('/delete', function () {
    User::find(request('id'))->delete();
    return redirect('/users');
});
