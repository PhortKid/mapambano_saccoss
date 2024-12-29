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
use App\Http\Controllers\RepaidController;
use App\Http\Controllers\UsersReportController;
use App\Http\Controllers\UserBalanceReportController;
use App\Http\Controllers\ReportsController;

use App\Http\Controllers\BalanceController;//leo



use App\Http\Controllers\RepaidInterestManagement;


use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InterestController;

use App\Http\Controllers\ChangePasswordController;

Route::middleware('auth')->group(function () {
    Route::get('/change-password', [ChangePasswordController::class, 'showForm'])->name('change.password.form');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');
});


use App\Models\Loans;

use App\Models\Interest;

use Illuminate\Http\Request;

use EmilKitua\Nida\Nida;


//19760810-61305-00001-20

Route::get('/nida', function () {
    $nida = app(Nida::class);
//$userDetail = $nida->loadUser('19970714511140000211');
$userDetail = $nida->loadUser('19970714511140000211', true);

return print_r($userDetail);

});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return redirect('/dash');
    })->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
Route::resource('/dash',DashboardController::class);
Route::resource('/users_management',UsersManagementController::class);
Route::resource('/shares_management',SharesController::class);
Route::resource('/savings_management',SavingsController::class);
Route::resource('/deposites_management',DepositeController::class);
Route::resource('/loans_management',LoansController::class);
Route::resource('/expenses_management',ExpenseController::class);
Route::resource('/interest_management',InterestController::class);

Route::resource('/repaid_interest_management',RepaidInterestManagement::class);


});


Route::middleware('auth')->group(function () {
Route::get('/users_report', [UsersReportController::class, 'index'])->name('users.index');
Route::get('/users_report/{id}/report', [UsersReportController::class, 'showUserReport'])->name('users.report');
Route::get('/all_users_report', [UsersReportController::class, 'userLoanReport'])->name('all.users.report');
Route::get('/users_balance_report', [UserBalanceReportController::class, 'index'])->name('user.balance.report');
Route::get('/users_balance_date_report', [UserBalanceReportController::class, 'date'])->name('user.balance.date.report');
Route::get('/reports_shares',[ReportsController::class,'shareReport'])->name('report.shares');
Route::get('/savings_report', [ReportsController::class, 'savingsReport'])->name('report.savings');
Route::get('/deposite_report', [ReportsController::class, 'depositReport'])->name('report.deposite');

Route::get('/reports_date_shares',[ReportsController::class,'shareDateReport'])->name('report.date.shares');
Route::get('/savings_date_report', [ReportsController::class, 'savingsDateReport'])->name('report.date.savings');
Route::get('/deposite_date_report', [ReportsController::class, 'depositDateReport'])->name('report.date.deposite');
});


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
   // $users = User::where('role', 'admin')->get(); 
   $users=User::all();
    return view('dash.savings.applicant')->with('users', $users);
})->name('all.applicant.saving');

Route::get('/all_applicant_saving/{user_id}', function($user_id) {
   // $user = User::where('role', 'admin')->where('id', $user_id)->first();
   $user=User::all();
    $savings = $user ? $user->savings : [];
    return view('dash.savings.applicant_saving')->with('savings', $savings);
});

Route::get('/all_applicant_saving_report/{user_id}', function($user_id) {
   // $user = User::where('role', 'applicant')->where('id', $user_id)->first();
   $user=User::all();
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






//INTEREST CONTROLLER

Route::get('/all_applicant_interest', function() {
    $users=User::all();
     return view('dash.interest.applicant')->with('users', $users);
 })->name('all.applicant.interest');
 /*
 Route::get('/all_applicant_interest/{user_id}', function($user_id) {
   
    $user=User::all();
     $interests = $user ? $user->interests : [];
     return view('dash.interest.applicant_interest')->with('interests', $interests);
 });
 
*/
 Route::get('/all_applicant_interest/{user_id}', function($user_id) {
    $user = User::find($user_id); // Use find to get a specific user by ID
    $interests = $user ? $user->interest : []; // Now you can access the 'interests' relationship on the individual user
    return view('dash.interest.applicant_interest')->with('interests', $interests);
});

 Route::get('/all_applicant_interest_report/{user_id}', function($user_id) {
    $user = User::find($user_id);
     $interests = $user ? $user->interest : [];
     return view('dash.interest.applicant_interest_report')->with('interests', $interests);
 });
 //END INTEREST CONTROLLER
 

require __DIR__.'/auth.php';



Route::get('get_loan',function(){
    return view('hifadhi_mkopo');
});

Route::resource('/repaid_management',RepaidController::class);


Route::post('store_loan',function(Request $request)
{


    $loan = Loans::create([
        'user_id' => $request->user_id,
        'amount' => $request->amount,
        'balance' => $request->amount,
    ]);

    return response()->json(['message' => 'Mkopo umeundwa kwa mafanikio!', 'loan' => $loan]);

    
})->name('store_loan');


Route::post('lipa_mkopo',
function (Request $request)
{
    $loan = Loans::findOrFail($request->loan_id);

    $minimumPayment = $loan->balance * 0.10; // Asilimia 10 ya salio

    $request->validate([
        'amount' => [
            'required',
            'numeric',
            'min:' . $minimumPayment, // Angalau 10% ya salio
            'max:' . $loan->balance,  // Isiwe zaidi ya salio
        ],
    ]);

    $paymentAmount = $request->amount;
    $fee = $paymentAmount * 0.10; // Ada ya 10% ya malipo

    // Hifadhi muamala
    $loan->transactions()->create([
        'amount' => $paymentAmount,
        'fee' => $fee,
    ]);

    // Sasisha salio
    $loan->balance -= $paymentAmount;
    $loan->save();

    return response()->json([
        'message' => 'Malipo yamefanikiwa!',
        'balance' => $loan->balance,
        'minimum_next_payment' => $loan->balance * 0.10, // Onyesha kiasi cha chini kinachofuata
    ]);
}
)->name('lipa_mkopo');


Route::get('cheki_mkopo',function(){
    return view('cheki_mkopo')->with('loanId',1);
});






Route::resource('/balances',BalanceController::class);
Route::get('/balances_report', [BalanceController::class, 'report'])->name('balances.report');
Route::post('/balances_report', [BalanceController::class, 'generateReport'])->name('balances.generateReport');
