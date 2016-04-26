<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\News;
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
	/*
	public function newNews(){
		//return view form of creating new news
	}
	*/
	public function createNews(Request $request){
		//save the new submitted news to database
		$news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $count = News::all();
        $count = $count->count();
        if($request->hasFile('newsimage'))
        {
            $file = $request->file('newsimage');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect('/admin')->withErrors($validator);
            $destinationPath = 'engine/images/news';
            $extension = $file->getClientOriginalExtension();
            $fileName = ($count+1).'.'.$extension;
            $file->move($destinationPath,$fileName);
            $news->photo = $fileName;
        }
        $news->save();
        return 'hohoho';
	}

	public function updateNews(Request $request){
		//save the new submitted news to database
		$news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $count = News::all();
        $count = $count->count();
        if($request->hasFile('newsimage'))
        {
            $file = $request->file('newsimage');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect('/admin')->withErrors($validator);
            $destinationPath = 'engine/images/news';
            $extension = $file->getClientOriginalExtension();
            $fileName = ($count+1).'.'.$extension;
            $file->move($destinationPath,$fileName);
            $news->photo = $fileName;
        }
        $news->save();
        return 'hohoho';
	}
}
