<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\PostsModel;
use Auth;
use Dawson\Youtube\Facades\Youtube as Youtube;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class VideoController extends Controller {

    public function __construct() {
        
    }

    public function uploadVideo(UserPostRequest $request) {
        $userId = 4;
        $userMsg = '';
        if ($user = Auth::user()) {
            $userId = $user['attributes']['id'];
        } else {
            $userMsg = ' Login To Participate In Our Top Contributors And Win Exciting Prizes!';
        }
        $data = array(
            'postTitle' => $request->postTitle,
            'postDescription' => $request->postDescription,
            'websiteId' => 3,
            'categoryId' => $request->categoryId,
            'post' => '',
            'postTags' => 'youthmedia',
            'userId' => $userId,
            'postStatus' => 0,
            'createdOn' => time(),
            'postThumbnail' => '',
            'isScrapped' => 0,
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
                        'category_id' => 1,
            ]);
            if ($video->getVideoId()) {
                $data['post'] = 'https://www.youtube.com/embed/' . $video->getVideoId();
            }
        }
        $data['uniqueCustomKey'] = $data['post'];
        if ($data['post'] != '') {
            $message = "Video Submitted For Admin Review!" . $userMsg;
            PostsModel::SavePost($data);
        } else {
            $message = "Upload mp4 Video!";
        }
        \Session::flash('videomessage', $message);
        return Redirect::back()->withErrors(['videomessage', $message]);
    }

    public function fileUpload($file, $isVideo = 0) {
        $rules = array('file' => 'required|mimetypes:video/mp4'); //'required|mimes:video/avi,video/mp3,'
        if (!$isVideo) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg,jpg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
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

}
