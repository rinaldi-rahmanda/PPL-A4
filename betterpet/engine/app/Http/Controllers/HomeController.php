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
		$adoptions = $adoptions->take(3)->get();
    	return view('home.adoption',['adoptions',$adoptions]);
    }
    //menampilkan shelter form
     public function shelter(){
		$shelter = Shelter::all();
    	        return view('home.shelter',['shelter',$shelter]);
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
		if(!$id){
			return redirect('/news');
		}
		else{
			return view('home.adoptionInfo');
		}
	}
    public function contactPost(Request $request){
        $name = $request->name;
        $email = $request->email;
        $title = $request->title;
        $content = $request->content;
        //validasi the input first
        $validator = Validator::make($request->all(),[
            'name' => 'min:3',
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
            return redirect('/contact')
                    ->withErrors($validator);
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
			$results = Adoption::where('domicile',$domicile)
				->where('breed','like','%'.$breed.'%')
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
	
	public function searchShelter(Request $request){
		$domicile = $request->input('domicile');
		//input can be 1,which is any type
		$name = $request->input('name');
		$address = $request->input('address');
		
		
		$results = Shelter::where('domicile',$domicile)
				->where('address','like','%'.$address.'%')
				->where('sheltername','like','%'.$name.'%');
				
		
		
		$shelter = $results->get();
		return view('home.shelter',['shelter'=>$shelter]);
		
	}
}
