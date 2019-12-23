<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin');
            }
        }
        return view('welcome');
    }

    public function registration()
    {
        return view('registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if ($credentials['username'] == 'admin') {
                return redirect('/admin');
            }
            return redirect('/registration');
        }
        return redirect("/");
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $user->roles()->attach(Role::where('name', 'student')->first());
        Auth::login($user);

        return redirect("/");
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
