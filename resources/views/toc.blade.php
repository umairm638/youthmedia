@extends('layouts.app')

@section('content')
<?php
$pageTitle = $pageSettings->pageTitle != '' ? $pageSettings->pageTitle : 'Terms And Conditions';
$toc = $pageSettings->toc != '' ? $pageSettings->toc : '';
?>
<!-- Start Page Banner -->
<div class="page-banner-area-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="page-title">
                    <h1>{{$pageTitle}}</h1>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-breadcrumb">
                    <p><a href="{{url('/')}}">home</a> / {{$pageTitle}}</p>
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
            <div class="col-sm-8 col-md-8">
                <!-- Start Video Post -->
                <div class="video-post-wrapper">
                    <div class="video-post-text">
                        {!!$toc!!}
                    </div>
                </div>
                <!-- End Video Post -->
            </div>
            <!-- Start Popular Videos -->
            <div class="col-md-offset-1 col-md-3 col-sm-4">
                @include('searchform')
                <!-- Start Popular Videos -->
                <div class="popular-videos">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fa fa-fire" aria-hidden="true"></i></span>
                        <h3>Popular Videos</h3>
                    </div>
                    <?php $counter = 0; ?>
                    @foreach ($mostLikedVid as $mostLikedVidRow)
                    @if ($mostLikedVidRow->postId != '' && $counter < 4)
                    <div class="single-video">
                        <div class="video-img">
                            <a href="{{url('video/'.base64_encode($mostLikedVidRow->postId))}}">
                                <?php $image = ''; ?>
                                @if ($mostLikedVidRow->postThumbnail)
                                <?php $image = asset('assets/images/posts') . '/' . $mostLikedVidRow->postThumbnail; ?>
                                @else
                                <?php $image = asset('frontend/images/thumbnails/6.jpg') ?>
                                @endif
                                <img width="320px" height="180px" class="lazy" data-src="{{$image}}" alt="{{$mostLikedVidRow->postTitle}}" />
                                <noscript>
                                <img width="320px" height="180px" src="{{$image}}" alt="{{$mostLikedVidRow->postTitle}}" />
                                </noscript>
                            </a>
                            <span class="video-duration">5.28</span>
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
                    <?php $counter++; ?>
                    @endif
                    @endforeach
                </div>
                <!-- End Popular Videos -->
                <!-- Start Sidebar Adds -->
                <div class="sidebar-adds">
                    <a href="#"><img alt="banner" src="{{ asset('frontend/images/banners/3.jpg') }}"></a>
                </div>
                <!-- End Sidebar Adds -->					
            </div>
        </div>
    </div>
</div>
<!-- End Page Content Area -->
@include('footerprize')
@endsection