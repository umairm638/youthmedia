<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\NavigationModel;
use App\PostsModel;
use App\UserModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;

/**
 * Description of UserController
 *
 * @author umair-malik
 */
class UserController extends Controller {

    public $user;
    public $pageCode = 'home';
    public $settings;

    public function __construct() {
        $this->settings = productImagePath($this->pageCode);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index() {
        $data = array(
            'pageCode' => $this->pageCode,
            'id' => $this->user['attributes']['id']
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $userUpload = PostsModel::GetAllUserUploadPost();
        $userOwnVideos = DB::table('posts')->where('posts.postStatus', '=', 1)->where('posts.userId', '=', $this->user['attributes']['id'])
                ->paginate(12);
        $userOwnVideosCount = PostsModel::GetUserVideosCount($this->user['attributes']['id']);
        return view('settings')->with('settings', $this->settings)->with('pageSettings', $pageSettings)->with('userUpload', $userUpload)
                        ->with('userOwnVideos', $userOwnVideos)->with('userOwnVideosCount', $userOwnVideosCount);
    }

    public function userSettings(Request $request) {
        $message = "Fill all Required Fields";
        $error = 0;
        if ($request->name == '' || $request->email == '') {
            $error = 1;
        }
        $data = array(
            'id' => $this->user['attributes']['id'],
            'name' => $request->name,
            'email' => $this->user['attributes']['email'],
            'userRole' => $this->user['attributes']['userRole'],
            'profileImg' => $request->userProfileImg,
            'userPhone' => $request->userPhone
        );
        if ($request->password != '' && $request->password == $request->password_confirmation) {
            $data['password'] = bcrypt($request->password);
        }
        if ($error) {
            \Session::flash('error_message', $message);
        } else {
            $user = UserModel::GetSingleUser($data);
            $file = Input::file('userProfileImg');
            $result = $this->fileUpload($file);
            if ($result != '') {
                $data['profileImg'] = $result;
            } else {
                $data['profileImg'] = $user[0]->profileImg;
            }
            $message = "Profile Updated Successfully";
            UserModel::UpdateUser($data);
            \Session::flash('message', $message);
        }
        return redirect()->route('settings');
    }

    public function fileUpload($file) {
        $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $destinationPath = 'assets/images/users';
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
