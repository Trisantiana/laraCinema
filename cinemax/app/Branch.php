<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Studio;

class Branch extends Model
{
    protected $guarded = ['id'];
	
	public function studio(){
		return $this->hasMany(Studio::class);
	}
}
