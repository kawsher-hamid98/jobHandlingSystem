<?php

Route::group(['middleware' => 'revalidate'], function()
{

	Route::get('/', 'MainController@home');

	Route::get('/login', 'MainController@loginPage');
	Route::post('/login', 'MainController@login');

	Route::get('/logout', 'MainController@logoutSession');

	Route::get('/company_register', 'MainController@CompanyRegisterPage');
	Route::post('/company_register', 'CompanyController@CompanyRegister');

	Route::get('/register', 'MainController@registerPage');
	Route::post('/register', 'ApplicantController@ApplicantRegister');
	Route::get('/userDash', 'ApplicantAuthController@ApplicantDash');

	Route::post('/skills', 'ApplicantAuthController@getSkills');

	Route::post('/proImg', 'ApplicantController@uploadProImg');
	Route::get('/userDash', 'ApplicantAuthController@getUser');

	Route::post('/proResume', 'ApplicantController@uploadResume');

	Route::get('/apply/{id}', 'ApplicantAuthController@applyCompany');

	Route::get('/dash', 'AuthController@dashboard');
	Route::post('/job_register', 'CompanyController@jobRegister');

	Route::get('/', 'JobController@JobList');
	Route::get('/list/{id}', 'JobController@getJob');

	Route::get('/who_apply', 'AuthController@who_applied');

});
