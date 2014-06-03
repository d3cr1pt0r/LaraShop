<?php namespace Admin;
use Controller, View, Auth, Input, Session, Redirect;

class HomeController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin', array('except' => array('getLogin', 'postLogin', 'getLogout')));
	}

	public function getIndex()
	{
		return View::make('backend.home.index')->with('title', 'Home | Index page');
	}

	public function getLogin()
	{
		return View::make('backend.home.login')->with('title', 'Home | Login page');
	}

	public function postLogin()
	{
		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			Session::flash('alert', array('type' => "success", 'messages' => array('You have been successfuly logged in')));
			return Redirect::to('/admin');
		}
		else
		{
			Session::flash('alert', array('type' => "error", 'messages' => array('Username or password was incorrect')));
			return Redirect::to('/admin/login');
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/admin/login');
	}

}
