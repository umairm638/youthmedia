<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Permissions;
use App\WebsitesModel;
use App\CategoriesModel;
use App\PostsModel;
use App\CommentModel;
use App\LikesSharesModel;
use App\UserModel;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Input;
use Validator;
use Dawson\Youtube\Facades\Youtube as Youtube;
use Mail;

/**
 * Description of PostsController
 *
 * @author umair-malik
 */
class PostsController extends Controller {

    public $user;
    public $userName;
    public $userRoles;
    public $userImg;
    public $pageheader = 'Posts';

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->userName = $this->user['attributes']['name'];
            $this->userImg = $this->user['attributes']['profileImg'];
            $this->userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
            return $next($request);
        });
    }

    public function index() {
        $posts = PostsModel::GetAllPosts();
        return view('admin.posts')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('posts', $posts);
    }

    public function addPost() {
        $websites = WebsitesModel::GetAllWebsites();
        $categories = CategoriesModel::GetAllCategories();
        $post = '';
        return view('admin.addPost')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('websites', $websites)->with('categories', $categories)->with('post', $post);
    }

    public function getPost($postId) {
        $data = array(
            'postId' => $postId
        );
        $websites = WebsitesModel::GetAllWebsites();
        $categories = CategoriesModel::GetAllCategories();
        $post = PostsModel::GetSinglePost($data);
        return view('admin.addPost')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('websites', $websites)->with('categories', $categories)->with('post', $post);
    }

    public function insertPost(PostRequest $request) {
        $data = array(
            'postId' => $request->postId,
            'postTitle' => $request->postTitle,
            'postDescription' => $request->postDescription,
            'websiteId' => $request->websiteId,
            'categoryId' => $request->categoryId,
            'post' => $request->post,
            'postTags' => $request->postTags,
            'userId' => $this->user['attributes']['id'],
            'postStatus' => $request->postStatus,
            'createdOn' => time(),
            'postThumbnail' => '',
            'isScrapped' => 0
        );
        $file = Input::file('postThumbnail');
        $result = $this->fileUpload($file);
        if ($result != '') {
            $data['postThumbnail'] = $result;
        }
        $file = Input::file('uploadVideo');
        $result = $this->fileUpload($file, 1);
        if ($result != '') {
            $fullPathToVideo = public_path('assets/videos/' . $result);
            $video = Youtube::upload($fullPathToVideo, [
                        'title' => $request->postTitle,
                        'description' => $request->postDescription,
                        'tags' => ['youthmedia', 'news', 'funny', 'information', 'social', 'pranks', 'songs', 'video', 'dance'],
                        'category_id' => 10
            ]);
            if ($video->getVideoId()) {
                $data['post'] = 'https://www.youtube.com/embed/' . $video->getVideoId();
            }
        }
        $data['uniqueCustomKey'] = $data['post'];
        if ($request->postId == 'add') {
            $message = "Post Added Successfully";
            PostsModel::SavePost($data);
        } else {
            $post = PostsModel::GetSinglePost($data);
            if ($data['postThumbnail'] == '') {
                $data['postThumbnail'] = $post[0]->postThumbnail;
                if ($post[0]->isScrapped) {
                    $data['isScrapped'] = 1;
                }
            } else {
                $data['isScrapped'] = 0;
            }
            $data['userId'] = $post[0]->userId;
            $message = "Post Updated Successfully";
            PostsModel::UpdatePost($data);
            //send email to user when post is approved b admin
            $userData = array(
                'id' => $post[0]->userId
            );
            $userDetails = UserModel::GetSingleUser($userData);
            if ($userDetails[0]->userRole != 4 && $userDetails[0]->email != '' && $post[0]->postStatus == 0 && $data['postStatus'] == 1) {
                //send email to user
                $EmailSubject = "Video Approved";
                $videoData = array(
                    'title' => $data['postTitle'],
                    'url' => url('video/'.base64_encode($data['postId']))
                );
                $this->SendEmail($userDetails[0]->email, $EmailSubject, 'emails.videoStatusEmail', $videoData);
            }
        }
        \Session::flash('message', $message);
        return Redirect::back()->withErrors(['message', $message]);
//        return redirect()->route('posts');
    }

    public function deletePost(Request $request) {
        $data = array(
            'postId' => $request->postId
        );
        PostsModel::DeletePost($request->postId);
        LikesSharesModel::DeleteVideoHistory($data);
        CommentModel::DeletePostAllComments($data);
        if ($request->ajax()) {
            return response()->json([
                        'status' => 1, 'message' => 'Post Deleted'
            ]);
        }
    }

    public function pending() {
        $posts = PostsModel::GetAllPendingPosts();
        $pendingPosts = 1;
        return view('admin.posts')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('posts', $posts)->with('pendingPosts', $pendingPosts);
    }

    public function createThumb($postId, $videoId) {
        if ($videoId != '') {
            $url = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
            $img = 'assets/images/posts/' . $videoId . '.jpg';
            file_put_contents($img, file_get_contents($url));
            $data = array(
                'postId' => $postId,
                'postThumbnail' => $videoId . '.jpg'
            );
            PostsModel::UpdateThumbnailPost($data);
        }
        return redirect()->route('editPost', ['postId' => $postId]);
    }

    public function fileUpload($file, $isVideo = 0) {
        $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        if (!$isVideo) {
            $destinationPath = 'assets/images/posts';
        } else {
            $destinationPath = 'assets/videos';
        }
        $validator = Validator::make(array('file' => $file), $rules);
        if ($validator->passes()) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            return $filename;
        } else {
            return '';
        }
    }

    public function SendEmail($EmailTo, $Subject, $body, $data) {
        $userEmail = 'umair.malik@purelogics.net';
        $data = array('data' => $data, 'email' => $EmailTo, 'subject' => $Subject, 'userEmail' => $userEmail);
        $result = Mail::send($body, $data, function ($message) use ($data) {
                    $message->from($data['userEmail'], 'Youth Media');
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                });
        return $result;
    }

}
