<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersManagementController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SharesController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\DepositeController;
use App\Http\Controllers\LoansController;

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
Route::resource('/savings_management',SavingsController::class);
Route::resource('/deposites_management',DepositeController::class);
Route::resource('/loans_management',LoansController::class);


use  App\Models\User;

        
       
Route::get('/all_applicant_share', function() {
    $users = User::where('role', 'applicant')->get(); 
  
    return view('dash.shares.applicant')->with('users', $users);
})->name('all.applicant.shares');

Route::get('/all_applicant_share/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $shares = $user ? $user->shares : [];
    return view('dash.shares.applicant_share')->with('shares', $shares);
});

Route::get('/all_applicant_share_report/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $shares = $user ? $user->shares : [];
    return view('dash.shares.applicant_share_report')->with('shares', $shares);
});



















//SAVING CONTROLLER

Route::get('/all_applicant_saving', function() {
    $users = User::where('role', 'applicant')->get(); 
  
    return view('dash.savings.applicant')->with('users', $users);
})->name('all.applicant.saving');

Route::get('/all_applicant_saving/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $savings = $user ? $user->savings : [];
    return view('dash.savings.applicant_saving')->with('savings', $savings);
});

Route::get('/all_applicant_saving_report/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $savings = $user ? $user->savings : [];
    return view('dash.savings.applicant_saving_report')->with('savings', $savings);
});
//END SAVING CONTROLLER




//DEPOSITE CONTROLLER

Route::get('/all_applicant_deposite', function() {
    $users = User::where('role', 'applicant')->get(); 
  
    return view('dash.deposites.applicant')->with('users', $users);
})->name('all.applicant.deposite');

Route::get('/all_applicant_deposite/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $deposites = $user ? $user->deposite : [];
    return view('dash.deposites.applicant_deposite')->with('deposites', $deposites);
});

Route::get('/all_applicant_deposite_report/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $deposites = $user ? $user->deposite : [];
    return view('dash.deposites.applicant_deposite_report')->with('deposites', $deposites);
});
//END DEPOSITE CONTROLLER

//Route::resource('/users',UsersController::class);



Route::get('/all_applicant_loan', function() {
    $users = User::where('role', 'applicant')->get(); 
  
    return view('dash.loans.applicant')->with('users', $users);
})->name('all.applicant.loan');

Route::get('/all_applicant_loan/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $loans = $user ? $user->loans : [];
    return view('dash.loans.applicant_loan')->with('loans', $loans);
});

Route::get('/all_applicant_loan_report/{user_id}', function($user_id) {
    $user = User::where('role', 'applicant')->where('id', $user_id)->first();
    $loans = $user ? $user->loans : [];
    return view('dash.loans.applicant_loan_report')->with('loans', $loans);
});

require __DIR__.'/auth.php';
