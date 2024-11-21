<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use  App\Models\User;

class ChangePasswordController extends Controller
{




    // Show the password change form
    public function showForm()
    {
        return view('dash.change-password');
    }

    // Handle password change request
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8', Rule::notIn([Auth::user()->password])],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        // Change password

       $user=User::find(Auth::user()->id);
        //$user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('change.password.form')->with('status', 'Password changed successfully!');
   

        }

}
