@extends('layouts.app')

@section('content')

{{-- to share video on google+ --}}
<script src="https://apis.google.com/js/platform.js" async defer></script>


<!-- Start Page Banner -->
<div class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-banner">
                    <div class="page-title">
                        <h1>{{$post[0]->postTitle}}</h1>
                    </div>
                    <div class="page-breadcrumb">
                        <p><a href="{{url('/')}}">home </a> / Watch Video</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->
<!-- Start Page Content Area -->
<div class="page-content-area themeix-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Start Video Post -->
                <div id="detail-video-post" class="video-post-wrapper">
                    <div class="video-posts-video">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="{{$post[0]->post}}" class="embed-responsive-item"></iframe>
                        </div>
                    </div>
                    <div class="video-posts-data">
                        <div class="video-post-title">
                            <span class="video-icons"><i class="fa fa-info-circle"></i></span>
                            <div class="video-post-info">
                                <h4><a href="javascript:void(0);">{{$post[0]->postTitle}}</a></h4>
                                <div class="video-post-date">
                                    <span><i class="fa fa-calendar"></i></span>
                                    @if ($post[0]->createdOn != '')
                                    <p>{{date('F d, Y',$post[0]->createdOn)}}</p>
                                    @endif
                                    <span class="video-posts-author">
                                        <i class="fa fa-folder-o"></i>
                                        <a href="{{url('vidcategory/'.base64_encode($post[0]->categoryId))}}">{{$post[0]->categoryName}} Videos</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="video-post-counter">
                            <div class="video-post-viewers">
                                <h3>{{$post[0]->postViewed + 1}} views</h3>
                            </div>
                            <?php
$userId = 0;
if ($user = Auth::user()) {
	$userId = $user['attributes']['id'];
}
?>
                            <div <?php
if ($userId) {
	echo 'onclick="likeVideo(' . $userId . ', ' . $post[0]->postId . ')"';
}
?> class="video-like">
                                @if($userId && $userLike)
                                <span id="videoLikeSpan" title="Like This Video"><i class="fa fa-thumbs-o-up"></i></span>
                                @else
                                <span id="videoLikeSpan" title="Like This Video" style='color: #666666 !important;'><i class="fa fa-thumbs-o-up"></i></span>
                                @endif
                                <p id="vidTotalLikes">{{$totalLikes}}</p>
                            </div>
                            <div <?php
