<?php

namespace App\Http\Controllers;

use App\GeneralSettingsModel;
use App\Permissions;
use App\SocialSettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AdminHomeController extends Controller {

	public $user;
	public $userName;
	public $userRoles;
	public $userImg;
	public $pageheader = 'Dashboard';

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
			if ($this->userRoles[0]->dashboard != 1) {
				if ($this->userRoles[0]->users == 1) {
					Redirect::to('profile')->send();
				} else if ($this->userRoles[0]->permissions == 1) {
					Redirect::to('permissions')->send();
				} else {
					Redirect::to('/pagenotfound')->send();
				}
			}
			return $next($request);
		});
	}

	/**
	 * Show the application admin dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$generalSettings = GeneralSettingsModel::GetGeneralSettings();
		$socialSettings = SocialSettingsModel::GetSocialSettings();
		return view('admin.home')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('generalSettings', $generalSettings)->with('socialSettings', $socialSettings);
	}

	public function settings(Request $request) {
		//check if general settings are already added
		$generalSettings = GeneralSettingsModel::GetGeneralSettings();

		$generalData = array(
			'webTitle' => $request->webTitle,
			'googleAnalytics' => $request->googleAnalytics,
			'googleAnalyticsAdditional' => $request->googleAnalyticsAdditional,
			'fbAnalytics' => $request->fbAnalytics,
			'otherSeo' => $request->otherSeo,
			'otherAnalyticsHead' => $request->otherAnalyticsHead,
			'otherAnalyticsBody' => $request->otherAnalyticsBody,
			'aboutUs' => $request->aboutUs,
			'contactAddress' => $request->contactAddress,
			'contactPhoneOne' => $request->contactPhoneOne,
			'contactPhoneTwo' => $request->contactPhoneTwo,
			'contactEmail' => $request->contactEmail,
		);
		//social settings
		$socialSettings = SocialSettingsModel::GetSocialSettings();
		$socialData = array(
			'socialName' => $request->socialName,
			'socialLink' => $request->socialLink,
			'socialIcon' => '',
		);
		$uploadcount = 0;
		// uploading social icons images
		$file = Input::file('socialIcon');
		$result = $this->fileUpload($file, $uploadcount);
		if ($result != '') {
			$socialData['socialIcon'] = $result;
		} else {
			$socialData['socialIcon'] = $socialSettings[0]->socialIcon;
		}
		GeneralSettingsModel::SaveGeneralSettings($generalData);
		if ($socialData['socialName'] != '' && $socialData['socialLink'] != '') {
			SocialSettingsModel::SaveSocialSettings($socialData);
		}

		$message = "Settings Updated Successfully";
		\Session::flash('message', $message);
		return redirect()->route('admin');
	}

	public function fileUpload($file, $uploadcount) {
		$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
		$destinationPath = 'assets/images/settings';
		$validator = Validator::make(array('file' => $file), $rules);
		if ($validator->passes()) {
			$filename = time() . $uploadcount . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $filename);
			return $filename;
		} else {
			return '';
		}
	}

	public function deleteSocial(Request $request) {
		$data = array(
			'socialId' => $request->socialId,
		);
		$social = SocialSettingsModel::GetSingleSocial($data);
		SocialSettingsModel::DeleteSocial($request->socialId);
		$destinationPath = public_path('assets/images/settings/' . $social[0]->socialIcon);
		unlink($destinationPath);
		if ($request->ajax()) {
			return response()->json([
				'status' => 1, 'message' => 'Social Media Deleted',
			]);
		}
	}

	public function getSocial(Request $request) {
		$data = array(
			'socialId' => $request->socialId,
		);
		$social = SocialSettingsModel::GetSingleSocial($data);
		$social[0]->socialIcon = asset('assets/images/settings') . '/' . $social[0]->socialIcon;

		if ($request->ajax()) {
			return response()->json([
				'result' => $social,
			]);
		}
	}

	public function updateSocial(Request $request) {
		$data = array(
			'socialId' => $request->socialIdModel,
			'socialName' => $request->socialNameModel,
			'socialLink' => $request->socialLinkModel,
			'socialIcon' => '',
		);
		$social = SocialSettingsModel::GetSingleSocial($data);
		$uploadcount = 0;
		// uploading SplatterLeft images
		$file = Input::file('socialIconModel');
		$result = $this->fileUpload($file, $uploadcount);
		if ($result != '') {
			$data['socialIcon'] = $result;
			$destinationPath = public_path('assets/images/settings/' . $social[0]->socialIcon);
			unlink($destinationPath);
		} else {
			$data['socialIcon'] = $social[0]->socialIcon;
		}
		$message = "Social Details Updated Successfully";
		SocialSettingsModel::UpdateSocial($data);
		\Session::flash('message', $message);
		return redirect()->route('admin');
	}

}
