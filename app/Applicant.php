<?php

namespace App;

use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Applicant;
use Auth;
use Hash;

class Applicant extends Authenticatable
{
	protected $guard = 'applicant';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'proImgName', 'proImgSize'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

     public static function form_store($data)
    {
        $first_name    = Input::get('first_name');
        $last_name     = Input::get('last_name');
        $email         = Input::get('email');
        $password      = Hash::make(Input::get('password'));

        $applicant = new Applicant();

        $applicant -> first_name    = $first_name;
        $applicant -> last_name     = $last_name;
        $applicant -> email         = $email;
        $applicant -> password      = $password;
    
        $applicant -> save();
    }
}
