<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Experience;
use Response;

class ExperienceController extends Controller
{
    public function index(){
    	$user = User::find(1);
    	$experiences = $user->experiences()->get();
    	return Response::json($experiences);
    }
     public function delete($id){
        $experience  = Experience::findOrFail($id);
        $experience->delete();
        return Response::json(['status' => "success"]);
    }
      public function update(Request $request){
    	$experience  = Experience::findOrFail($request->id);
        $input = $request->all();   
        $experience->fill($input);
        $experience->save();
        return Response::json($experience);
    }
    public function add(Request $request){
        $experience  = new Experience();
        $input = $request->all();   
        $experience->fill($input);
        $experience->save();
        return Response::json($experience);
        


        
    }
}
