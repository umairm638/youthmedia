<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NavigationModel;
use App\PostsModel;
use App\CommentModel;
use App\LikesSharesModel;
use Auth;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller {

    public $pageCode = 'home';
    public $settings;

    public function __construct() {
        $this->settings = productImagePath($this->pageCode);
    }

    public function showAllVideos($videoType) {
        $data = array(
            'pageCode' => $this->pageCode
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        if ($videoType == 'recent-videos') {
            $recentUpload = DB::table('posts')->leftJoin('users', 'users.id', '=', 'posts.userId')->select('posts.*', 'users.userRole')
                            ->where('posts.postStatus', '=', 1)->where('users.userRole', '!=', 4)->orderBy('posts.createdOn', 'desc')->paginate(12);
            $bannerTitle = 'Recent Uploaded';
            return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                            ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
        } else if ($videoType == 'trending-videos') {
            $recentUpload = DB::table('posts')->select('posts.*')->where('posts.postStatus', '=', 1)->where('posts.postViewed', '>', 30)
                            ->orderBy('posts.createdOn', 'desc')->orderBy('posts.postViewed', 'desc')->paginate(12);
            $bannerTitle = 'Trending Videos';
            return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                            ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
        } else if ($videoType == 'popular-videos') {
            $recentUpload = DB::table('posts')->leftJoin('likes_shares', 'likes_shares.postId', '=', 'posts.postId')->select('posts.*', DB::raw('COUNT(`likes_shares`.`postId`) AS videoLikeCount'))
                            ->where('posts.postStatus', '=', 1)->where('likes_shares.liked', '=', 1)->groupBy('posts.postId')
                            ->orderBy('videoLikeCount', 'desc')->paginate(12);
            $bannerTitle = 'Popular Videos';
            return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                            ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
        } else {
            return redirect()->route('pagenotfound');
        }
    }

    public function video($postId) {
        $auth = Auth::guard();
        if ($auth->check()) {
            $user = Auth::user();
            $userId = $user['attributes']['id'];
        } else {
            $userId = 0;
        }
        $data = array(
            'pageCode' => $this->pageCode,
            'postId' => base64_decode($postId),
            'userId' => $userId
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $post = PostsModel::GetSinglePostDetail($data);
        $userUpload = PostsModel::GetAllUserUploadPost();
        $recentUpload = PostsModel::GetRecentUploadPost();
        $totalLikes = PostsModel::GetPostLikes($data);
        $totalUnLikes = PostsModel::GetPostUnLikes($data);
        $mostLikedVid = PostsModel::GetMostLikedPost();
        $comments = CommentModel::GetPostComments($data);
        $commentsCount = CommentModel::GetPostCommentsCount($data);
        $userUnLike = 0;
        $userLike = 0;
        if ($userId) {
            $userLike = LikesSharesModel::CheckVideoLike($data);
            if (!$userLike) {
                $userUnLike = LikesSharesModel::CheckVideoUnLike($data);
            }
        }
        if (count($post) > 0) {
            $image = '';
            if ($post[0]->postThumbnail && !$post[0]->isScrapped) {
                $image = asset('assets/images/posts') . '/' . $post[0]->postThumbnail;
            } elseif ($post[0]->postThumbnail) {
                $image = $post[0]->postThumbnail;
            } else {
                $image = asset('frontend/images/thumbnails/6.jpg');
            }
            $facebookSetting = array(
                'title' => $post[0]->postTitle,
                'url' => url("video") . '/' . $postId,
                'image' => $image
            );
            return view('detailvideo')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                            ->with('post', $post)->with('userUpload', $userUpload)->with('recentUpload', $recentUpload)->with('totalLikes', $totalLikes)
                            ->with('totalUnLikes', $totalUnLikes)->with('facebookSetting', $facebookSetting)->with('mostLikedVid', $mostLikedVid)
                            ->with('comments', $comments)->with('commentsCount', $commentsCount)->with('userLike', $userLike)
                            ->with('userUnLike', $userUnLike);
        } else {
            return redirect()->route('pagenotfound');
        }
    }

    public function showuservideos($userId) {
        $data = array(
            'pageCode' => $this->pageCode,
            'id' => base64_decode($userId)
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $userUpload = PostsModel::GetUserPosts($data);
        if (count($userUpload) > 0) {
            $recentUpload = $userUpload;
            $bannerTitle = $userUpload[0]->name;
            return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                            ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
        } else {
            return redirect()->route('pagenotfound');
        }
    }

    public function showtagvideos($tag) {
        $data = array(
            'pageCode' => $this->pageCode,
            'postTags' => base64_decode($tag)
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $recentUpload = PostsModel::GetPostsByTags($data);
        $bannerTitle = base64_decode($tag);
        return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                        ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
    }

    public function showcatvideos($catId) {
        $data = array(
            'pageCode' => $this->pageCode,
            'categoryId' => base64_decode($catId)
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $recentUpload = PostsModel::GetPostsByCategory($data);
        $bannerTitle = '';
        if (count($recentUpload) > 0) {
            $bannerTitle = $recentUpload[0]->categoryName;
        }
        return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                        ->with('recentUpload', $recentUpload)->with('bannerTitle', $bannerTitle);
    }

    public function updateVideoView(Request $request) {
        $data = array(
            'postId' => $request->postId,
            'postViewed' => $request->postViewed
        );
        PostsModel::UpdateVideoView($data);
    }

    public function deleteUserPost(Request $request) {
        $status = 0;
        $message = 'Something Went Wrong!';
        $auth = Auth::guard();
        if ($auth->check()) {
            $user = Auth::user();
            $userId = $user['attributes']['id'];
            $data = array(
                'userId' => $userId,
                'postId' => $request->postId
            );
            $postFound = PostsModel::CountSinglePostByUser($data);
            if ($postFound > 0) {
                PostsModel::DeletePost($request->postId);
                LikesSharesModel::DeleteVideoHistory($data);
                CommentModel::DeletePostAllComments($data);
                $status = 1;
                $message = 'Post Deleted!';
            }
        }
        if ($request->ajax()) {
            return response()->json([
                        'status' => $status, 'message' => $message
            ]);
        }
    }

    public function search(SearchRequest $request) {
        $data = array(
            'pageCode' => $this->pageCode,
            'search' => $request->search
        );
        $page = NavigationModel::GetPageSettings($data);
        $pageSettings = json_decode($page[0]->pageSettings);
        $bannerTitle = $request->search;
        $recentUpload = PostsModel::SearchVideos($data);
        return view('showallvideos')->with('pageSettings', $pageSettings)->with('settings', $this->settings)->with('pageSettings', $pageSettings)
                        ->with('bannerTitle', $bannerTitle)->with('recentUpload', $recentUpload);
    }

}
