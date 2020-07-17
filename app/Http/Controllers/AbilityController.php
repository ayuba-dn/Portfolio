<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtherAbility;
use Response;


class AbilityController extends Controller
{
     public function index(){
    	$abilities = OtherAbility::all();
    	return Response::json($abilities);
    }
    public function deleteAbility($id){
    	$ability = OtherAbility::find($id);
    	$ability->delete();
    	return Response::json($ability);
    }
    public function addAbility(Request $input){
    	$ability = new OtherAbility();
    	$ability->ability = $input->ability;
    	$ability->save();
    	return Response::json($ability);
    }
}
