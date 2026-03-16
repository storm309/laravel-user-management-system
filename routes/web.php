<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ProductController;

// Route::get('/Home', function () {
//     return view('Home');
// });

// Route::get('/Welcome', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Dynamic Routing
// Route::get('/user/{id}/{name}', function ($id, $name) {
//     return 'User ID: '.$id.', User Name: '.$name;
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/product', [ProductController::class, 'index']);

// Groupand prefix


// Route::prefix('products')->group(function () {

//     Route::get('dashboard', function () {
//         return view('product.dashboard');
//     });

//     Route::get('categories', function () {
//         return view('product.categories');
//     });

//     Route::get('products', function () {
//         return view('product.product');
//     });

// });


// Header Example

// Route::prefix('admin')->group(function () {

//     Route::get('/users', function () {
//         return "Admin Users";
//     });

// });

// Route::get('/header', function () {
//     return response("Hello World")
//         ->header('Content-Type', 'text/plain')
//         ->header('X-Custom-Header', 'Laravel');
// });


// Set Cookie Example

use Illuminate\Support\Facades\Cookie;

Route::get('/set-cookie', function () {

    $response = response("Cookie Set Successfully");

    $response->cookie('username', 'Shivam', 1);

    return $response;

});


// Get Cookie Example

Route::get('/get-cookie', function () {

    $value = Cookie::get('username');

    return "Cookie Value: " . $value;

});


// Delete Cookie Example

Route::get('/delete-cookie', function () {

    Cookie::queue(Cookie::forget('username'));

    return "Cookie Deleted";

});


// Redirect Example
// Route::get('/dashboard', function () {
//     return "Welcome to the Dashboard";
// });

// Route::get('/new-dashboard', function () {
//     return redirect('/dashboard')
//     ->with('Success' , 'You have been redirected to the dashboard');
// });

// named route example

// Route::get('/old-dashboard',function(){
//     return "Dashboard";
// })->name('dashboard');

// Route::get('/student', function () {
//     return redirect()->route('dashboard');
// });

// LOGIN ROUTE with email and password

Route::get('/login', function () {

$email = request('email');
$password = request('password');

if($email == 'shivam@example.com' && $password == '123123') {
    return redirect()->route('dashboard')
    ->with('Success' , 'You have been logged in successfully');
}

return redirect()->back()->with('Error', 'Invalid email or password');

});

Route::get('/dashboard', function () {
    return "Welcome to Dashboard";
})->name('dashboard');
