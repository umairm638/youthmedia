<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LikesSharesModel;

class PostsLikesController extends Controller {

    public function __construct() {
        
    }

    public function updateVideoLikes(Request $request) {
        $data = array(
            'postId' => $request->postId,
            'userId' => $request->userId
        );
        $alreadyLike = LikesSharesModel::CheckVideoLike($data);
        if (!$alreadyLike) {
            LikesSharesModel::DeleteVideoLikeUnlike($data);
            LikesSharesModel::SaveVideoLikes($data);
        }
        if ($request->ajax()) {
            return response()->json([
                        'alreadyLike' => $alreadyLike
            ]);
        }
    }

    public function updateVideoUnLikes(Request $request) {
        $data = array(
            'postId' => $request->postId,
            'userId' => $request->userId
        );
        $alreadyUnLike = LikesSharesModel::CheckVideoUnLike($data);
        if (!$alreadyUnLike) {
            LikesSharesModel::DeleteVideoLikeUnlike($data);
            LikesSharesModel::SaveVideoUnLikes($data);
        }
        if ($request->ajax()) {
            return response()->json([
                        'alreadyUnLike' => $alreadyUnLike
            ]);
        }
    }

}
