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
 * Description of SubscriptionModel
 *
 * @author umair-malik
 */
class SubscriptionModel extends Model {

    protected $table = 'subscription';
    public $timestamps = false;
    
    public static function DeleteSubscription($data) {
        DB::table('subscription')->where('subscriptionId', '=', $data['subscriptionId'])->delete();
    }

    public static function SaveSubscription($data) {
        return DB::table('subscription')->insertGetId(['subscriptionUserId' => $data['subscriptionUserId'],
                    'subscriptionEmail' => $data['subscriptionEmail']]);
    }

    public static function CheckSubscription($data) {
        return DB::table('subscription')
                        ->select('subscription.*')
                        ->where('subscription.subscriptionEmail', '=', $data['subscriptionEmail'])
                        ->count();
    }

    public static function GetAllUser() {
        return DB::table('subscription')
                        ->select('subscription.*')
                        ->get();
    }

    public static function GetSingleSubscriber($data) {
        return DB::table('subscription')
                        ->select('subscription.*')
                        ->where('subscription.subscriptionId', '=', $data['subscriptionId'])
                        ->get();
    }

    public static function UpdateSubscription($data) {
        DB::table('subscription')->where('subscriptionId', $data['subscriptionId'])->update(['subscriptionEmail' => $data['subscriptionEmail'],
            'subscriptionUserId' => $data['subscriptionUserId']]);
    }

}
