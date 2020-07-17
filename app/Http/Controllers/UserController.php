<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;

class UserController extends Controller
{
    public function index(){
      $user = User::find(1);
      return view('app',compact('user'));
    }

    public function getPersonalSummary(){
      $user = User::find(1);
      return response::json($user);
    } 

     public function update(Request $request){
       $user = User::findOrFail(1);
       $user->name = $request->name;
       $user->surname = $request->surname;
       $user->email = $request->email;
       $user->location = $request->location;
       $user->personal_summary = $request->personal_summary;
       $user->save();

        return response::json(['response' => 200]);
    }
}
