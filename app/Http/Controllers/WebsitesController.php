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
use App\Http\Requests\WebsiteRequest;

/**
 * Description of WebsitesController
 *
 * @author umair-malik
 */
class WebsitesController extends Controller {

    public $user;
    public $userName;
    public $userRoles;
    public $userImg;
    public $pageheader = 'Websites';

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
        $websites = WebsitesModel::GetAllWebsites();
        return view('admin.websites')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('websites', $websites);
    }

    public function addWebsite() {
        $website = '';
        return view('admin.addWebsite')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('website', $website);
    }

    public function getWebsite($websiteId) {
        $data = array(
            'websiteId' => $websiteId
        );
        $website = WebsitesModel::GetSingleWebsite($data);
        return view('admin.addWebsite')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
                        ->with('userRoles', $this->userRoles)->with('website', $website);
    }

    public function insertWebsite(WebsiteRequest $request) {
        $data = array(
            'websiteId' => $request->websiteId,
            'websiteName' => $request->websiteName,
            'websiteUrl' => $request->websiteUrl
        );
        if ($request->websiteId == 'add') {
            $message = "Website Added Successfully";
            WebsitesModel::SaveWebsite($data);
        } else {
            $message = "Website Updated Successfully";
            WebsitesModel::UpdateWebsite($data);
        }
        \Session::flash('message', $message);
        return redirect()->route('websites');
    }

    public function deleteWebsite(Request $request) {
        WebsitesModel::DeleteWebsite($request->websiteId);
        if ($request->ajax()) {
            return response()->json([
                        'status' => 1, 'message' => 'Website Deleted'
            ]);
        }
    }

}
