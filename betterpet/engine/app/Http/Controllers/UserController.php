<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Socialize;
use Hash;
use DB;
use Validator;
use Session;

class UserController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $rememberme = $request->input('remember');
        if($rememberme=="yes"){
            if(Auth::attempt(['email'=>$email,'password'=>$password],true)){
                //correct email and password
                Session::put('user','1');
                $user = Auth::user();
                Session::put('name',$user->name);
                return redirect('/')->with('msg','You have been logged in');
            }
        }
        else{
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                //correct email and password
                $user = Auth::user();
                Session::put('name',$user->name);
                Session::put('user','1');
                return redirect('/')->with('msg','You have been logged in');
            }
        } 
        //gagal login
        return redirect('/login')->with('error','Invalid email or password');
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
        $passconf = $request->input('passwordconfirm');
        if($password != $passconf)
            return redirect('/register')->withErrors('Both password field must have the same value');
        $email = $request->input('email');
        $domisili = $request->input('domicile');
        $phone = $request->input('phone');
        $user = new User();
        $user->name = $name;
        $user->domicile = $domisili;
        $user->phone = $phone;
        $user->email = $email;
        //validate first!
        $validator = Validator::make($request->all(),[
            'email' => 'email',
            'phone' => 'numeric',
            'name' => 'min:3',
            'password' => 'min:6',
        ],[
            'email'=>'Email address is not in valid format',
            'phone'=>'Only numbers are allowed',
            'name'=>'Your name must be 3 characters or more',
            'password' => 'Password must be at least 6 characters'
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                    ->withErrors($validator);
        }
        $user->password = Hash::make($password);
        $user->save();
        Auth::loginUsingId($user->id);
        Session::put('user','1');
        Session::put('name',$name);
        return redirect('/')->with('msg','You have been logged in');
        //
    }
    public function google(){
        if(!Session::get('user'))
            return Socialize::driver('google')->redirect();
        return redirect('/');
    }
    public function facebook(){
        if(!Session::get('user'))
            return Socialize::driver('facebook')->redirect();
        return redirect('/');
    }
    public function googleCallBack(){
        $user = Socialize::driver('google')->user();
        $name = $user->name;
        $email = $user->email;
		$avatar = $user->avatar;
		//modifikasi avatar 
		$avatar = substr($avatar,0,-2);
		$avatar = $avatar."200";
        $user = User::where('email','=',$email)->first();
        if(!$user){
            //kalau user tidak ditemukan dalam database, buat user baru
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->save();
        }
        Auth::loginUsingId($user->id);
        Session::put('user','1');
        Session::put('name',$name);
		Session::put('avatar',$avatar);
        return redirect('/')->with('msg','You have been logged in');
    }
    public function facebookCallBack(){
        $user = Socialize::driver('facebook')->user();
        $name = $user->name;
        $email = $user->email;
		$avatar = $user->avatar;
		//modifikasi avatar 
		$avatar = substr($avatar,0,-2);
		$avatar = $avatar."200";
        $user = User::where('email','=',$email)->first();
        if(!$user){
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->save();
        }
        Auth::loginUsingId($user->id);
        Session::put('user','1');
        Session::put('name',$name);
		Session::put('avatar',$avatar);
        return redirect('/')->with('msg','You have been logged in');
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/')->with('msg','You have been logged out');
    }
    public function showProfile(){
            //ambil segala data user
            $user = Auth::user();
            $idDom = $user->domicile;
			$name = $user->name;
			$phone = $user->phone;
			$address = $user->address;
			$desc = $user->description;
            $domicile = DB::table('domicile')->select('location')->where('id',$idDom)->first();
            if( $idDom == 0 ){
                //belum set domisili
                $domicile = "None";
            }
            else
                $domicile = $domicile->location;
            return view('home.profile',['user'=>$user,'domicile'=>$domicile,'address'=>$address,'description'=>$desc,'phone'=>$phone]);
    }
    
    public function viewProfile(){
            //ambil segala data user
            $user = Auth::user();
            $idDom = $user->domicile;
			$name = $user->name;
			$phone = $user->phone;
			$address = $user->address;
			$desc = $user->description;
            $domicile = DB::table('domicile')->select('location')->where('id',$idDom)->first();
            if( $idDom == 0 ){
                //belum set domisili
                $domicile = "None";
            }
            else
                $domicile = $domicile->location;
            return view('home.viewProfile',['user'=>$user,'domicile'=>$domicile,'address'=>$address,'description'=>$desc,'phone'=>$phone]);
    }
	public function editProfile(Request $request){
		$user = Auth::user();
        $user = $user->id;
		$user = User::find($user);
		$name = $request->input('name');
		$address = $request->input('address');
		$email = $request->input('email');
        $domisili = $request->input('domicile');
        $phone = $request->input('phone');
		$desc = $request->input('description');
        $user->name = $name;
        $user->domicile = $domisili;
        $user->phone = $phone;
        $user->email = $email;
		$user->description = $desc;
		$user->address = $address;
		$user->save();
		return redirect('/profile');
	}
    public function createAdoption(){
        $user = Auth::user();
        $userId = $user->id;
        $adList = DB::table('adoptions')
            ->join('domicile','adoptions.domicile','=','domicile.id')
            ->where('adoptions.user_id',$userId);
        return view('userAdoption',['adoptions'=>$adList]);      
    }
    public function saveAdoption(Request $request){
            $user = Auth::user();
            $userId = $user->id;
            $adoption = new Adoption();
            //buat adopsi baru
    }
    public function listAdoptions(){
        return 'haha';
    }
    public function markDone($id){
        //menandai bahwa adopsi untuk adoption pada suatu user sudah "done"
        $user = Auth::user();
        $userId = $user->id;
        $adoption = DB::table('adoptions')
            ->where('user_id',$userId)
            ->where('id',$id)
            ->update(['done'=>1]);
        return redirect('/adoption/create')->with('success','Adoption marked as done!');
    }
}