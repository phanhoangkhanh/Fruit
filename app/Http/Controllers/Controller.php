<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request)
    {
        $loginAction = $request->validate([
            'name'      => 'required',
            'password'  => 'required',
        ]);
 
        if (Auth::attempt($loginAction, true) && is_null(Auth::user()->deleted_at)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('welcome')->withErrors([
            'name' => ' Your input is wrong, Please try again ',
            ])->onlyInput('name');
        }
    }

    public function dashboard()
    {
        return view("inside.dashboard");
    }

    public function customer()
    {
        return view("inside.customer.main");
    }

    public function fruit()
    {
        return view("inside.fruit.main");
    }


}
