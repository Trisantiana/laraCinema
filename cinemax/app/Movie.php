<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;

class Movie extends Model
{
    protected $guarded = ['id'];
	
	public function schedule(){
		return $this->hasMany(Schedule::class);
	}
}
