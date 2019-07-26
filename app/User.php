<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use App\User;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'business_name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

     public static function form_store($data)
    {
        $first_name    = Input::get('first_name');
        $last_name     = Input::get('last_name');
        $business_name = Input::get('business_name');
        $email         = Input::get('email');
        $password      = Hash::make(Input::get('password'));

        $company = new User();

        $company -> first_name    = $first_name;
        $company -> last_name     = $last_name;
        $company -> business_name = $business_name;
        $company -> email         = $email;
        $company -> password      = $password;
    
        $company -> save();
    }
}
