<?php

use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsesController;
use App\Models\Complaints;
use App\Models\Responses;
use Illuminate\Support\Facades\Route;

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
    return view('website.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {    
    Route::get('/contact', function () {
        return view('website.contact.index');
    });
    Route::resource('sent', ComplaintsController::class);
    Route::resource('inbox', ResponsesController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/',function() {
        $total=complaints::count();
        return  view('admin.index',['total'=>$total]);
    });
    
    
    Route::get('/complaint',function (){
        $complaints=complaints::all();
        return view('admin.complaints.index',['complaints'=>$complaints]);
    });
    
    Route::get('/responses',function(){
        return view('admin.responses.index');
    });
    
    Route::get('/users',function(){
        return view('admin.users.index');
    });
    
    Route::post('/replying',function( Request $request){
           $input=$request->all();
           responses::create($input);
    
         return redirect('/complaint');
    });
});


require __DIR__.'/auth.php';
