<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;

class AwardController extends Controller
{
   public function index(){
    	$user = User::find(1);
    	$awards = $user->awards()->get();
    	return Response::json($awards);
    }
}
