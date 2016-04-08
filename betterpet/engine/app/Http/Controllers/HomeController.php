<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Session;

class HomeController extends Controller
{
    //fungsi ini untuk menampilkan view index web root
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            Session::put('user','1');
            Session::put('name',$user->name);
        }
    	return view('home.index');
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
}