<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {      
            if(auth()->user()->role != 'admin'){
                return redirect('/home');
            }
            return $next($request);
        });
    }
    
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function add()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role']
        ]);

        return redirect('/users')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($request->new_password) {
            if (!(Hash::check($request->old_password, $user->password))) {
                return back()->with('error','Old password is incorrect');
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
        }
        
        $user->update($request->all());

        return redirect('/users')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return back();
    }
}
