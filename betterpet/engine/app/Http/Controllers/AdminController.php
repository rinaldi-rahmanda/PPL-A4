<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use App\Shelter;
use App\Adoption;
use App\User;
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
		$shelters = Shelter::all();
		$adoptions = Adoption::all();
		$userss = User::all();
		$users = [];
		$questions = DB::table('questions')->get();
		for($i=0 ; $i < count($userss); $i++){
			$user = $userss[$i];
			if($user->admin!='1')
				array_push($users,$user);
		}
		return view('admin.index',
			['shelters'=>$shelters,'adoptions'=>$adoptions,'users'=>$users,'questions'=>$questions]);
	}
}
