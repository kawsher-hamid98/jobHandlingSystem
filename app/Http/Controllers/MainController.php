<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    public function home()
    {
    	return view('home');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function logoutSession(Request $request)
    {
        if(Auth::guard('applicant')->check()) {
            Auth::guard('applicant')->logout();
            $request->session()->flush();
            return redirect('/login') -> with('successLogout', 'Logged out Successfully');
        }else {
            Auth::logout();
            $request->session()->flush();
            return redirect('/login') -> with('successLogout', 'Logged out Successfully');
        }
    }

    public function loginPage()
    {
    	return view('login');
    }
 
 	public function CompanyRegisterPage()
    {
    	return view('CompanyregisterView');
    }

    public function login()
    {
        $data = Input::except(array('_token'));

        $rule = array(
            'email'     => 'required',  
            'password'  => 'required'      
        );

        $validator = Validator::make($data, $rule);

        if($validator -> fails()) {
            return redirect() -> back() -> withErrors($validator);
        }else {
        $userdata = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

            if(Auth::attempt($userdata)) {
                return redirect('/') -> with('loginSuccess', 'Logged in Successfully');
            }elseif(Auth::guard('applicant') -> attempt($userdata)) {
                return redirect('/') -> with('loginSuccess', 'Logged in Successfully');
            }else {
                return redirect() -> back() -> with('loginFail', 'Login attemption failed');
            }
        }
    }


}
