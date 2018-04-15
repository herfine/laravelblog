<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class BLogController extends Controller
{
    protected $limit = 5;
    public function index(){
    	$data = Posts::with('author')
        		->latestFirst()
        		->paginate($this->limit);
        return view('blog.index', compact('data'));
    }

    public function show($slug){
    	$post = \App\Posts::with('author')
    			->where('slug', $slug)
    			->first();
    	return view('blog.show', compact('post'));
    }
}

?>