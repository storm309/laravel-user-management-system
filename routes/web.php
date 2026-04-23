<?php


use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Mail\Testmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Secure route example
Route::get('/secure',function(){
    if(request()->secure()){
        return "This is a secure request";
    }
    return "Use HTTPS to access this route";
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Grouping routes with middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Domain routing example
Route::domain('shivam.com')->group(function () {
    Route::get('/', function () {
        return "This is my Home Page";
    });
    Route::get('/dashboard',function(Request $request){
        return[
            'path' => $request->path(),
            'url' => $request->url(),
            'fullUrl' => $request->fullUrl(),
            'isSecure' => $request->secure(),
            'previousUrl' => url()->previous()
        ];
    });
});

// Route with parameter constraints
Route::get('user/{id}', function ($id) {
    return "User ID: " . $id;
})->where('id', '[0-9]+'); // regular expression to ensure id is numeric

// Route with multiple parameters and constraints
Route::get('user/{id}/{name}', function ($id, $name) {
    return "User ID: " . $id . ", Name: " . $name;
})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']); // regular expression to ensure id is numeric and name is alphabetic

// Controller Grouping
Route::controller(App\Http\Controllers\StudentArray::class)->group(function () {
    Route::get('/students', 'index');
    Route::get('/students/names', 'printNames');
});

require __DIR__.'/auth.php';



// Form routes
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form-submit', [FormController::class, 'submitForm']);

// File upload route


Route::get('/upload', [App\Http\Controllers\uploadFile::class, 'showUploadForm']);
Route::post('/upload', [App\Http\Controllers\uploadFile::class, 'uploadFile']);

// Sending email route
Route::get('/send-email', function () {
    Mail::to('shivamkumarp447@gmail.com')->send(new Testmail());

    return 'Email sent successfully!';
});
