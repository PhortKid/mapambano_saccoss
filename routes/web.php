<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SharesController;
use EmilKitua\Nida\Nida;


//19760810-61305-00001-20

Route::get('/nida', function () {
    $nida = app(Nida::class);
//$userDetail = $nida->loadUser('19970714511140000211');
$userDetail = $nida->loadUser('19970714511140000211', true);

return print_r($userDetail);

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('/dash',DashboardController::class);
Route::resource('/users_management',UsersManagementController::class);
Route::resource('/shares_management',SharesController::class);

use  App\Models\User;

        
       
Route::get('/all_applicant_share', function() {
    $users = User::where('role', 'applicant')->get(); 
  
    return view('dash.shares.applicant')->with('users', $users);
});

Route::get('/all_applicant_share/{user_id}', function($user_id) {
  
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();


    $shares = $user ? $user->shares : [];

    
   // return $shares;
    return view('dash.shares.applicant_share')->with('shares', $shares);
});


//Route::resource('/users',UsersController::class);


require __DIR__.'/auth.php';
