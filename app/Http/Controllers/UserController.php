<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cookie;

class UserController extends Controller
{
    public function index_login(){
        return view('main.login');
    }
    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:8',
        ]);

        if(Auth::attempt($credential)){
            return redirect()->back()->withErrors('invalid Credential');
        }
        if($request->has('remember')){
            Cookie::queue('CookieEmail',$request->email,1440);
            Cookie::queue('CookiePassword',$request->password,1440);
        }
        
        return redirect()->route('vegetable');
    }

    public function index_register(){
        return view('main.register');
    }

    public function register(Request $request){
         $request->validate([
            'first'=>'required|max:25',
            'last'=>'required|max:25',
            'email'=>'required|email',
            'role'=>'required|in:1,2',
            'gender'=>'required|in:1,2',
            'image'=>'required|image',
            'password'=>'required|min:8|regex:/[0-9]+/',
            'confirm'=>'required|min:8|same:password',
        ]);

        $newUser = new User();
        $newUser->first = $request->input('first');
        $newUser->last = $request->input('last');
        $newUser->email = $request->input('email');
        $newUser->role = $request->input('role');
        $newUser->gender = $request->input('gender');

        $displaypicture=$request->file('image');
        Storage::putFileAs('public/image', $displaypicture, $displaypicture->getClientOriginalName());
        $newUser->display_picture = $displaypicture->getClientOriginalName();
        $newUser->password = Hash::make($request->input('password'));

        $newUser->save();

        return redirect()->route('vegetable');
    }

    public function index_update(){
        $user= User::get()->where('id',Auth::user()->id)->first();

        return view('editprofile', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'first'=>'required|max:25',
            'last'=>'required|max:25',
            'email'=>'required|email',
            'role'=>'required|in:1,2',
            'gender'=>'required|in:1,2',
            'image'=>'required|image',
            'password'=>'required|min:8|regex:/[0-9]+/',
            'confirm'=>'required|min:8|same:password',
        ]);

        $currentUser = User::findOrFail($id);
        $currentUser->first = $request->input('first');
        $currentUser->last = $request->input('last');
        $currentUser->email = $request->input('email');
        $currentUser->role = $request->input('role');
        $currentUser->gender = $request->input('gender');
        $currentUser->password = Hash::make($request->input('password'));
        

        if($request->file('image')){
            $displaypicture=$request->file('image');
            Storage::putFileAs('public/image', $displaypicture, $displaypicture->getClientOriginalName());
            $currentUser->display_picture = $displaypicture->getClientOriginalName();

            User::where('id','=', $id)->update([
                'first'=> $currentUser->first,
                'last'=> $currentUser->last,
                'email'=> $currentUser->email,
                'role'=>$currentUser->role,
                'gender'=>$currentUser->gender,
                'display_picture' => $currentUser->display_picture,
                'password'=>Hash::make($request->input('password')),
            ]);
        }
            User::where('id','=', $id)->update([
                'first'=> $currentUser->first,
                    'last'=> $currentUser->last,
                    'email'=> $currentUser->email,
                    'role'=>$currentUser->role,
                    'gender'=>$currentUser->gender,
                    'display_picture' => $currentUser->display_picture,
                    'password'=>Hash::make($request->input('password')),
            ]);
        
            return redirect()->route('saved');
    }
    public function save(){
        return view('saved');
    }

    public function manageuser()
    {
        $userdetail = User::All();
        return view('manageuser',['userdetail'=>$userdetail]);
    }

    public function delete($id)
    {
        User::where('id','=', $id)->delete();
        return  redirect()->route('manageuser');
    }

    public function index_update_role($id){
        $user = User::findOrFail($id);
        return view('updaterole', compact('user'));

    }

    public function update_role(Request $request, $id){
        $request->validate([
            'role'=>'required|in:1,2',
        ]);

        $currentUser = User::findOrFail($id);
        $currentUser->role = $request->input('role');

        User::where('id','=', $id)->update([
            'role'=>$currentUser->role,
        ]);

        return redirect()->route('manageuser');
    }
    
    //A Function To Handle Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('logout');
 
    }
    public function index_logout(){

        return view('logout');
    }
}
