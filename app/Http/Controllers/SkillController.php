<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use App\Skill;

class SkillController extends Controller
{
    public function index(){
    	$user = User::find(1);
    	$skills = $user->skills()->get();
    	return Response::json($skills);
    }
    public function deleteSkill($id){
    	$skill = Skill::find($id);
    	$skill->delete();
    	return Response::json($skill);
    }
    public function addSkill(Request $input){
    	$skill = new Skill();
    	$skillname = $input->skill_name;
    	$skill->skill_name = $skillname;
    	$skill->save();
    	return Response::json($skill);
    }
}
