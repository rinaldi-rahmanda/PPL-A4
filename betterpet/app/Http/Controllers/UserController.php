<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Socialize;
use Hash;
use DB;

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
            //gagal login
            return redirect('/about');
        }
    }
    public function loginForm(){
         if(!Auth::check())
           return view('home.login');
        else
            return redirect('/');
    }
    public function registerForm(){
         if(!Auth::check())
           return view('home.register');
        else
            return redirect('/');
    }
    public function register(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $domisili = $request->input('domicile');
        $phone = $request->input('phone');
        $user = new User();
        $user->name = $name;
        $user->domicile = $domisili;
        $user->phone = $phone;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/');
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
    public function showProfile(){
        if(Auth::check())
        {
            //ambil segala data user
            $user = Auth::user();
            $idDom = $user->domicile;
            $domicile = DB::table('domicile')->select('location')->where('id',$idDom)->first();
            if( $idDom == 0 ){
                //belum set domisili
                $domicile = 'Belum memilih domisili';
            }
            else
                $domicile = $domicile->location;
            return view('profile',['user'=>$user,'domicile'=>$domicile]);
        }
        else
            return redirect('/login');
    }
    public function createAdoption(){
        $user = Auth::user();
        $userId = $user->id;
        $adList = DB::table('adoptions')
            ->join('domicile','adoptions.domicile','=','domicile.id')
            ->where('user_id',$userId);
        return view('userAdoption',['adoptions'=>$adList]);
    }
    public function listAdoption(){

    }
}
