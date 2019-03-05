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
 * Description of SocialSettingsModel
 *
 * @author umair-malik
 */
class SocialSettingsModel extends Model {

    protected $table = 'social_settings';

    public static function GetSocialSettings() {
        return DB::table('social_settings')
                        ->select('social_settings.*')
                        ->get();
    }

    public static function SaveSocialSettings($data) {
        return DB::table('social_settings')->insertGetId([
                    'socialName' => $data['socialName'], 'socialLink' => $data['socialLink'], 'socialIcon' => $data['socialIcon']
        ]);
    }

    public static function GetSingleSocial($data) {
        return DB::table('social_settings')
                        ->select('social_settings.*')
                        ->where('social_settings.socialId', '=', $data['socialId'])
                        ->get();
    }

    public static function DeleteSocial($data) {
        DB::table('social_settings')->where('socialId', '=', $data)->delete();
    }

    public static function UpdateSocial($data) {
        DB::table('social_settings')->where('socialId', $data['socialId'])->update(['socialName' => $data['socialName'],
            'socialLink' => $data['socialLink'], 'socialIcon' => $data['socialIcon']]);
    }

}
