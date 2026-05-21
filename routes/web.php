<?php
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentArray;
use App\Http\Controllers\uploadFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\Testmail;
use App\Models\sports;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

Route::get('/insert', function () {

    DB::table('sports')->insert([
        'name' => 'Football',
        'description' => 'A team sport played with a spherical ball',
        'is_olympic_sport' => 1,
        'origin_country' => 'England',
        'first_played_date' => '1863-10-26',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return "Data Inserted Successfully";

});

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
Route::controller(StudentArray::class)->group(function () {
    Route::get('/students', 'index');
    Route::get('/students/names', 'printNames');
});

require __DIR__.'/auth.php';



// Form routes
Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form-submit', [FormController::class, 'submitForm']);

// File upload route


Route::get('/upload', [uploadFile::class, 'showUploadForm']);
Route::post('/upload', [uploadFile::class, 'uploadFile']);


// Sending email route
Route::get('/send-email', function () {
    Mail::to('shivamkumarp447@gmail.com')->send(new Testmail());

    return 'Email sent successfully!';
});


// Session route
Route::get('/session', function(Request $request){
    $request->session()->put('name', 'Shivam Kumar');
    return [
        'using-put-method' => 'Session stored successfully',
        'using-get-method' => $request->session()->get('name')
    ];
})->middleware('web');

// session using push method
Route::get('/session-push', function(Request $request){
    $names = $request->session()->get('names', []);
    $names[] = 'Shivam Kumar';
    $names[] = 'Rahul Kumar';
    $request->session()->put('names', $names);

    return $request->session()->get('names');
})->middleware('web');

// Flash session example

Route::get('/set',function(Request $request){
    $request->session()->flash('info','Hello Flash');
    return redirect('/now-test');
});
Route::get('/now-test',function(Request $request){
    return view('now');
});


// Session helper functions example
Route::get('/so',function(Request $request){
    return[
        'get'=>$request->session()->get('countries'), // returns null if key does not exist
        'default-value'=>$request->session()->get('domain','AB'), // returns default value if key does not exist
        'session'=>session('company-name'),
        'all'=>$request->session()->all(), // returns all session data
        'has'=> $request->session()->has('city') ? 'True' : 'False', // checks if key exists and is not null
        'exists'=> $request->session()->exists('a') ? 'True' : 'False'// checks if key exists even if value is null
    ];
});

// Session delete example using forget and flush method
Route::get('/delete',function(Request $request){
    $request->session()->forget('countries');
    // $request->session()->flush(); // to delete all session data
    return 'Session data deleted successfully';
});


Route::get('/so-delete', function(Request $request){
    return[
        'forget'=>$request->session()->get('domain'), // returns null if key does not exist
         'pull'=>$request->session()->pull('countries', 'Default Value'), // returns value and deletes it from session, if key does not exist returns default value
    ];
});


// Localization route
Route::get('/lang', function (Request $request) {
    return view('lang');
});


// Fetch all the data from sports table
Route::get('/fetch-all-sports', function () {
    $sports = DB::table('sports')->get();
    return $sports;
});

// Fetch specific columns from sports table
Route::get('/fetch-condition-sports', function () {
    $sports = DB::table('sports')->where('is_olympic_sport', true)->get();
    return $sports;
});

// data using Order by based on sports names
Route::get('/order-by-sports', function () {
    $sports = DB::table('sports')->orderBy('name')->get();
    return $sports;
});


// Update data in sports table
Route::get('/update-sports', function () {
    DB::table('sports')->where('id', 1)->update([
        'description' => 'A popular team sport played with a spherical ball',
        'origin_country' => 'United Kingdom',
    ]);
    return 'Data updated successfully';
});


// Delete data from sports table
Route::get('/delete-sports', function () {
    DB::table('sports')->where('id', 2)->delete();
    return 'Data deleted successfully';
});


// Using ORM (object-relational mapping) to fetch all sports
Route::get('/insert-orm', function () {
    sports::create([
        'name' => 'Volleyball',
        'description' => 'A team sport in which two teams of six players are separated by a net',
        'is_olympic_sport' => 1,
        'origin_country' => 'United States',
        'first_played_date' => '1895-02-09',
    ]);
    return 'Data inserted successfully using ORM';
});

// fetch using ORM with condition
Route::get('/fetch-condition-orm', function () {
    $sports = sports::where('is_olympic_sport', true)->get();
    return $sports;
});

// fetch all sports using ORM
Route::get('/fetch-orm', function () {
    $sports = sports::all();
    return $sports;
});

// update using ORM
Route::get('/update-orm', function () {
    sports::find(3)->update([
        'description' => 'A racket sport that can be played individually or between two teams of two players',
        'origin_country' => 'United Kingdom',
    ]);
    return 'Data updated successfully using ORM';
});

// delete using ORM
Route::get('/delete-orm', function () {
    sports::find(4)->delete();
    return 'Data deleted successfully using ORM';
});

// using destroy method to delete data using ORM
Route::get('/destroy-orm', function () {
    sports::destroy(5);
    return 'Data deleted successfully using destroy method in ORM';
});
