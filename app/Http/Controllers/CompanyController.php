<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\User;
use App\Job;
use Auth;

class CompanyController extends Controller
{

    public function CompanyRegister(Request $request)
    {
        $data = Input::except(array('_token'));

        $rule = array(

            'first_name'    => 'required',            
            'last_name'     => 'required',            
            'business_name' => 'required',            
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
            User::form_store(Input::except(array('_token', 'cpassword')));

            $userdata = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password')
            );

            if(Auth::attempt($userdata)) {
                return redirect('/') -> with('registerSuccess', "You are successfully registered");
            }else {
                return redirect('/') -> with('registerFailed', 'Registration or Login failed');
            }
        }
    }  

    public function jobRegister() 
    {
        $data = Input::except(array('_token'));

        $rule = array(

            'job_title'       => 'required',            
            'job_description' => 'required|max:500',            
            'salary'          => 'required',  
            'location'        => 'required',     
            'country'         => 'required',     
        );


        $validator = Validator::make($data, $rule);

        if($validator -> fails()) {
            return redirect() -> back() -> withErrors($validator);
        }else {

        	$job_title       = Input::get('job_title');
        	$job_description = Input::get('job_description');
        	$salary          = Input::get('salary');
        	$location        = Input::get('location');
        	$country         = Input::get('country');

        	$job = new Job();
            $company_id = Auth::guard('web') -> id();

        	$job -> job_title       = $job_title;
        	$job -> job_description = $job_description;
            $job -> company_id      = $company_id;
        	$job -> salary          = $salary;
        	$job -> location        = $location;
        	$job -> country         = $country;

        	$job -> save();

        	return redirect() -> back() -> with('success', 'Job added successfully');
    	}
    }
}
