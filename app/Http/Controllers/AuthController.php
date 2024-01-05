<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $formData = request()->validate([
            'name'=>['required', 'max:255', 'min:3'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'username'=>['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password'=>['required', 'min:8'],
        ]);
        $user = User::create($formData);
        session()->flash('success', "Welcome Dear, ". $user->name);
        auth()->login($user);

        return redirect('/');
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        $formData = request()->validate([
            'email'=>['required', 'email', 'max: 255', Rule::exists('users', 'email')],
            'password'=>['required', 'min:8', 'max: 255'],
        ], [
            'email.required'=>'We Need Your Email Address.',
            'password.min'=>'Password must be more than 8 characters.'
        ]);

        if (auth()->attempt($formData)) {
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }else{
                return redirect('/')->with('success', 'Welcome back');
            }
        } else {
            //if user credentials fail -> redirect back to form with error
            return redirect()->back()->withErrors([
                'email'=>'User Credentials Wrong'
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
