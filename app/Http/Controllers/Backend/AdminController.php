<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('backend.pages.admin')->with([
            'users' =>  $users
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            Alert::error('Validation Error', $validator->messages()->all()[0]);
            return redirect()->back()->withInput();
        }

      
        $user = new User;  
        $user->name = $request->get('name');  
        $user->email = $request->get('email');  
        $user->password =  Hash::make($request->get('password'));
        $user->save();

        Alert::success('Success', 'New Admin created successfully.');
        return back();
    }

    public function showLoginForm()
    {
        return view('backend.pages.login.index');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput();
        }
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Success', 'You have Successfully loggedin');
            return redirect()->route('mobile.brand.index');
        }
  
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Success', 'New Admin created successfully.');
        return redirect('/my_home_login');
    }

    public function message()
    {
        $messages = Contact::get();
        return view('backend.pages.message')->with([
            'messages' => $messages
        ]);
    }
}