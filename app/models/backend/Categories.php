<?php namespace Admin;
use Eloquent;
class Categories extends Eloquent {

	protected $table = 'categories';

	public static function getAllCategories()
	{
		$parent_categories = self::where('parent_id', '=', 0)->get();
		$array = array();
		self::to_tree($parent_categories, $array);
		return $array;
	}

	private static function to_tree($parent_categories, &$array, $level=-1)
	{
		foreach($parent_categories as $parent_category) {
			$level++;
			$array[] = array('category' => $parent_category->name, 'level' => $level, 'id' => $parent_category->id);
			$children = self::where('parent_id', '=', $parent_category->id)->get();
			self::to_tree($children, $array, $level);
			$level--;
		}
	}

}