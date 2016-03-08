<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Socialize;

class UserController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            //correct email and password
            return redirect('/');
        }
        else{

        }
    }
    public function register(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $domisili = $request->input('domicile');
        //
    }
    public function google(){
        if(!Auth::check())
            return Socialize::driver('google')->redirect();
        return redirect('/');
    }
    public function facebook(){
        if(!Auth::check())
            return Socialize::driver('facebook')->redirect();
        return redirect('/');
    }
    public function googleCallBack(){
        $user = Socialize::driver('google')->user();
        $name = $user->name;
        $email = $user->email;
        $user = User::where('email','=',$email)->first();
        if(!$user){
            //kalau user tidak ditemukan dalam database, buat user baru
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->save();
        }
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
    public function facebookCallBack(){
        $user = Socialize::driver('facebook')->user();
        $name = $user->name;
        $email = $user->email;
        $user = User::where('email','=',$email)->first();
        if(!$user){
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->save();
        }
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
