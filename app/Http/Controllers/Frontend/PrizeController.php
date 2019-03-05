<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NavigationModel;
use App\PostsModel;

class PrizeController extends Controller {

    public $pageCode = 'prize';
    public $settings;

    public function __construct() {
        $this->settings = productImagePath($this->pageCode);
    }

    public function index() {
        $data = array(
            'pageCode' => $this->pageCode
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageTitle = $page[0]->pageTitle;
        $pageSettings = json_decode($page[0]->pageSettings);
        $mostLikedVid = PostsModel::GetMostLikedPost();
        return view('prize')->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                ->with('pageTitle', $pageTitle)->with('mostLikedVid', $mostLikedVid);
    }

}
