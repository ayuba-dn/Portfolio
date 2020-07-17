<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Education;

class EducationController extends Controller
{
    public function index(){
    	$user = User::find(1);
    	$education = $user->education()->get(); 
    	return Response::json($education);
    }
    public function update(Request $request){
    	$education  = Education::findOrFail($request->id);
        $input = $request->all();   
        $education->fill($input);
        $education->save();
        return Response::json($education);
    }
    public function add(Request $request){
        $education  = new Education();
        $input = $request->all();   
        $education->fill($input);
        $education->save();
        return Response::json($education);
    }
    public function delete($id){
        $education  = Education::findOrFail($id);
        $education->delete();
        return Response::json(['status' => "success"]);
    }
}
