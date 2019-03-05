<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NavigationModel;
use App\PostsModel;
use App\UserModel;

class ErrorController extends Controller {

    public $pageCode = 'home';
    public $settings;

    public function __construct() {
        $this->settings = productImagePath($this->pageCode);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagenotfound() {
        $data = array(
            'pageCode' => $this->pageCode
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        return view('pagenotfound')->with('pageSettings', $pageSettings)->with('settings', $this->settings);
    }

}
