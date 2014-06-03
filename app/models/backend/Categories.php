<?php namespace Admin;
use Eloquent;

class Categories extends Eloquent {

	protected $table = 'categories';

	public static function moveUp($id)
	{
		$category = self::find($id);
		$first_upper = self::where('parent_id', '=', $category->parent_id)->where('position', '=', $category->position-1)->first();

		if($first_upper == null) return;
		$tmp_position = $category->position;
		$category->position = $first_upper->position;
		$first_upper->position = $tmp_position;

		$category->save();
		$first_upper->save();
	}

	public static function moveDown($id)
	{
		$category = self::find($id);
		$first_upper = self::where('parent_id', '=', $category->parent_id)->where('position', '=', $category->position+1)->first();

		if($first_upper == null) return;
		$tmp_position = $category->position;
		$category->position = $first_upper->position;
		$first_upper->position = $tmp_position;

		$category->save();
		$first_upper->save();
	}

	public static function getAllCategories()
	{
		$parent_categories = self::where('parent_id', '=', 0)->orderBy('position', 'asc')->get();
		$array = array();
		self::to_tree($parent_categories, $array);
		return $array;
	}

	private static function to_tree($parent_categories, &$array, $level=-1)
	{
		foreach($parent_categories as $parent_category) {
			$level++;
			$parent_category->level = $level;
			$array[] = $parent_category;
			$children = self::where('parent_id', '=', $parent_category->id)->orderBy('position', 'asc')->get();
			self::to_tree($children, $array, $level);
			$level--;
		}
	}

	public static function fixPositions()
	{
		$parent_categories = self::where('parent_id', '=', 0)->orderBy('position', 'asc')->get();
		self::fix_positions($parent_categories, 0, 1);
	}

	private static function fix_positions($parent_categories, $level, $position)
	{
		if($position > 1)
			$position--;
		foreach($parent_categories as $parent_category) {
			$level++;
			$parent_category->position = $position;
			$parent_category->save();
			$children = self::where('parent_id', '=', $parent_category->id)->orderBy('position', 'asc')->get();
			self::fix_positions($children, $level, $position);
			$position++;
			$level--;
		}
	}

}