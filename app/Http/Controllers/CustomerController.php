<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    function CreateUser(Request $request){
       $name = $request->input('name');
       $email = $request->input('email');
       $password = $request->input('password');

       return User::create([
           'name'=>$name,
           'email'=>$email,
           'password'=>$password
       ]);
    }
}
