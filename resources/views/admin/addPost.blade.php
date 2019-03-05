@extends('admin.layouts.app')

@section('content')
@include('admin.tinymceSettings')
<link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap-tagsinput.css') ?>">
<style>
    .bootstrap-tagsinput{
        width: 100% !important;
    }
</style>
<div class="card">
    <div class="card-header">
        Add Post
    </div>
    @include('admin.layouts.errorView')
    <?php
    if ($post != '') {
        $postId = $post[0]->postId;
        $postTitle = $post[0]->postTitle;
        $postDescription = $post[0]->postDescription;
        $websiteId = $post[0]->websiteId;
        $categoryId = $post[0]->categoryId;
        $postText = $post[0]->post;
        $postTags = $post[0]->postTags;
        $postStatus = $post[0]->postStatus;
        $postThumbnail = $post[0]->postThumbnail;
        $isScrapped = $post[0]->isScrapped;
    } else {
        $postId = 'add';
        $postTitle = '';
        $postDescription = '';
        $websiteId = '';
        $categoryId = '';
        $postText = '';
        $postTags = '';
        $postStatus = 1;
        $postThumbnail = '';
        $isScrapped = 0;
    }
    ?>
    <div class="card-body">
        <form enctype="multipart/form-data" id="addPostForm" class="form form-horizontal" method="POST" action="{{ URL::route('insertPost') }}">
            {{ csrf_field() }}
            <input type="hidden" name="postId" id="postId" value="{{ $postId }}">
            <div class="section">
                <div class="section-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Title *</label>
                        <div class="col-md-9">
                            <input required="" type="text" class="form-control" name="postTitle" id="postTitle" value="{{ $postTitle }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="postDescription" id="postDescription">{{ $postDescription }}</textarea>
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Website *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select required="" id="websiteId" name="websiteId" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    @foreach ($websites as $websitesRow)
                                    <option @if ($websiteId == $websitesRow->websiteId) selected="selected" @endif value="{{ $websitesRow->websiteId }}">{{ $websitesRow->websiteName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select required="" id="categoryId" name="categoryId" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    @foreach ($categories as $categoriesRow)
                                    <option @if ($categoryId == $categoriesRow->categoryId) selected="selected" @endif value="{{ $categoriesRow->categoryId }}">{{ $categoriesRow->categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Post (Or Upload Video From Below)*</label>
                        <div class="col-md-9">
                            <textarea required="" class="form-control" name="post" id="post">{{ $postText }}</textarea>
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Upload Video</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="uploadVideo" id="uploadVideo">
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Tags</label>
                        <div class="col-md-9">
                            <input data-role="tagsinput" type="text" id="postTags" name="postTags" class="form-control" value="{{ $postTags }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postStatus" class="col-md-3 control-label">Post Status</label>
                        <div class="col-md-9">
                            <div class="checkbox">
                                <input @if ($postStatus) checked="checked" @endif id="postStatus" name="postStatus" value="1" type="checkbox">
                                        <label for="postStatus">
                                    &nbsp;
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Thumbnail Image</label>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="postThumbnail" id="postThumbnail">
                        </div>
                        @if ($postThumbnail != '')
                        <div class="col-md-offset-3 col-md-6">
                            <img src="{{ asset('assets/images/posts') }}/{{ $postThumbnail }}" alt="Image Not Found" width="100" height="80"> 
                        </div>
                        @elseif($postThumbnail == '' && $websiteId == 3 && $postId != 'add' && $isScrapped == 0 && $postText != '')
                        <?php
                        $videoId = explode('embed/', $postText);
                        ?>
                        @if (isset($videoId[1]) && $videoId[1] != '')
                        <button type="button" class="btn btn-success" onclick="window.location = '{{url('createThumb')}}/{{$postId}}/{{$videoId[1]}}';">
                            <span class="fa fa-plus"></span> Create Thumbnail
                        </button>
                        @endif
                        @endif
                    </div>
                    @if($postId != 'add' && $postText != '')
                    <div class="form-group margin-top-class">
                        <label class="col-md-3 control-label">Preview</label>
                        <div class="col-md-9">
                            <iframe width="560" height="315" src="{{$postText}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" onclick="location.href = '{{ URL::route('posts') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo asset('js/bootstrap-tagsinput.min.js') ?>" type="text/javascript"></script>
<script>
                            $(document).ready(function () {
                            $(".sidebar-menu li").removeClass("active");
                            $('#nav-post').addClass('active');
                            });
</script>
@endsection