if ($userId) {
	echo 'onclick="unlikeVideo(' . $userId . ', ' . $post[0]->postId . ')"';
}
?> class="video-dislike">
                                @if($userId && $userUnLike)
                                <span id="videoUnlikeSpan" title="Unlike This Video"><i class="fa fa-thumbs-o-down"></i></span>
                                @else
                                <span id="videoUnlikeSpan" title="Unlike This Video" style='color: #666666 !important;'><i class="fa fa-thumbs-o-down"></i></span>
                                @endif
                                <p id="vidTotalUnLikes">{{$totalUnLikes}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="video-post-text">
                        {{$post[0]->postDescription}}
                    </div>
                    <!-- Start Tags And Share Options -->
                    <div class="tags-and-share video-share">
                        <div class="post-tags widget">
                            <ul class="tagcloud">
                                @if($post[0]->postTags != '')
                                <?php
$postTags = '';
$postTags = explode(',', $post[0]->postTags);
?>
                                @foreach ($postTags as $postTagsRow)
                                <li><a href="{{url('videoTag/'.base64_encode($postTagsRow))}}">{{$postTagsRow}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="share-options">
                            <h4>Share On</h4>
                           @php
                            $videoWebsiteLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            @endphp
                          <ul class="social-share">
                           <li class="twitter-bg"><a target="_blank" href="http://twitter.com/share?text={{$post[0]->postTitle}}&url={{$videoWebsiteLink}}">
                              <i class="fa fa-twitter"></i></a>
                           </li>
                           <li class="facebook-bg"><a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('{{$videoWebsiteLink}}'),'facebook-share-dialog','width=626,height=436'); return false;"><i class="fa fa-facebook" ></i></a></li>
                           <li class="google-bg"><a
                              href="https://plus.google.com/share?text={{$post[0]->postTitle}}&url={{$videoWebsiteLink}}">
                              <i class="fa fa-google-plus"></i></a>
                           </li>
                        </ul>
                        </div>
                    </div>
                    <!-- End Tags And Share Options -->
                    <!-- Start Comments -->
                    <div class="video-posts-comments">
                        <!-- Single Comment -->
                        <div id="comments">
                            <div class="themeix-section-h">
                                <span class="heading-icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                                <h3>{{$commentsCount}} comments</h3>
                            </div>
                            <ul class="comments-list">
                                @foreach ($comments as $commentsRow)
                                @if($commentsRow->parent == 0)
                                <li>
                                    <div class="comment">
                                        @if($commentsRow->profileImg!='')
                                        <div class="comment-pic"><img src="{{ asset('assets/images/users') }}/{{$commentsRow->profileImg}}" alt="Profile Image Not Found"></div>
                                        @else
                                            <div class="comment-pic"><img src="{{ asset('assets/images/useravator.jpg') }}" alt="Update Profile Pic"></div>
                                        @endif 
                                        <div class="comment-text">
                                            <h5>
                                                <a href="javascript:void(0);">
                                                    <span id="parentName-{{$commentsRow->commentId}}">{{$commentsRow->name}}</span>
                                                </a>
                                            </h5>
                                            <span class="comment-date">Posted on {{date('F d, Y', strtotime($commentsRow->createdAt))}}</span>
                                            <p>{{$commentsRow->commentText}}</p>
                                            <a onclick="setCommentParent({{ $commentsRow->commentId }});" href="javascript:void(0);" class="comment-reply">Reply</a>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li class="children">
                                    <div class="comment">
                                        <div class="comment-pic"><img src="{{ asset('assets/images/users') }}/{{$commentsRow->profileImg}}" alt="comment"></div>
                                        <div class="comment-text">
                                            <h5>
                                                <a href="javascript:void(0);">{{$commentsRow->name}}</a>
                                            </h5>
                                            <span class="comment-date">Posted on {{date('F d, Y', strtotime($commentsRow->createdAt))}}</span>
                                            <p>{{$commentsRow->commentText}}</p>
                                            <a onclick="setCommentParent({{ $commentsRow->parent }});" href="javascript:void(0);" class="comment-reply">Reply</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Comment -->
                        <!-- Leave a Comment -->
                        <div id="respond">
                            <div class="comment-respond">
                                <div class="contact-form">
                                    <div class="themeix-section-h">
                                        <span class="heading-icon"><i class="fa fa-commenting-o" aria-hidden="true"></i></span>
                                        <h3>Leave a comment</h3>
                                        <p id="replyToPara" class="alert alert-success comment-replyto-margin hide">
                                            <em>Replying To <span id="parentUser"></span></em>
                                            <a onclick="cancelReplyComment();" href="javascript:void(0);" class="cancel-comment-reply">
                                                <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                            </a>
                                        </p>
                                    </div>
                                    <?php
$name = '';
$email = '';
$auth = Auth::guard();
if ($auth->check()) {
	$user = Auth::user();
	$name = $user['attributes']['name'];
	$email = $user['attributes']['email'];
}
?>
                                    <form class="comments-form" action="{{ URL::route('postComment') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="postId" value="{{$post[0]->postId}}">
                                        <input type="hidden" name="parent" id="parent" value="0">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input readonly="" class="form-control" name="name" placeholder="Name *" type="text" required value="{{$name}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input readonly="" class="form-control" name="email" placeholder="Email *" type="email" required value="{{$email}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" name="website" placeholder="Website" type="text" value="{{ old('website') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea rows="5" class="form-control" name="comment" placeholder="Comment *" required>{{ old('comment') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                @if(!$auth->check())
                                                Login To Post Comment
                                                @else
                                                <button type="submit" class="themeix-btn-danger text-uppercase">post comment</button>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Leave a Comment -->
                    </div>
                    <!-- End Comments -->
                </div>
                <!-- End Video Post -->
            </div>
            <!-- Start Sidebar -->
            <div class="col-md-offset-1 col-md-3">
                <!-- Start Popular Videos -->
                <div class="popular-videos">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fa fa-fire" aria-hidden="true"></i></span>
                        <h3>Popular Videos</h3>
                    </div>
                    <?php $counter = 0;?>
                    @foreach ($mostLikedVid as $mostLikedVidRow)
                    @if ($mostLikedVidRow->postId != '' && $counter < 5)
                    <div class="single-video">
                        <div class="video-img">
                            <a href="{{url('video/'.base64_encode($mostLikedVidRow->postId))}}">
                                <?php $image = '';?>
                                @if ($mostLikedVidRow->postThumbnail)
                                <?php $image = asset('assets/images/posts') . '/' . $mostLikedVidRow->postThumbnail;?>
                                @else
                                <?php $image = asset('frontend/images/thumbnails/6.jpg')?>
                                @endif
                                <img width="320px" height="180px" class="lazy" data-src="{{$image}}" alt="{{$mostLikedVidRow->postTitle}}" />
                                <noscript>
                                <img width="320px" height="180px" src="{{$image}}" alt="{{$mostLikedVidRow->postTitle}}" />
                                </noscript>
                            </a>
                        </div>
                        <div class="video-content">
                            <h4>
                                <a href="{{url('video/'.base64_encode($mostLikedVidRow->postId))}}" class="video-title">
                                    {{(strlen($mostLikedVidRow->postTitle) > 55) ? substr($mostLikedVidRow->postTitle, 0, 55) . ' ...' : $mostLikedVidRow->postTitle}}
                                </a>
                            </h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>{{$mostLikedVidRow->postViewed}}</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-up like-icon"></span>
                                        <span>{{App\PostsModel::GetPostLikes(array('postId' => $mostLikedVidRow->postId))}}</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-down dislike-icon"></span>
                                        <span>{{App\PostsModel::GetPostUnLikes(array('postId' => $mostLikedVidRow->postId))}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++;?>
                    @endif
                    @endforeach
                    <!-- Start Sidebar Adds -->
                    <div class="sidebar-adds">
                        <a href="#"><img alt="banner" src="{{ asset('frontend/images/banners/3.jpg') }}"></a>
                    </div>
                    <!-- End Sidebar Adds -->
                </div>
                <!-- Start Recent Videos -->
                <div class="popular-videos">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fa fa-play" aria-hidden="true"></i></span>
                        <h3>Recent Uploaded</h3>
                    </div>
                    <?php $counter = 0;?>
                    @foreach ($recentUpload as $recentUploadRow)
                    @if ($counter < 3)
                    <div class="single-video">
                        <div class="video-img">
                            <a href="{{url('video/'.base64_encode($recentUploadRow->postId))}}">
                                <?php $image = '';?>
                                @if ($recentUploadRow->postThumbnail)
                                <?php $image = asset('assets/images/posts') . '/' . $recentUploadRow->postThumbnail;?>
                                @else
                                <?php $image = asset('frontend/images/thumbnails/6.jpg')?>
                                @endif
                                <img width="320px" height="180px" class="lazy" data-src="{{$image}}" alt="{{$recentUploadRow->postTitle}}" />
                                <noscript>
                                <img width="320px" height="180px" src="{{$image}}" alt="{{$recentUploadRow->postTitle}}" />
                                </noscript>
                            </a>
                        </div>
                        <div class="video-content">
                            <h4><a href="{{url('video/'.base64_encode($recentUploadRow->postId))}}" class="video-title">{{$recentUploadRow->postTitle}} </a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>{{$recentUploadRow->postViewed}}</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-up like-icon"></span>
                                        <span>{{App\PostsModel::GetPostLikes(array('postId' => $recentUploadRow->postId))}}</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-down dislike-icon"></span>
                                        <span>{{App\PostsModel::GetPostUnLikes(array('postId' => $recentUploadRow->postId))}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++;?>
                    @endif
                    @endforeach
                </div>
                <!-- End Recent Videos -->
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</div>
<!-- End Page Content Area -->
<!-- Start Video Carousel -->
<div class="video-carousel-area themeix-ptb bg-semi-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="themeix-section-h">
                    <span class="heading-icon"><i class="fa fa-copy"></i></span>
                    <h3>Users Uploaded</h3>
                </div>
                <div class="video-carousel">
                    @foreach ($userUpload as $userUploadRow)
                    <div class="single-video">
                        <div class="video-img">
                            <a href="{{url('video/'.base64_encode($userUploadRow->postId))}}">
                                @if ($userUploadRow->postThumbnail)
                                <?php $image = asset('assets/images/posts') . '/' . $userUploadRow->postThumbnail;?>
                                @else
                                <?php $image = asset('frontend/images/thumbnails/41.jpg');?>
                                @endif
                                <img width="320px" height="180px" class="lazy" data-src="{{ $image }}" alt="{{$userUploadRow->postTitle}}" />
                                <noscript>
                                <img width="320px" height="180px" src="{{ $image }}" alt="{{$userUploadRow->postTitle}}" />
                                </noscript>
                            </a>
                        </div>
                        <div class="video-content">
                            <h4><a href="{{url('video/'.base64_encode($userUploadRow->postId))}}" class="video-title">{{$userUploadRow->postTitle}}</a></h4>
                            <div class="video-counter">
                                <div class="video-viewers">
                                    <span class="fa fa-eye view-icon"></span>
                                    <span>{{$userUploadRow->postViewed}}</span>
                                </div>
                                <div class="video-feedback">
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-up like-icon"></span>
                                        <span>{{App\PostsModel::GetPostLikes(array('postId' => $userUploadRow->postId))}}</span>
                                    </div>
                                    <div class="video-like-counter">
                                        <span class="fa fa-thumbs-o-down dislike-icon"></span>
                                        <span>{{App\PostsModel::GetPostUnLikes(array('postId' => $userUploadRow->postId))}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.fbAsyncInit = function() {
    FB.init({
    appId: '1849371805390659',
            xfbml: true,
            version: 'v2.10'
    });
    FB.AppEvents.logPageView();
    };
    (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return; }
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function shareFunction(postId) {
    FB.ui({
    method: 'share',
            mobile_iframe: true,
            //href: '{{url("video/")}}' + postId,
            href: '{{$videoWebsiteLink}}',
    }, function (response) {});
    }
</script>
<!-- End Video Carousel -->
@include('footerprize')
{{ csrf_field() }}
@endsection