<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
use App\Branch;

class Studio extends Model
{
    protected $guarded = ['id'];
	
	public function schedule(){
		return $this->hasMany(Schedule::class);
	}
	
	public function branch(){
		return $this->belongsTo(Branch::class);
	}
	
}
