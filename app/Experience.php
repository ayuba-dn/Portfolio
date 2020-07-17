<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['created_at','updated_at','start_date','end_date','company','responsibilities','job_title','user_id'];
}
