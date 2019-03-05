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
 * Description of PostsModel
 *
 * @author umair-malik
 */
class PostsModel extends Model {

    protected $table = 'posts';

    public static function GetAllPosts() {
        return DB::table('posts')
                        ->leftJoin('websites', 'websites.websiteId', '=', 'posts.websiteId')
                        ->leftJoin('categories', 'categories.categoryId', '=', 'posts.categoryId')
                        ->select('posts.*', 'websites.websiteName', 'categories.categoryName')
                        ->where('posts.postStatus', '=', 1)
                        ->get();
    }

    public static function GetAllPendingPosts() {
        return DB::table('posts')
                        ->leftJoin('websites', 'websites.websiteId', '=', 'posts.websiteId')
                        ->leftJoin('categories', 'categories.categoryId', '=', 'posts.categoryId')
                        ->select('posts.*', 'websites.websiteName', 'categories.categoryName')
                        ->where('posts.postStatus', '=', 0)
                        ->get();
    }

    public static function GetSinglePost($data) {
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postId', '=', $data['postId'])
                        ->get();
    }

    public static function UpdatePost($data) {
        DB::table('posts')->where('postId', $data['postId'])->update(['postTitle' => $data['postTitle'],
            'postDescription' => $data['postDescription'], 'websiteId' => $data['websiteId'], 'categoryId' => $data['categoryId'],
            'post' => $data['post'], 'postTags' => $data['postTags'], 'userId' => $data['userId'], 'postStatus' => $data['postStatus'],
            'postThumbnail' => $data['postThumbnail'], 'isScrapped' => $data['isScrapped'], 'uniqueCustomKey' => $data['uniqueCustomKey']]);
    }

    public static function SavePost($data) {
        return DB::table('posts')->insertGetId(['postTitle' => $data['postTitle'], 'postDescription' => $data['postDescription'],
                    'websiteId' => $data['websiteId'], 'categoryId' => $data['categoryId'], 'post' => $data['post'], 'postTags' => $data['postTags'],
                    'userId' => $data['userId'], 'postStatus' => $data['postStatus'], 'createdOn' => $data['createdOn'],
                    'postThumbnail' => $data['postThumbnail'], 'isScrapped' => $data['isScrapped'], 'uniqueCustomKey' => $data['uniqueCustomKey']]);
    }

    public static function DeletePost($data) {
        DB::table('posts')->where('postId', '=', $data)->delete();
    }

    public static function GetAllSliderPost() {
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postStatus', '=', 1)
                        ->take(3)
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetRecentUploadPost() {
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.userId')
                        ->select('posts.*', 'users.userRole')
                        ->where('posts.postStatus', '=', 1)
                        ->where('users.userRole', '!=', 4)
                        ->take(8)
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetUserUploadPost() {
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.userId')
                        ->select('posts.*', 'users.userRole')
                        ->where('posts.postStatus', '=', 1)
                        ->where('users.userRole', '=', 4)
                        ->take(4)
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetAllUserUploadPost() {
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.userId')
                        ->select('posts.*', 'users.userRole')
                        ->where('posts.postStatus', '=', 1)
                        ->where('users.userRole', '=', 4)
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetUserPosts($data) {
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.userId')
                        ->select('posts.*', 'users.id', 'users.name')
                        ->where('posts.postStatus', '=', 1)
                        ->where('users.id', '=', $data['id'])
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetPostsByTags($data) {
        $search = $data['postTags'];
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postStatus', '=', 1)
                        ->where('posts.postTags', 'LIKE', "%$search%")
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetSinglePostDetail($data) {
        return DB::table('posts')
                        ->leftJoin('categories', 'categories.categoryId', '=', 'posts.categoryId')
                        ->select('posts.*', 'categories.categoryName')
                        ->where('posts.postId', '=', $data['postId'])
                        ->get();
    }

    public static function GetPostsByCategory($data) {
        return DB::table('posts')
                        ->leftJoin('categories', 'categories.categoryId', '=', 'posts.categoryId')
                        ->select('posts.*', 'categories.categoryName')
                        ->where('posts.postStatus', '=', 1)
                        ->where('posts.categoryId', '=', $data['categoryId'])
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetTrendingVideos() {
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postStatus', '=', 1)
                        ->take(8)
                        ->orderBy('posts.postViewed', 'desc')
                        ->get();
    }

    public static function UpdateVideoView($data) {
        DB::table('posts')->where('postId', $data['postId'])->update(['postViewed' => $data['postViewed']]);
    }

    public static function GetPostLikes($data) {
        return DB::table('posts')
                        ->leftJoin('likes_shares', 'likes_shares.postId', '=', 'posts.postId')
                        ->select('posts.*')
                        ->where('posts.postId', '=', $data['postId'])
                        ->where('likes_shares.liked', '=', 1)
                        ->count();
    }

    public static function GetPostUnLikes($data) {
        return DB::table('posts')
                        ->leftJoin('likes_shares', 'likes_shares.postId', '=', 'posts.postId')
                        ->select('posts.*')
                        ->where('posts.postId', '=', $data['postId'])
                        ->where('likes_shares.unliked', '=', 1)
                        ->count();
    }

    public static function GetMostLikedPost() {
        return DB::table('posts')
                        ->leftJoin('likes_shares', 'likes_shares.postId', '=', 'posts.postId')
                        ->select('posts.*', DB::raw('COUNT(`likes_shares`.`postId`) AS videoLikeCount'))
                        ->where('posts.postStatus', '=', 1)
                        ->where('likes_shares.liked', '=', 1)
                        ->take(8)
                        ->groupBy('posts.postId')
                        ->orderBy('videoLikeCount', 'desc')
                        ->get();
    }

    public static function UpdateThumbnailPost($data) {
        DB::table('posts')->where('postId', $data['postId'])->update(['postThumbnail' => $data['postThumbnail']]);
    }

    public static function CountSinglePostByUser($data) {
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postId', '=', $data['postId'])
                        ->where('posts.userId', '=', $data['userId'])
                        ->count();
    }

    public static function SearchVideos($data) {
        $search = $data['search'];
        return DB::table('posts')
                        ->leftJoin('users', 'users.id', '=', 'posts.userId')
                        ->select('posts.*', 'users.*')
                        ->where('posts.postTitle', 'Like', '%' . $search . '%')
                        ->orWhere('posts.postTags', 'Like', '%' . $search . '%')
                        ->orWhere('users.name', 'Like', '%' . $search . '%')
                        ->orderBy('posts.createdOn', 'desc')
                        ->get();
    }

    public static function GetUserVideosCount($userId) {
        return DB::table('posts')
                        ->select('posts.*')
                        ->where('posts.postStatus', '=', 1)
                        ->where('posts.userId', '=', $userId)
                        ->count();
    }

}
