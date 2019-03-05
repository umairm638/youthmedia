@extends('layouts.app')

@section('content')
<?php $user = Auth::user(); ?>
<!-- Start Page Banner -->
<div class="page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-banner">
                    <div class="page-title">
                        <h1>{{$user['attributes']['name']}}</h1>
                    </div>
                    <div class="page-breadcrumb">
                        <p><a href="{{url('/')}}">home </a> / {{$user['attributes']['name']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Banner -->
<!-- Start Contact Page -->
<div class="contact-page-area themeix-ptb bg-info"> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="themeix-section-h">
                    <span class="heading-icon"><i class="fa fa-envelope"></i></span>
                    <h3>Profile Settings</h3>
                </div>
                <div class="row">
                    <div class="contact-form">
                        @include('admin.layouts.videoErrorView')
                        <form class="upload-form" enctype="multipart/form-data" method="POST" action="{{ URL::route('userSettings') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name *" required value="{{$user['attributes']['name']}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email *" readonly="" value="{{$user['attributes']['email']}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Leave Blank If Don't Want To Change">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="userPhone" id="userPhone" class="form-control" placeholder="Phone Number" required value="{{$user['attributes']['userPhone']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="userProfileImg" class="custom-file-upload">Profile Image
                                        <input type="file" name="userProfileImg" id="userProfileImg">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="themeix-btn-danger text-uppercase">Update Profile</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- Start Contact Page Video -->
            <div class="col-md-6">
                @if($user['attributes']['profileImg'] != '')
                <div class="contact-video">
                    <div>
                        <img class="lazy" data-src="{{ asset('assets/images/users') }}/{{$user['attributes']['profileImg']}}" alt="{{$user['attributes']['name']}}" />
                    </div>
                </div>
                @endif
            </div>
            <!-- End Contact Page Video -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bluehostix-title wow zoomIn animated">
                    <h3>Total Uploaded Videos: <span>{{$userOwnVideosCount}}</span></h3>
                    <span class="heading-border"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Page -->
<!-- Start Blog Posts -->
<div class="blog-posts-area themeix-ptb-3 bg-info">
    <div class="container">
        <div class="row">
            @foreach ($userOwnVideos as $userOwnVideosRow)
            <div class="col-sm-4" id="userPost-{{$userOwnVideosRow->postId}}">
                <div class="single-blog">
                    <div class="blog-img">
                        @if ($userOwnVideosRow->postThumbnail)
                        <?php $image = asset('assets/images/posts') . '/' . $userOwnVideosRow->postThumbnail; ?>
                        @else
                        <?php $image = asset('frontend/images/thumbnails/41.jpg'); ?>
                        @endif
                        <a href="{{url('video/'.base64_encode($userOwnVideosRow->postId))}}">
                            <img width="360px" height="201px" src="{{ $image }}" alt="{{$userOwnVideosRow->postTitle}}">
                        </a>
                    </div>
                    <h4>
                        <a class="blog-title" href="{{url('video/'.base64_encode($userOwnVideosRow->postId))}}">
                            {{$userOwnVideosRow->postTitle}}
                        </a>
                    </h4>
                    <div class="blog-text">
                        <p>{{$userOwnVideosRow->postDescription}}</p>
                        <a onclick="confirmDeletePost({{$userOwnVideosRow->postId}})" href="#delete-video" data-toggle="modal" class="read-more-btn">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Start Pagination -->
        <div class="posts-pagination">
            <ul class="pagination">
                @include('pagination', ['paginator' => $userOwnVideos])
            </ul>
        </div>
        <!-- End Pagination -->
    </div>
</div>
<!-- End Blog Posts -->
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
                    <?php $counter = 0; ?>
                    @foreach ($userUpload as $userUploadRow)
                    @if ($counter < 12)
                    <div class="single-video">
                        <div class="video-img">
                            <a href="{{url('video/'.base64_encode($userUploadRow->postId))}}">
                                @if ($userUploadRow->postThumbnail)
                                <?php $image = asset('assets/images/posts') . '/' . $userUploadRow->postThumbnail; ?>
                                @else
                                <?php $image = asset('frontend/images/thumbnails/41.jpg'); ?>
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
                    @endif
                    <?php $counter++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Video Carousel -->
@include('footerprize')
@endsection