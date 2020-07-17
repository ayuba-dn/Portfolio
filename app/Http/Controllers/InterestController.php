<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;

class InterestController extends Controller
{
    public function index(){
    	$user = User::find(1);
    	$interests = $user->interests()->get();
    	return Response::json($interests);
    }
}
