<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['id','institution','degree_type','course','gpa','start_date','end_date','user_id','created_at','updated_at'];
}


  