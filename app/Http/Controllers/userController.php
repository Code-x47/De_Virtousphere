<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //Login Method..........................
    function login(Request $req){
        $validate = $req->validate([
         "username"=>"Required",
         "password"=>"Required"
        ]);
   
        if(auth()->attempt([
           "email"=>$validate['username'],
           "password"=>$validate['password']
        ])) {
           $req->session()->regenerate();
        }
        return redirect("/index");
        
       }
   
       //END....
   
       //Logout Method
       function logout(){
       auth()->logout();
        return redirect("/");
       }
   
}
