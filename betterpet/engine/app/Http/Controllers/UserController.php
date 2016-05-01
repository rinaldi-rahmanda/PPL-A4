<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\CaptchaTrait;
use Auth;
use App\User;
use App\Adoption;
use Socialize;
use Hash;
use DB;
use URL;
use Validator;
use Session;
use App\Shelter;
use Storage;

class UserController extends Controller
{
        use CaptchaTrait;
        public function login(Request $request){
    
        $email = $request->input('email');
        $password = $request->input('password');
        $rememberme = $request->input('remember');
        if($rememberme=="yes"){
            if(Auth::attempt(['email'=>$email,'password'=>$password],true)){
                //correct email and password
                Session::put('user','1');
                $user = Auth::user();
                if($user->admin == '1'){
                    Session::put('name',$user->name);
                    return redirect('/admin')->with('msg','You have been logged in');
                }
                else{
                    Session::put('name',$user->name);
                    return redirect('/')->with('msg','You have been logged in');
                }
                
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
        $searchUser = User::where('email',$email)->first();
        if($searchUser){
            return redirect()->back()->withErrors('Email address already used by another user');
        }
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
            'name' => 'min:3|max:16',
            'password' => 'min:6',
        ],[
            'email'=>'Email address is not in valid format',
            'numeric'=>'Only numbers are allowed for :attribute',
            'min'=>'Your :attribute must be 3 characters or more',
            'password' => 'Password must be at least 6 characters',
			'max'=>'Your :attribute must be less than 16 characters',
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                    ->withErrors($validator)
                    ->withInput($request->except(['password','passwordconfirm']));
        }
	    if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();
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
			$avatar = $user->avatar;
			if(is_null($avatar))
				$avatar = 'none';
            $domicile = DB::table('domicile')->select('location')->where('id',$idDom)->first();
            if( $idDom == 0 ){
                //belum set domisili
                $domicile = "None";
            }
            else
                $domicile = $domicile->location;
            return view('home.profile',['user'=>$user,'avatar'=>$avatar,'domicile'=>$domicile,'address'=>$address,'description'=>$desc,'phone'=>$phone]);
    }
    
	public function editProfile(Request $request){
		$user = Auth::user();
        $user = $user->id;
		$user = User::find($user);
		$email = $user->email;
		$name = $request->input('name');
		$address = $request->input('address');
        $domisili = $request->input('domicile');
        $phone = $request->input('phone');
		$desc = $request->input('description');
		//cek foto
		if($request->hasFile('picture'))
		{
			$file = $request->file('picture');
			$validator = Validator::make(array('file'=>$file),[
				'file' => 'image|max:2000',
			]);
			if($validator->fails())
				return redirect('/profile')->withErrors($validator);
			$destinationPath = 'engine/userimage';
			$extension = $file->getClientOriginalExtension();
			$fileName = $email.'.'.$extension;
            Storage::put('userimage/'.$fileName,
                file_get_contents($file->getRealPath()));
			//$file->move($destinationPath,$fileName);
			$user->avatar=$fileName;
		}
		$validator = Validator::make($request->all(),[
            'phone' => 'numeric',
            'name' => 'min:3|max:16',
        ],[
            'numeric'=>'Only numbers are allowed for :attribute',
            'min'=>'Your :attribute must be 3 characters or more',
			'max'=>'Your :attribute must be less than 16 characters',
        ]);
        if ($validator->fails()) {
            return redirect('/profile')
                    ->withErrors($validator);
        }
		if($domisili)
		{
			$user->domicile = $domisili;
		}
        $user->name = $name;
        $user->phone = $phone;
		$user->description = $desc;
		$user->address = $address;
		$user->save();
		return redirect('/profile')->with('success','Your profile has been updated');
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
    public function markDone($id){
        //menandai bahwa adopsi untuk adoption pada suatu user sudah "done"
        $user = Auth::user();
        $userId = $user->id;
        $ad = Adoption::find($id);
        if($ad->user_id!=$userId)
            return redirect()->back()->withErrors("You're not authorized to do this");
        $adoption = DB::table('adoptions')
            ->where('user_id',$userId)
            ->where('id',$id)
            ->update(['done'=>1]);
        return redirect()->back();
    }
    public function unmarkDone($id){
        $user = Auth::user();
        $userId = $user->id;
        $ad = Adoption::find($id);
        if($ad->user_id!=$userId)
            return redirect()->back()->withErrors("You're not authorized to do this");
        $adoption = DB::table('adoptions')
            ->where('user_id',$userId)
            ->where('id',$id)
            ->update(['done'=>0]);
        return redirect()->back();
    }
    public function newAdoption(Request $request){
        $name = $request->input('name');
        $breed = $request->input('breed');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $desc = $request->input('description');
        $domicile = $request->input('domicile');
        $user = Auth::user();
        $userId = $user->id;
        $adoption = new Adoption;
        $adoption->name = $name;
        $adoption->breed = $breed;
        $adoption->sex = $sex;
        $adoption->description = $desc;
        $adoption->age = $age;
        $adoption->user_id = $userId;
        $adoption->domicile = $domicile;
		$count = Adoption::all();
		$count = $count->count();
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect()->back()
                ->withErrors($validator);
            $extension = $file->getClientOriginalExtension();
            $fileName = ($count+1).'.'.$extension;
            Storage::put('adoptionimage/'.$fileName,
                file_get_contents($file->getRealPath()));
            //$file->move($destinationPath,$fileName);
            $adoption->picture = $fileName;
        }
        $adoption->save();
        return redirect()->back();
    }
    public function newShelter(Request $request){
        $name = $request->input('shelterName');
        $address = $request->input('address');
        $age = $request->input('domicile');
        $desc = $request->input('description');
        $domicile = $request->input('domicile');
        $user = Auth::user();
        $userId = $user->id;
        $shelter = new Shelter;
        $shelter->shelterName = $name;
        $shelter->address = $address;
        $shelter->description = $desc;
        $shelter->user_id = $userId;
        $shelter->domicile = $domicile;
        $count = Shelter::all();
        $count = $count->count();
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect()->back()->withErrors($validator);
            $destinationPath = 'engine/shelterimage';
            $extension = $file->getClientOriginalExtension();
            $fileName = ($count+1).'.'.$extension;
            Storage::put('shelterimage/'.$fileName,
                file_get_contents($file->getRealPath()));
            //$file->move($destinationPath,$fileName);
            $shelter->picture = $fileName;
        }
        $shelter->save();
        return redirect()->back();
    }
    public function editAdoption(Request $request,$id){
        $name = $request->input('name');
        $breed = $request->input('breed');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $desc = $request->input('description');
        $user = Auth::user();
        $userId = $user->id;
        $adoption = Adoption::find($id);
        $adoption->name = $name;
        $adoption->breed = $breed;
        $adoption->sex = $sex;
        $adoption->description = $desc;
        $adoption->age = $age;
        $adoption->user_id = $userId;
        $count = Adoption::all();
        $count = $count->count();
        if($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect()->back()
                ->withErrors($validator);
            $extension = $file->getClientOriginalExtension();
            $fileName = ($count+1).'.'.$extension;
            Storage::put('adoptionimage/'.$fileName,
                file_get_contents($file->getRealPath()));
            //$file->move($destinationPath,$fileName);
            $adoption->picture = $fileName;
        }
        $adoption->save();
        return redirect()->back();

       
    }
    public function deleteAdoption(Request $request,$id){
        //remove the available requests pointing at the adoption first
        DB::table('requests')->where('idAdopsi','=',$id)->delete();
        $adoption = Adoption::find($id);
        Storage::delete('adoptionimage/'.$adoption->picture);
        $adoption->delete();
        return redirect()->back();
    }
    public function requestAdoption(Request $request,$id){
        $user = Auth::user();
        $idUser = $user->id;
        DB::table('requests')
            ->insert(['idUser'=>$idUser,'idAdopsi'=>$id]);
        return redirect()->back();
    }
    public function cancelRequest(Request $request,$id){
        $user = Auth::user();
        $idUser = $user->id;
        DB::table('requests')
            ->where('idUser',$idUser)
            ->where('idAdopsi',$id)
            ->delete();
        return redirect()->back();
    }
}
