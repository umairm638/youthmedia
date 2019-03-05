<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Permissions;
use App\SubscriptionModel;
use App\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mail;

/**
 * Description of SubscriptionController
 *
 * @author umair-malik
 */
class SubscriptionController extends Controller {

	public $user;
	public $userName;
	public $userRoles;
	public $userImg;
	public $pageheader = 'Subscription';

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

	public function index() {
		$users = SubscriptionModel::GetAllUser();
		return view('admin.subscriptionList')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('user', $users);
	}
	public function emailToSubscribers() {
		$users = SubscriptionModel::GetAllUser();
		return view('admin.emailToSubscribers')->with('pageheader', 'Send Email To Subscribers')->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('user', $users);
	}
	public function sendMailToSubscribers(Request $request)
	{
		  $emailContents =array(
			  'subject'=>$request->emailSubject,
			  'body'=>$request->emailBody
		  );
		  $subscribers_list = $request->subscribersList;
		  //$subscribers_list= 'rashid.bukhari78600@gmail.com';
			$this->SendEmail($subscribers_list,$emailContents, 'emails.sendEmailToAllSubscribers');
	
			$message= "Emails Send Successfully";
		 	 \Session::flash('message', $message);
		 	 return Redirect::back()->withErrors(['message', $message]);
		  
	}
	
    public function SendEmail($EmailTo,$emailContents,$body) {
		    try{
			$data = array('email' => $EmailTo, 'subject' => $emailContents['subject'], 'emailContents'=>$emailContents);
			$result = Mail::send($body, $data, function ($message) use ($data) {
				 $message->from('youthscreen786@gmail.com', 'Youth Screen');
				$message->to($data['email']);
				// $message->replyTo('umair.malik@purelogics.net', 'Youth Media');
				$message->subject($data['subject']);
			});
		return $result;
		    }
		 catch(\Exception $e)
        {
            $message= "Email Not Send To Subscribers";
        \Session::flash('error_message', $message); 
        return Redirect::back()->withErrors(['error_message', $message]);
        }
		
	}


	public function addSubscriber() {
		$subscriber = '';
		return view('admin.addSubscriber')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('subscriber', $subscriber);
	}

	public function deleteSubscriber($subscriptionId) {
		$data = array(
			'subscriptionId' => $subscriptionId,
		);
		SubscriptionModel::DeleteSubscription($data);
		$message = "Deleted Successfully";
		\Session::flash('message', $message);
		return redirect()->route('usersubscription');
	}

	public function insertSubscriber(SubscriptionRequest $request) {
		$data = array(
			'subscriptionId' => $request->subscriptionId,
			'subscriptionEmail' => $request->email,
			'subscriptionUserId' => 4,
		);
		$existingUser = UserModel::CheckUserByEmail($data);
		if ($existingUser > 0) {
			$user = UserModel::GetUserByEmail($data);
			$data['subscriptionUserId'] = $user[0]->id;
		}
		if ($request->subscriptionId == 'add') {
			$alreadySubscribe = SubscriptionModel::CheckSubscription($data);
			if (!$alreadySubscribe) {
				$message = 'Successfully Subscribed To Our Channel!';
				SubscriptionModel::SaveSubscription($data);
			} else {
				$message = 'Already Subscribed To Our Channel!';
			}
		} else {
			SubscriptionModel::UpdateSubscription($data);
			$message = 'Successfully Updated!';
		}
		\Session::flash('message', $message);
		return redirect()->route('usersubscription');
	}

	public function getSubscriber($subscriptionId) {
		$data = array(
			'subscriptionId' => $subscriptionId,
		);
		$subscriber = SubscriptionModel::GetSingleSubscriber($data);
		return view('admin.addSubscriber')->with('pageheader', $this->pageheader)->with('userName', $this->userName)->with('userImg', $this->userImg)
			->with('userRoles', $this->userRoles)->with('subscriber', $subscriber);
	}

}
