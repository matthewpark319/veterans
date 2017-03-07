<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function show() {
        
    	return view('home');
    }

    public function login() {
        return view('login', ['invalid' => False]);
    }

    public function authenticate(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            echo("success");
            return redirect()->intended('home');
        } else {
            return view('login', ['invalid' => True]);
        }
    }
}
