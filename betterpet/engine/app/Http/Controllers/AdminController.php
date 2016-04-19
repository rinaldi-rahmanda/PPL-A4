<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Session;

use App\Traits\CaptchaTrait;
class AdminController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}
	public function index(){
		//return the homepage of admin section
		return view('admin.index');
	}
	public function newNews(){
		//return view form of creating new news
		return view('admin.newnews');
	}
	public function saveNews(){
		//save the new submitted news to database
	}
}
