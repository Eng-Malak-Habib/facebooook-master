<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\friendrequest;
use App\Models\like;
use App\Models\post;
use App\Models\share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class usercontroller extends Controller
{
    public function registerform(){
        return view('user.registerform');
    }
    public function register(Request $request)
    {
        $data=$request->validate([

'name'=>"required|string",
'email'=>"required|string",
'password'=>"required|string",
'profile_img'=>"required|image",
'mobile'=>"required|string",

        ]);
        $data['password']=bcrypt($data['password']);
        $filename=  Storage::putFile("public/book",$data['profile_img']);
        $data['profile_img']=$filename;
        $log=  User::create($data);
        Auth::login($log);
return view('user.profile',[
    'show'=>$log
]);
    }
    public function loginform()
    {
        return view('user.loginform');
    }
    public function login(Request $request)
    {

        $data=$request->validate([
            'email'=>"required|string",
            'password'=>"required|string",  ]);
            $iscorrect=Auth::attempt([
                'email'=>$data['email'],
                'password'=>$data['password']
            ]);
            if(! $iscorrect){
                return back()->withErrors(['wrong loged information']);
            }
        
            $posting = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.*','posts.*')
            ->get()->all();
        
            $userss=  DB::select('SELECT comments.content, users.name, users.id,users.email FROM users INNER JOIN comments ON comments.post_id=1');
            $count = DB::table('likes')->where("user_id",auth::user()->id)->count(); 


            return view('user.profile',
            [
                'posts'=>$posting,
                'comment'=>$userss,
    'count'=>$count
            ]);
    }

    public function showcomment($id)
    {    $userss=  DB::select('SELECT comments.content,comments.created_at, users.name, users.id,users.email,users.profile_img FROM users INNER JOIN comments ON comments.post_id='.$id);

        return view('post.comment',
        [
            'comment'=>$userss,

        ]);
    }
    public function home()
 { //$userss=  DB::select('SELECT friends.content,comments.created_at, users.name, users.id,users.email,users.profile_img FROM users INNER JOIN comments ON comments.post_id='.$id);
    $d=auth::user()->id;
    //replace the 1 with value .
$userss=  DB::select('SELECT   users.id,users.name,users.profile_img from users INNER JOIN friendrequests ON friendrequests.friend_id!=users.id and friendrequests.friend_id!='.auth::user()->id);
$requests=  DB::select('SELECT users.id ,users.name,users.profile_img from users INNER JOIN friendrequests ON friendrequests.user_id=users.id  and friendrequests.friend_id='.auth::user()->id);

return view('user.homepage',['users'=>$userss,'requests'=>$requests]);
    }
    public function like(Request $request,$id)
    {   $data=$request->validate([
        'user_id',
        'post_id']);
    $data['user_id']=auth::user()->id;
    $data['post_id']=$id;
    like::create($data);
    return redirect('profile');
}
public function share(Request $request,$id)
    {   $data=$request->validate([
        'user_id',
        'post_id']);
    $data['user_id']=auth::user()->id;
    $data['post_id']=$id;
    share::create($data);
    return redirect('profile');
}
public function friendrequest(Request $request,$id)
    {   $data=$request->validate([
        'user_id',
        'friend_id']);
    $data['user_id']=auth::user()->id;
    $data['friend_id']=$id;
    friendrequest::create($data);
    return redirect('profile');
}
    public function logout()
    {
                Auth::logout();
                return redirect('loginform');
    }
    public function profile()
    {
        $posting = DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.*','posts.*')
        ->get()->all();
        $userss=  DB::select('SELECT comments.content, users.name, users.id,users.email FROM users INNER JOIN comments ON comments.post_id=1');
        $count = DB::table('likes')->where("user_id",auth::user()->id)->count(); 


        return view('user.profile',
        [
            'posts'=>$posting,
            'comment'=>$userss,
'count'=>$count
        ]);
    }

    public function addpost(Request $request)
    {
        $data=$request->validate([
        'content'=>'required',
        'user_id'
        ]);
        $data['user_id']=auth::user()->id;
        post::create($data);
        return redirect('profile');
    }

    public function addcomment(Request $request)
    {
        $data=$request->validate([
        'content'=>'required',
        'user_id',
        'post_id'=>'required|integer',
        ]);
        $data['user_id']=auth::user()->id;
        comment::create($data);
    return redirect('profile');

    }
    
}
