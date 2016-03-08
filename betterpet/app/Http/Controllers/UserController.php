<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Socialize;

class UserController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

    }
    public function register(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $domisili = $request->input('domicile');
        //
    }
    public function google(){
        return Socialize::driver('google')->redirect();
    }
    public function facebook(){
        return Socialize::driver('facebook')->redirect();
    }
    public function googleCallBack(){
        $user = Socialize::driver('google')->user();
        //$user->token;
        //Auth::login($user);
    }
    public function facebookCallBack(){
        $user = Socialize::driver('facebook')->user();
    }
}
