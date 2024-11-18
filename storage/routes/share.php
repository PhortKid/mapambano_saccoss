
<?php
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