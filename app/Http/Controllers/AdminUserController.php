<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(auth()->guest()){
        //     abort(403);
        // }

        // if(auth()->user()->username !== 'arif'){
        //     abort(403);
        // }

        // if(auth()->guest() || auth()->user()->username !== 'arif' ) {
        //     abort(403);
        // }

        // if(!auth()->check() || auth()->user()->username !== 'arif' ) {
        //     abort(403);
        // }

        // $this->authorize('admin');

        if (!auth()->check() || auth()->user()->username !== 'arif') {
            abort(403);
        }

        return view('dashboard.users.index', [
            'title' => 'Users',
            'users' => User::Paginate()->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Register New User',
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:20',
            'password_confirmation' => 'required|same:password',
            'is_admin' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('dashboard/users')->with('status', 'Data User has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'User edit',
            'user' => $user,
            'users' => User::all()
        ]);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'is_admin' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:4|max:255|unique:users';
        }

        if ($request->email != $user->email) {

            $rules['email'] = 'required|email|unique:users';
        }

        $validateData = $request->validate($rules);

        User::where('id', $user->id)->update($validateData);

        return redirect('/dashboard/users')->with('status', 'Data User has been Updated!');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('status', 'Data has been deleted');
    }
}
