<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\skill;
use App\applied;

class ApplicantAuthController extends Controller
{
    public function __construct()
	{
		$this -> middleware('auth:applicant');
	}

	public function ApplicantDash()
	{
		return view('applicantDash');
	}

    public function getUser()
    {
    	$id            = Auth::guard('applicant') -> id();
    	$img_max_id    = DB::table('pro_imgs')    -> max('id');
    	$resume_max_id = DB::table('pro_resumes') -> max('id');
    	$skill_max_id  = DB::table('skills')      -> max('id');

    	$applicant = DB::table('applicants')
					-> join('pro_imgs','applicants.id','=','pro_imgs.user_id')
					-> join('pro_resumes','applicants.id','=','pro_resumes.user_id')
					-> join('skills','applicants.id','=','skills.user_id')
					-> where(['pro_imgs.user_id' => $id, 'pro_imgs.id' => $img_max_id])
					-> where(['pro_resumes.user_id' => $id, 'pro_resumes.id' => $resume_max_id])
					-> where(['skills.user_id' => $id, 'skills.id' => $skill_max_id])
					-> get();
    	return view ('applicantDash', ['applicant' => $applicant]);
    }

    public function getSkills(Request $request)
    {
    	$data = Input::all();
    	$input = Input::get('skills');

    	foreach ($input as $key => $value) {

		    $Skill = new skill();
		    $Skill -> user_id = Auth::guard('applicant') -> id();
		    $Skill -> skills  = $data['skills'][$key];
		    $Skill -> save();
		}
	    return redirect() -> back();
    }

    public function applyCompany($id) 
    {
	    $user_id     = Auth::guard('applicant') -> id();
	    $jobs        = DB::table('jobs') 
				        -> where('id', $id) 
				        -> get();
        $existsApply = DB::table('applieds')
					    -> where('user_id', '=', $user_id)
					    -> where('job_id', '=', $id)
					    -> first();

	    $check_resume = DB::table('pro_resumes')
	    				-> where('user_id', '=', $user_id)
	    				-> first();

		if (is_null($existsApply) && !is_null($check_resume)) {
			$apply = new applied();
        	$apply -> user_id    = $user_id;
        	$apply -> company_id = 2;
        	$apply -> job_id     = $id;
        	$apply -> save();
		}else {
        	return redirect() -> back() -> with('Error', 'You already applied to this Job or Please upload your CV');
        }
    	return view('jobDetails', ['jobs' => $jobs]);
    }
}