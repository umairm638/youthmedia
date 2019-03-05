<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\CommentModel;
use App\PostsModel;
use App\UserModel;
use App\Http\Requests\CommentRequest;
use Mail;

class CommentsController extends Controller {

    public function __construct() {
        
    }

    public function postComment(CommentRequest $request) {
        $user = Auth::user();
        $userId = $user['attributes']['id'];
        $data = array(
            'userId' => $userId,
            'postId' => $request->postId,
            'parent' => $request->parent,
            'commentText' => $request->comment,
            'website' => $request->website,
            'createdAt' => date("Y-m-d")
        );
        $message = 'Comment Added!';
        CommentModel::SaveComment($data);

        //send email to user
        $post = PostsModel::GetSinglePostDetail($data);
        if ($post[0]->userId != $userId) {
            $userData = array('id' => $userId);
            $user = UserModel::GetSingleUser($userData);
            if ($user[0]->email != '') {
                $EmailSubject = "New Comment Received!";
                $videoData = array(
                    'title' => $post[0]->postTitle,
                    'url' => url('video/'.base64_encode($post[0]->postId))
                );
                $this->SendEmail($user[0]->email, $EmailSubject, 'emails.commentEmail', $videoData);
            }
        }
        \Session::flash('message', $message);
        return Redirect::back()->withErrors(['message', $message]);
    }

    public function SendEmail($EmailTo, $Subject, $body, $data) {
        try{
             $data = array('data' => $data, 'email' => $EmailTo, 'subject' => $Subject);
            $result = Mail::send($body, $data, function ($message) use ($data) {
                    $message->from('umair.malik@purelogics.net', 'Youth Media');
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                });
        return $result;
             }
        catch(\Exception $e)
        {
            $message= "Something Went Wrong";
        \Session::flash('message', $message); 
        return Redirect::back()->withErrors(['message', $message]);
        }
       
    }

}
