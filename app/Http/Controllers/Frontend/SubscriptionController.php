<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\SubscriptionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mail;

class SubscriptionController extends Controller {

	public function __construct() {

	}

	public function index(SubscriptionRequest $request) {
		$userId = 4;
	     $userEmail = $request->email;
	    
		$auth = Auth::guard();
		if ($auth->check()) {
			$user = Auth::user();
			$userId = $user['attributes']['id'];
			$userEmail = $user['attributes']['email'];
		}
		$data = array(
			'subscriptionEmail' => $userEmail,
			'subscriptionUserId' => $userId,
		);
		$alreadySubscribe = SubscriptionModel::CheckSubscription($data);
		if (!$alreadySubscribe) {
			$message = 'Successfully Subscribed To Our Channel! Please Check Your Email.';
			SubscriptionModel::SaveSubscription($data);
		} else {
			$message = 'Already Subscribed To Our Channel!';
		}
		\Session::flash('message', $message);
		//send email to user
		$EmailSubject = "Subscription Request";
		$this->SendEmail($userEmail, $EmailSubject, 'emails.subscriptionApplicationEmail');
		return Redirect::back()->withErrors(['message', $message]);
	}

	public function SendEmail($EmailTo, $Subject, $body) {
		    
			$data = array('email' => $EmailTo, 'subject' => $Subject);
			$result = Mail::send($body, $data, function ($message) use ($data) {
				$message->from('bootrait1@gmail.com', 'Youth Screen');
				$message->to($data['email']);
				$message->replyTo('bootrait1@gmail.com', 'Youth Screen');
				$message->subject($data['subject']);
			});
		return $result;
		
	}

}
