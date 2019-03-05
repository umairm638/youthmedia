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
 * Description of WebsitesModel
 *
 * @author umair-malik
 */
class WebsitesModel extends Model {

    protected $table = 'websites';

    public static function GetAllWebsites() {
        return DB::table('websites')
                        ->select('websites.*')
                        ->get();
    }

    public static function GetSingleWebsite($data) {
        return DB::table('websites')
                        ->select('websites.*')
                        ->where('websites.websiteId', '=', $data['websiteId'])
                        ->get();
    }

    public static function UpdateWebsite($data) {
        DB::table('websites')->where('websiteId', $data['websiteId'])->update(['websiteName' => $data['websiteName'],
            'websiteUrl' => $data['websiteUrl']]);
    }

    public static function SaveWebsite($data) {
        return DB::table('websites')->insertGetId(['websiteName' => $data['websiteName'], 'websiteUrl' => $data['websiteUrl']]);
    }

    public static function DeleteWebsite($data) {
        DB::table('websites')->where('websiteId', '=', $data)->delete();
    }

}
