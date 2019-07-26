<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Applicant;
use App\proImg;
use App\proResume;
use Validator;
use Auth;

class ApplicantController extends Controller
{

    public function ApplicantRegister(Request $request)
    {
        $data = Input::except(array('_token'));

        $rule = array(

            'first_name'    => 'required',            
            'last_name'     => 'required',            
            'email'         => 'required|email',  
            'password'      => 'required|min:5|max:10',
            'cpassword'     => 'required|same:password'          
        );

        $message = array(
            'password.required' => 'Password field is required',
            'cpassword.required' => 'Confirm password is required'
        );

        $validator = Validator::make($data, $rule, $message);

        if($validator -> fails()) {
            return redirect() -> back() -> withErrors($validator);
        }else {
            Applicant::form_store(Input::except(array('_token', 'cpassword')));

            $userdata = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password')
            );

            if(Auth::guard('applicant') -> attempt($userdata)) {
                return redirect('/') -> with('registerSuccess', "You are successfully registered");
            }else {
                return redirect('/') -> with('registerFailed', 'Registration or Login failed');
            }
        }
    }  

    public function uploadProImg(Request $request)
    {
        if($request -> hasFile('file')) {
            
            $file     = $request -> file('file');
            $fileName = $file    -> getClientOriginalName();
            $fileSize = $file    -> getClientSize();

            $destinationPath = base_path() . '\public\proImage';
            $file -> move($destinationPath, $fileName);

            $user_id = Auth::guard('applicant')->id();
            $proImg  = new proImg();
            $proImg -> proImgName = $fileName;
            $proImg -> proImgSize = $fileSize;
            $proImg -> user_id    = $user_id;

            $proImg -> save();
            return redirect('/userDash') -> with('imgSuccess', 'Image successfully updated');
        }
    }

    public function uploadResume(Request $request)
    {
        if($request -> hasFile('pd')) {
            
            $file     = $request -> file('pd');
            $fileName = $file    -> getClientOriginalName();
            $fileSize = $file    -> getClientSize();

            $destinationPath = base_path() . '\public\resume';
            $file -> move($destinationPath, $fileName);

            $user_id = Auth::guard('applicant')->id();
            $proResume = new proResume();
            $proResume -> resumeName = $fileName;
            $proResume -> resumeSize = $fileSize;
            $proResume -> user_id    = $user_id;

            $proResume -> save();
            return redirect('/userDash') -> with('resumeSuccess', 'Resume successfully updated');
        }
    }
}
