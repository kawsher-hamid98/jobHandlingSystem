<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function jobList()
    {
    	$jobs = DB::table('jobs') -> paginate(5);
    	return view('home', ['jobs' => $jobs]);
    }

    public function getJob($id)
    {
    	$jobs = DB::table('jobs') -> where('id', $id) -> get();
    	return view('jobDetails', ['jobs' => $jobs]);
    }

    public function who_applied() 
    {
        
    }
}