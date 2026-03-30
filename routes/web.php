<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SingleActionController;
use App\Http\Middleware\checkUser;
use App\Http\Middleware\checkCourse;
use Illuminate\Support\Facades\Cookie;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('Home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/content', function () {
    return view('content');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/read-cookie', function () {

//     $value = request()->cookie('username');

//     return "Cookie Value: " . $value;

// });


// // Delete Cookie Example

// Route::get('/delete-cookie', function () {

//     Cookie::queue(Cookie::forget('username'));

//     return "Cookie Deleted";

// });


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

// redirecting to controller

// Route::get('/ab', [UserController::class, 'index']);

// Route::get('/go', function () {
//     return redirect()->action([UserController::class,'index']);
// });


// LOGIN ROUTE with email and password

// Route::get('/login', function () {

// $email = request('email');
// $password = request('password');

// if($email == 'shivam@example.com' && $password == '123123') {
//     return redirect()->route('dashboard')
//     ->with('Success' , 'You have been logged in successfully');
// }

// return redirect()->back()->with('Error', 'Invalid email or password');

// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



// Question 1 of StudentProfile

// Route::get('/student/{id}', [StudentController::class, 'studentProfile'])->name('student.profile');


// Product routes - Question 2
// Route::get('/product/{id}', [ProductController::class, 'showDetails'])->name('product.details');
// Route::get('/product-redirect', [ProductController::class, 'redirectToProduct']);

// Resourceful Routing for ProductController
// Route::resource('products', ProductController::class);
// // Resourceful Routing for BookController (This is for API Controller)
// Route::resource('books', BookController::class);
// // API Resourceful Routing for BookController
// Route::apiResource('books', BookController::class);
// // Single Action Controller Route
// Route::get('/single-action', SingleActionController::class);
// // Single Action Controller Route with parameters
// Route::get('/single-action/{name}/{id}', SingleActionController::class);

// // Middleware Example
// Route::get('/test',[SingleActionController::class,'test'])->middleware('checkUser');

// // Middleware Example for CourseMiddleware
// Route::get('/course',[SingleActionController::class,'course'])
// ->middleware('App\Http\Middleware\CourseMiddleware');

// // Middleware Example for StudentController
// Route::get('/student/{id}', [StudentController::class, 'studentProfile'])
// ->middleware('App\Http\Middleware\CourseMiddleware');
// // Midddleware for checkCourse
// Route::get('/test', [StudentController::class, 'studentProfile']);
// Route::get('/test1', [StudentController::class, 'studentProfile']);
// // middleware with alias
// Route::get('/test2', [StudentController::class, 'studentProfile'])->middleware('checkCourse');

// Blade Template Inheritance
Route::get('/test', function () {
    return view('content');
});

Route::get('/home1', function () {
    return view('home1');
});

Route::get('/about1', function () {
    return view('about1');
});
