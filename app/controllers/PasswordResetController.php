<?php

class PasswordResetController extends Controller {

    /**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('PasswordReset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{    
		$credentials = Input::only('email', 'password', 'password_confirmation', 'token');

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD: 
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				//When anything wrong happens, back to the reset form with all the input there for the customer to modify
				return Redirect::back()->with('error', Lang::get($response))
                       ->withInput(Input::all());
					   
			case Password::PASSWORD_RESET:
			     //Reset is done, redirect to the login page with empty password
				 { Input::merge(array('password' => ''));
				return Redirect::to('login')
				       ->withErrors(array('password' => 'Your login password has been successfully reset.')) // Tell the customer reset is done.
				 ->withInput(Input::all());}
		}
		
	}
	

}
