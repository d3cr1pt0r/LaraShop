<?php namespace Admin;
use Eloquent;

class BaseModel extends Eloquent {

	public static function toggleActive($id)
	{
		$object = self::find($id);
		$object->active = !$object->active;
		$object->save();
	}

	public static function moveUp($id)
	{

	}

	public static function moveDown($id)
	{
		
	}

}