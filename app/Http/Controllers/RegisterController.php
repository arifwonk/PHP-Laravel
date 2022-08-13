<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.index', [
            'title' => 'Register Form'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
           'name' => 'required|max:255',
           'username' => 'required|min:4|max:255|unique:users',
           'email' => 'required|email:dns|unique:users',
           'password' => 'required|min:4|max:20|confirmed',
        //    'password_confirmation' => 'required|same:password'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('login')->with('status', 'Register Successfully!! Please Login');
    }
}
