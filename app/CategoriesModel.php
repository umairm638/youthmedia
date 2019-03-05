<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;
use DB;
use \Illuminate\Database\Eloquent\Model;

/**
 * Description of CategoriesModel
 *
 * @author umair-malik
 */
class CategoriesModel extends Model {
	protected $table = 'categories';
	public static function GetAllCategories() {
		return DB::table('categories')
			->select('categories.*')
			->get();
	}
	public static function GetSingleCategory($data) {
		return DB::table('categories')
			->select('categories.*')
			->where('categories.categoryId', '=', $data['categoryId'])
			->get();
	}
	public static function UpdateCategory($data) {
		DB::table('categories')->where('categoryId', $data['categoryId'])->update(['categoryName' => $data['categoryName']]);
	}
	public static function SaveCategory($data) {
		return DB::table('categories')->insertGetId(['categoryName' => $data['categoryName']]);
	}
	public static function DeleteCategory($data) {
		DB::table('categories')->where('categoryId', '=', $data)->delete();
	}
}