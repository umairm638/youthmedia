<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use \Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Description of Permissions
 *
 * @author umair-malik
 */
class Permissions extends Model {

    protected $table = 'roles';

    public static function GetAllPermissions() {
        return DB::table('roles')->select('roles.*')->get();
    }

    public static function GetUserRole($roleId) {
        return DB::table('roles')
                        ->select('roles.*')
                        ->where('roleId', '=', $roleId)
                        ->get();
    }

    public static function ClearValuesModules() {
        DB::table('roles')->update(['dashboard' => 0, 'users' => 0, 'pages' => 0, 'websites' => 0, 'categories' => 0, 'posts' => 0,
            'pending' => 0, 'subscription' => 0]);

        DB::table('roles')->where('name', 'Admin')->update(['dashboard' => 1, 'users' => 1, 'pages' => 1, 'websites' => 1,
            'permissions' => 1, 'categories' => 1, 'posts' => 1, 'pending' => 1, 'subscription' => 1]);
    }

    public static function SetPermissions($data, $columnName) {
        for ($i = 0; $i < count($data); $i++) {
            DB::table('roles')->where('roleId', $data[$i])->update([$columnName => 1]);
        }
    }

    public static function SaveRole($data) {
        return DB::table('roles')->insertGetId(['name' => $data['name']]);
    }

    public static function DeleteRole($data) {
        DB::table('roles')->where('roleId', '=', $data['roleId'])->delete();
    }

    public static function UpdateRole($data) {
        DB::table('roles')->where('roleId', $data['roleId'])->update(['name' => $data['name']]);
    }

}
