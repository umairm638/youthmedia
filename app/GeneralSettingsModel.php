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
 * Description of GeneralSettingsModel
 *
 * @author umair-malik
 */
class GeneralSettingsModel extends Model {

    protected $table = 'general_settings';

    public static function GetGeneralSettings() {
        return DB::table('general_settings')
                        ->select('general_settings.*')
                        ->take(1)
                        ->orderBy('general_settings.generalId', 'desc')
                        ->get();
    }

    public static function SaveGeneralSettings($data) {
        return DB::table('general_settings')->insertGetId(['webTitle' => $data['webTitle'],
                    'googleAnalytics' => $data['googleAnalytics'], 'googleAnalyticsAdditional' => $data['googleAnalyticsAdditional'],
                    'fbAnalytics' => $data['fbAnalytics'], 'otherSeo' => $data['otherSeo'], 'otherAnalyticsHead' => $data['otherAnalyticsHead'],
                    'otherAnalyticsBody' => $data['otherAnalyticsBody'], 'aboutUs' => $data['aboutUs'], 'contactAddress' => $data['contactAddress'],
                    'contactPhoneOne' => $data['contactPhoneOne'], 'contactPhoneTwo' => $data['contactPhoneTwo'], 'contactEmail' => $data['contactEmail']
        ]);
    }

}
