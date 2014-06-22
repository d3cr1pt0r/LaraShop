<?php namespace Admin;
use Controller, View, Session, Redirect;

class LanguagesController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin', array('except' => array('getLogin', 'postLogin', 'getLogout')));
	}

	public function getIndex()
	{
		return View::make('backend.languages.index')->with('title', 'Languages | Index page');
	}

}
