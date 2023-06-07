<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsControllers extends Controller
{
   public function destroy(){
    auth()->logout();
    session()->regenerate();
    return redirect('/')->with('success','Good Bye!!');
   }
   public function create(){
    return view('sessions.create');
   }

   public function store(){
    // validate the request
     $attributes =  request()->validate([
        'email' =>'required|email',
        'password' => 'required'
    ]);
    // attempt to authenicate and log in the user
     if(auth()->attempt($attributes)){
      // redirect to the home page with a success message
      return redirect('/')->with('success','Welcome Back!!');
     }
   // create a new session for the user.
     session()->regenerate();

     throw ValidationException::withMessages(['email'=>'Your provided credentials could not be verified...']);
   }
}
