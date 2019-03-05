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
use App\Permissions;
use Illuminate\Support\Facades\Redirect;

/**
 * Description of PermissionController
 *
 * @author umair-malik
 */
class PermissionController extends Controller {

    public $user;
    public $userName;
    public $userRoles;
    public $userImg;
    public $pageheader = 'Permissions';

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->userName = $this->user['attributes']['name'];
            $this->userImg = $this->user['attributes']['profileImg'];
            $this->userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
            if ($this->userRoles[0]->permissions != 1) {
                Redirect::to('admin')->send();
            }
            return $next($request);
        });
    }

    public function index() {
        $permissions = Permissions::GetAllPermissions();
        return view('admin.permissions')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('permissions', $permissions);
    }

    public function setModulePermissions(Request $request) {
        $arrayData = array(
            'dashboard' => $request->dashboard,
            'users' => $request->users,
            'pages' => $request->pages,
            'websites' => $request->websites,
            'categories' => $request->categories,
            'posts' => $request->posts,
            'pending' => $request->pending,
            'subscription' => $request->subscription,
            'permissions' => $request->permissions
        );
        //clear old roles values
        Permissions::ClearValuesModules();
        foreach ($arrayData as $key => $value) {
            if (count($value) > 0) {
                Permissions::SetPermissions($value, $key);
            }
        }
        \Session::flash('message', 'Permissions Updated Successfully');
        return redirect()->route('permissions');
    }

    public function manageRoles() {
        $permissions = Permissions::GetAllPermissions();
        return view('admin.roles')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('permissions', $permissions);
    }

    public function saveRole(Request $request) {
        $data = array(
            'name' => $request->roleName
        );
        $id = Permissions::SaveRole($data);
        \Session::flash('message', 'Role Added Successfully');
        return redirect()->route('manageRoles');
    }

    public function deleteRole($roleId) {
        $data = array(
            'roleId' => $roleId
        );
        Permissions::DeleteRole($data);
        \Session::flash('message', 'Role Deleted Successfully');
        return redirect()->route('manageRoles');
    }

    public function getRole(Request $request) {
        $result = Permissions::GetUserRole($request->roleId);
        if ($request->ajax()) {
            return response()->json([
                        'result' => $result
            ]);
        }
    }

    public function updateRole(Request $request) {
        $data = array(
            'roleId' => $request->editRoleId,
            'name' => $request->editRoleName
        );
        $message = "Role Updated Successfully";
        Permissions::UpdateRole($data);
        \Session::flash('message', $message);
        return redirect()->route('manageRoles');
    }

}
