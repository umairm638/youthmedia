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
use App\UserModel;
use App\Permissions;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Input;
use Validator;

/**
 * Description of UserController
 *
 * @author umair-malik
 */
class UserController extends Controller {

    public $user;
    public $userName;
    public $userRoles;
    public $userImg;
    public $pageheader = 'Profile';

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->userName = $this->user['attributes']['name'];
            $this->userImg = $this->user['attributes']['profileImg'];
            $this->userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
            if ($this->userRoles[0]->users != 1) {
                Redirect::to('admin')->send();
            }
            return $next($request);
        });
    }

    public function profile($userId = 0) {
        $redirectTo = 'profile';
        if ($userId == 0) {
            $userId = $this->user['attributes']['id'];
        } else {
            $redirectTo = 'userList';
        }
        $data = array(
            'id' => $userId
        );
        $users = UserModel::GetSingleUser($data);
        $permissions = Permissions:: GetAllPermissions();
        return view('admin.profile')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('users', $users)->with('permissions', $permissions)->with('redirectTo', $redirectTo);
    }

    public function updateProfile(Request $request) {
        $message = "Fill all Required Fields";
        $error = 0;
        if ($request->name == '' || $request->email == '' || $request->userRole == '') {
            $error = 1;
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $message = "Enter Valid Email Address";
            $error = 1;
        }
        $data = array(
            'id' => $request->userId,
            'name' => $request->name,
            'email' => $request->email,
            'userRole' => $request->userRole,
            'userPhone' => $request->userPhone,
            'profileImg' => $request->profileImg
        );
        if ($request->password != '' && $request->password == $request->password_confirmation) {
            $data['password'] = bcrypt($request->password);
        }
        if ($error) {
            \Session::flash('error_message', $message);
        } else {
            $user = UserModel::GetSingleUser($data);
            $file = Input::file('profileImg');
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
        return redirect()->route($request->redirectTo);
    }

    public function userList() {
        $this->pageheader = 'Users';
        $userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
        if ($userRoles[0]->name == 'Admin') {
            $users = UserModel::GetAllUser();
        } else {
            $data = array(
                'id' => $this->user['attributes']['id']
            );
            $users = UserModel::GetSingleUser($data);
        }
        return view('admin.userList')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('user', $users);
    }

    public function addUser() {
        $this->pageheader = 'Users';
        $permissions = Permissions::GetAllPermissions();
        return view('admin.addUser')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('permissions', $permissions);
    }

    public function insertUser(UsersRequest $request) {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'userRole' => $request->userRole,
            'userPhone' => $request->userPhone,
            'password' => bcrypt($request->password),
            'profileImg' => $request->profileImg
        );
        $file = Input::file('profileImg');
        $result = $this->fileUpload($file);
        if ($result != '') {
            $data['profileImg'] = $result;
        }
        $message = "User Added Successfully";
        UserModel::SaveUser($data);
        \Session::flash('message', $message);
        return redirect()->route('addUser');
    }

    public function deleteUser($userId) {
        $data = array(
            'id' => $userId
        );
        UserModel::DeleteUser($data);
        $message = "User Deleted Successfully";
        \Session::flash('message', $message);
        return redirect()->route('userList');
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
