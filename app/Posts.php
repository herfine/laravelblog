<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Posts extends Model
{
    protected $fillable=['title','slug','author_id','excerpt','content'];
    function getImagePostAttribute(){
    	$imgpath = "";
    	if ($this->image != null) {
	    	if (file_exists(public_path('img/'.$this->image))) {
	    		$imgpath = '/img/'.$this->image;
	    	}
	    }
	    return $imgpath;
    }

    function getDateAttribute(){
    	return $this->created_at->diffForHumans();
    }

    function author(){
    	return $this->belongsTo(User::class);
    }

    function scopeLatestFirst($query){
    	return $query->orderBy('created_at', 'DESC');
    }
}
