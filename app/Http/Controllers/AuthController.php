<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
	public function __construct()
	{
		$this -> middleware('auth');
	}

    public function dashboard()
    {	
		return view('dash');
	}

	public function who_applied()
	{
		$application = DB::table('applieds')
						-> join('jobs', 'applieds.job_id', '=', 'jobs.id' )
						-> join('users', 'users.id', '=', 'jobs.company_id' )
						-> join('applicants', 'applieds.user_id', '=', 'applicants.id')
						-> join('pro_resumes', 'applieds.user_id', '=', 'pro_resumes.user_id')
						-> get();
		return view ('whoApplied', ['application' => $application]);
	}

}
