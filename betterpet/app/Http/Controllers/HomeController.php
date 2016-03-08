<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class HomeController extends Controller
{
    //fungsi ini untuk menampilkan view index web root
    public function index(){
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
	//login view
	public function login(){
        if(!Auth::check())
	       return view('home.login');
        else
            return redirect('/');
	}
	//register view
	public function register(){
		 if(!Auth::check())
           return view('home.register');
        else
            return redirect('/');
	}
    //displaying news
    public function news(){
    	/*
    	take news from the database 
    	first then give it to the view
    	*/
    	return view('home.news');
    }
    public function contactPost(Request $request){
        $title = $request->title;
        $content = $request->content;
        //masukin ke db list pertanyaan
    }
}
