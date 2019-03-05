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
 * Description of CommentModel
 *
 * @author umair-malik
 */
class CommentModel extends Model {

    protected $table = 'comments';

    public static function SaveComment($data) {
        return DB::table('comments')->insertGetId(['userId' => $data['userId'], 'postId' => $data['postId'], 'parent' => $data['parent'],
                    'commentText' => $data['commentText'], 'website' => $data['website'], 'createdAt' => $data['createdAt']]);
    }

    public static function GetPostComments($data) {
        return DB::table('comments')
                        ->leftJoin('users', 'users.id', '=', 'comments.userId')
                        ->select('comments.*', 'users.*')
                        ->where('comments.postId', '=', $data['postId'])
                        ->get();
    }

    public static function GetPostCommentsCount($data) {
        return DB::table('comments')
                        ->select('comments.*')
                        ->where('comments.postId', '=', $data['postId'])
                        ->count();
    }

    public static function DeletePostAllComments($data) {
        DB::table('comments')->where('postId', '=', $data['postId'])->delete();
    }

}
