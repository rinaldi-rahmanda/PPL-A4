<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Session;
use App\Adoption;
use App\Shelter;
use App\User;

use App\Traits\CaptchaTrait;
class HomeController extends Controller
{


use CaptchaTrait;
    //fungsi ini untuk menampilkan view index web root
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            Session::put('user','1');
            Session::put('name',$user->name);
        }
    	return view('home.index');
    }
    //menampilkan adoption form
    public function adoption(){
		$adoptions = Adoption::where('done','0');
		$adoptions = $adoptions->take(6)->get();
    	return view('home.adoption',['adoptions'=>$adoptions]);
    }
    //menampilkan shelter form
     public function shelter(){
		$shelter = Shelter::all();
    	        return view('home.shelter',['shelters'=>$shelter]);
    }
    //menampilkan contact form
    public function contact(){
    	return view('home.contact');
    }
    //menampilkan about us
    public function about(){
    	return view('home.about');
    }
    //menampilkan faq
    public function faq(){
    	return view('home.faq');
    }
    //displaying news
    public function news(){
    	/*
    	take news from the database 
    	first then give it to the view
    	*/
    	return view('home.news');
    }
	public function singleNews($id){
		if(!$id){
			return redirect('/news');
		}
		else{
			return view('home.singleNews');
		}
	}
    public function adoptionInfo($id){
		$adoption = Adoption::find($id);
        $user = Auth::user();
        $request = DB::table('requests')
            ->where('idAdopsi',$adoption->id);
        $count = $request->count();
        if($user)
            $request = $request->where('idUser',$user->id)->get();
        $adoptionOwner = User::where('id',$adoption->user_id)->first();
        return view('home.adoptionInfo',['adoption'=>$adoption,'user'=>$user,
            'request'=>$request,'adoptionOwner'=>$adoptionOwner,'count'=>$count]);
		
	}
    public function contactPost(Request $request){
        $name = $request->name;
        $email = $request->email;
        $title = $request->title;
        $content = $request->content;
        //validasi the input first
        $validator = Validator::make($request->all(),[
            'name' => 'min:3|max:20',
            'email' => 'email',
            'title' => 'required',
            'content' => 'required',
        ],[
            'email'=>'Email address is not in valid format',
            'name'=>'Name must be more than 2 characters',
            'title'=>'title must be filled',
            'content' => 'content must be filled'
        ]);
	
	    if($this->captchaCheck() == false)
        {
            return redirect()->back()
                ->withErrors(['Wrong Captcha'])
                ->withInput();
        }
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            //insert the information to the database
            DB::table('questions')->insert([
                'name'=>$name,
                'email'=>$email,
                'title'=>$title,
                'content'=>$content,
            ]);
            return redirect('/contact')->with('success','Your question is sent!');
        }  
    }
	public function searchAdoption(Request $request){
		$domicile = $request->input('domicile');
		//input can be 1,which is any type
		$type = $request->input('type');
		$breed = $request->input('breed');
		$age = $request->input('age');
		$sex = $request->input('sex');
        $results = Adoption::where('domicile',$domicile);
        if($breed)
            $results = $results->where('breed','like','%'.$breed.'%');
		if($type!='1'){
			if($type=='2'){
				//isCat
				$type = '0';
				//0 for cat
			}
			else{
				$type = '1';
				//1 for dog
			}
			$results = $results
				->where('type',$type);
		}
		if($age!='1'){
			$results = $results->where('age',$age);
		}
		if($sex!='1'){
			$results = $results->where('sex',$sex);
		}
		$adoptions = $results->get();
		return view('home.adoption',['adoptions'=>$adoptions]);
	}
	public function viewProfile($id){
        $user = User::find($id);
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
        $adoptions = Adoption::where('user_id','=',$id)->get();
        $check = 0;
        if(Auth::check())
        {
            $usr = Auth::user();
            $usrId = $usr->id;
            if($usrId == $id)
                $check = 1;
        }
        return view('home.viewProfile',['user'=>$user,'domicile'=>$domicile,'address'=>$address,'description'=>$desc,'phone'=>$phone,'adoptions'=>$adoptions,'check'=>$check]);
    }
	public function searchShelter(Request $request){
		$domicile = $request->input('domicile');
		//input can be 1,which is any type
		$name = $request->input('name');
		$address = $request->input('address');
		$results = Shelter::where('domicile',$domicile);
        if($name)
            $results = $results->where('shelterName','like','%'.$name.'%');
		if($address)
		  $results = $results->where('address','like','%'.$address.'%');
		$shelter = $results->get();
		return view('home.shelter',['shelters'=>$shelter]);	
	}
    public function shelterInfo($id){
        $shelter = Shelter::find($id);
        $shelterOwner = User::where('id',$shelter->user_id)->first();
        return view('home.shelterInfo',['shelter'=>$shelter,'shelterOwner'=>$shelterOwner]);
    }
}
