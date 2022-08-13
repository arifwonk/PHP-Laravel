<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    // public $current_password;
    // public $password;
    // public $password_confirmation;

    public function index(User $user)
    {
        if (!auth()->check() || auth()->user()->username !== 'arif') {
            abort(403);
        }

        return view('dashboard.users.password', [
            'title' => 'Change Password',
            'user' => $user,
            // 'users' => User::all()
        ]);       
    }

    public function change_password(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|password',
            'new_password' => 'required|min:4|max:20|different:current_password',
            'password_confirmation' => 'required|same:new_password'
            
        ]);
        
        $user->password = Hash::make($request->new_password);
        
        User::where('id', $user->id);
         $user->save();
         
         //  $request->session()->regenerate();
         
         return redirect('dashboard/users')->with('status', 'Password Succesfull Changed');
         
        //  $request->validate([
        //      'password' => 'required',
        //      'new_password' => 'required|min:4|max:20|different:password',
        //      'password_confirmation' => 'required|same:new_password'
        //   ]);
  
        // $user = User::find(auth::id());
        // $user->password = Hash::make($request->new_password);
        // $user->save();
        // $request->session()->regenerate();
        
        //  return redirect('dashboard/users')->with('status', 'Password Succesfull Changed');
    }
}
