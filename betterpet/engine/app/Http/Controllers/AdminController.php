<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\News;
use DB;
use App\Shelter;
use App\Adoption;
use App\User;
use App\Question;
use Validator;
use Session;
use Storage;
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
        $questions = Question::all();
        $allnews = DB::table('news')
                ->orderBy('created_at', 'desc')
                ->get();
        foreach($userss as $singleUser){
        	if($singleUser->admin!='1')
        		array_push($users,$singleUser);
        }
        $maps = DB::table('maps')->get();
		return view('admin.index',
            ['shelters'=>$shelters,'adoptions'=>$adoptions,'users'=>$users,
            'questions'=>$questions,'allnews'=>$allnews,'maps'=>$maps]);
	}
	
	public function createNews(Request $request){
		//save the new submitted news to database
		$news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $count = News::all();
        $count = $count->count();
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required',
        ],[
            'required'=>'the :attribute field is required',
        ]);
        if($validator->fails())
            return redirect('/admin')->withErrors($validator);
        if($request->hasFile('newsimage'))
        {
            $file = $request->file('newsimage');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect('/admin')->withErrors($validator);
			$extension = $file->getClientOriginalExtension();
			$fileName = ($count+1).'.'.$extension;
            Storage::put('newsimage/'.$fileName,
                file_get_contents($file->getRealPath()));
            $news->photo = $fileName;
        }
        $news->save();
        return $this->index();
	}

    public function deleteNews($id){
        //save the new submitted news to database
        DB::table('news')->where('id','=', $id)->delete();
        return $this->index();
    }

    public function viewUpdateNews($id){
        $news = News::find($id);
        return view('admin.updateNews',
            ['news'=>$news]);
    }

	public function updateNews(Request $request){
		//save the new submitted news to database
        $theID = $request->input('id');
		$news = News::find($theID);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        if($request->hasFile('newsimage'))
        {
            $file = $request->file('newsimage');
            $validator = Validator::make(array('file'=>$file),[
                'file' => 'image|max:2000',
            ]);
            if($validator->fails())
                return redirect('/admin')->withErrors($validator);
            $extension = $file->getClientOriginalExtension();
            $fileName = $theID.'.'.$extension;
            Storage::put('newsimage/'.$fileName,
                file_get_contents($file->getRealPath()));
            $news->photo = $fileName;
        }
        $news->save();
        return $this->index();
	}
    public function removeShelter($id){
        $shelter = Shelter::find($id);
        if($shelter){
            $shelter->delete();
            Storage::delete('shelterimage/'.$adoption->picture);
            return redirect()->back();
        }
        else
            return redirect('/admin')->with('error','No Shelter Found for the requested id');
    }
    public function removeAdoption($id){
        $adoption = Adoption::find($id);
        if(!$adoption)
            return redirect('/admin')->with('error','No Adoption found for the requested id');
        else{
            DB::table('requests')->where('idAdopsi','=',$id)->delete();
            Storage::delete('adoptionimage/'.$adoption->picture);
            $adoption->delete();
            return redirect()->back();
        }
    }
    public function newMapMarker(Request $request){
        $name = $request->input('name');
        $long = $request->input('long');
        $lat = $request->input('lat');
        DB::table('maps')->insert(
            ['name'=>$name,'latitude'=>$lat,'longitude'=>$long]
        );
        return redirect('/admin');
    }
    public function removeMapMarker($id){
        DB::table('maps')->where('id',$id)->delete();
        return redirect('/admin');
    }
}
