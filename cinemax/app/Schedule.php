<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
use App\Studio;

class Schedule extends Model
{
    protected $guarded = ['id'];
	
	public function search($query, $s) {
		return $query->where('price', 'like', '%' .$s. '%');
	}
	
	public function movie(){
		return $this->belongsTo(Movie::class);
	}
	
	public function Studio(){
		return $this->belongsTo(Studio::class);
	}
}
