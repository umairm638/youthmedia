<?php

namespace App\Http\Controllers;

use App\FaqModel;
use App\NavigationModel;
use App\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;

class PageController extends Controller {

	public $user;
	public $userName;
	public $userRoles;
	public $userImg;
	public $pageheader = 'Pages';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware(function ($request, $next) {
			$this->user = Auth::user();
			$this->userName = $this->user['attributes']['name'];
			$this->userImg = $this->user['attributes']['profileImg'];
			$this->userRoles = Permissions::GetUserRole($this->user['attributes']['userRole']);
			if ($this->userRoles[0]->pages != 1) {
				Redirect::to('admin')->send();
			}
			return $next($request);
		});
	}

	public function index() {
		$navigation = NavigationModel::GetNavigation();
		return view('admin.pages')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('navigation', $navigation);
	}

	public function editPage($pageId = 0) {
		if ($pageId != 0) {
			$data = array(
				'navId' => $pageId,
			);
			$faqs = '';
			$page = NavigationModel::GetSinglePage($data);
			$pageSettings = json_decode($page[0]->pageSettings);

			if ($page[0]->pageCode == 'faq') {
				$faqs = FaqModel::GetFaq();
			}
			$this->pageheader = $page[0]->pageName . ' Page Settings';
			$view = 'admin.' . $page[0]->pageCode . 'PageSettings';
			return view($view)->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
				->with('userRoles', $this->userRoles)->with('page', $page)->with('pageSettings', $pageSettings)->with('faqs', $faqs);
		}
	}

	public function setPageSettings(Request $request) {
		$pageData = '';
		if ($request->pageCode == 'faq') {
			$pageData = $this->faqSettings($request);
		} else if ($request->pageCode == 'home') {
			$pageData = $this->homeSettings($request);
		} else if ($request->pageCode == 'privacypolicy') {
			$pageData = $this->privacyPolicySettings($request);
		} else if ($request->pageCode == 'termsandconditions') {
			$pageData = $this->termsAndConditionsSettings($request);
		} else if ($request->pageCode == 'about') {
			$pageData = $this->missionStatementSettings($request);
		} else if ($request->pageCode == 'contact') {
			$pageData = $this->contactSettings($request);
		} else if ($request->pageCode == 'prize') {
			$pageData = $this->prizeSettings($request);
		}
		if ($pageData != '') {
			$pageData['navId'] = $request->navId;
			$pageData['pageCode'] = $request->pageCode;
			$pageData['pageTitle'] = $request->pageTitle;
			$pageData['pageDescription'] = $request->pageDescription;
			$pageData['pageKeywords'] = $request->pageKeywords;
			// uploading page images
			$pageSettings = NavigationModel::GetSinglePage($pageData);
			NavigationModel::UpdatePage($pageData);
			\Session::flash('message', 'Settings Updated Successfully');
		}
		return redirect()->route('editPage', ['pageId' => $request->navId]);
	}

	public function contactSettings($request) {
		$pageData = array(
			'sendTo' => $request->sendTo,
			'locLong' => $request->locLong,
			'locLat' => $request->locLat,
		);
		$pageData['navId'] = $request->navId;
		return $pageData;
	}

	public function missionStatementSettings($request) {
		$pageData = array(
			'missionStatementText' => $request->missionStatementText,
		);
		return $pageData;
	}

	public function termsAndConditionsSettings($request) {
		$pageData = array(
			'toc' => $request->toc,
		);
		return $pageData;
	}

	public function homeSettings($request) {

	}

	public function prizeSettings($request) {
		$pageData = array(
			'prizeText' => $request->prizeText,
		);
		return $pageData;
	}

	public function privacyPolicySettings($request) {
		$pageData = array(
			'privacyText' => $request->privacyText,
		);
		return $pageData;
	}

	public function faqSettings($request) {
		$pageData = array(
			'headerText' => $request->headerText,
			'searchText' => $request->searchText,
		);
		$pageData['navId'] = $request->navId;
		return $pageData;
	}

	public function fileUpload($file, $uploadcount, $fileNameSet = '') {
		$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
		if ($fileNameSet == '') {
			$destinationPath = 'assets/images/pages';
		} else {
			$destinationPath = 'assets/documents';
		}
		$validator = Validator::make(array('file' => $file), $rules);
		if ($validator->passes()) {
			if ($fileNameSet != '') {
				$filename = $file->getClientOriginalName();
			} else {
				$filename = time() . $uploadcount . '.' . $file->getClientOriginalExtension();
			}
			$file->move($destinationPath, $filename);
			return $filename;
		} else {
			return '';
		}
	}

}
