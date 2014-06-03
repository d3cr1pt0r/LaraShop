<?php namespace Admin;

class UserController extends Controller {

	public function postRegister()
	{
		// Handle errors
		$errors = array();
		if(Input::get('password') != Input::get('password2'))
		{
			$errors[] = "Passwords don't match!<br>";
		}
		if(count(User::where('email', '=', Input::get('email'))->get()->toArray()) != 0)
		{
			$errors[] = "User with this email already exists!<br>";
		}
		
		if(count($errors) == 0)
		{
			$user = new User();
			$user->name = Input::get('name');
			$user->surname = Input::get('surname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->type = Input::get('type');
			$user->save();

			Session::flash('alert', array('type' => "success", 'messages' => array('You have been successfuly registered')));
			return Redirect::to('/');
		}
		else
		{
			Session::flash('alert', array('type' => "error", 'messages' => $errors));
			return Redirect::action('UserController@getRegister');
		}
	}
	
}