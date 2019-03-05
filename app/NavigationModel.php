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
 * Description of NavigationModel
 *
 * @author umair-malik
 */
class NavigationModel extends Model {

    protected $table = 'navigation';

    public static function GetNavigation() {
        return DB::table('navigation')
                        ->select('navigation.*')
                        ->orderBy('navigation.navId')
                        ->get();
    }

    public static function UpdateNavigation($navId, $isEnable) {
        if ($isEnable == '') {
            $isEnable = 0;
        }
        DB::table('navigation')->where('navId', $navId)->update(['isEnable' => $isEnable]);
    }

    public static function GetSinglePage($data) {
        return DB::table('navigation')
                        ->select('navigation.*')
                        ->where('navigation.navId', '=', $data['navId'])
                        ->get();
    }

    public static function UpdatePage($data) {
        $navId = $data['navId'];
        $pageCode = $data['pageCode'];
        $pageTitle = $data['pageTitle'];
        $pageDescription = $data['pageDescription'];
        $pageKeywords = $data['pageKeywords'];
        $data = json_encode($data);
        DB::table('navigation')->where('navId', $navId)->where('pageCode', $pageCode)->update([
            'pageTitle' => $pageTitle, 'pageDescription' => $pageDescription,
            'pageKeywords' => $pageKeywords, 'pageSettings' => $data]);
    }

    public static function GetPageSettings($data) {
        return DB::table('navigation')
                        ->select('navigation.*')
                        ->where('navigation.pageCode', '=', $data['pageCode'])
                        ->where('navigation.navLocation', '=', 'header')
                        ->get();
    }

}
