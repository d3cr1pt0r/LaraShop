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
		$object = self::find($id);
		$object_up = self::orderBy('position', 'desc')->where('position', '<', $object->position)->first();
		$tmp_position = $object->position;
		$object->position = $object_up->position;
		$object_up->position = $tmp_position;

		$object->save();
		$object_up->save();
	}

	public static function moveDown($id)
	{
		$object = self::find($id);
		$object_down = self::orderBy('position', 'asc')->where('position', '>', $object->position)->first();
		$tmp_position = $object->position;
		$object->position = $object_down->position;
		$object_down->position = $tmp_position;

		$object->save();
		$object_down->save();
	}

	public static function nextPosition()
	{
		$object = self::orderBy('id', 'desc')->first();
		if($object != null)
			return $object->id + 1;
		else
			return 0;
	}

}