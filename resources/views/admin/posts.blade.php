@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" onclick="location.href = '{{ URL::route('addPost') }}';">
            <span class="fa fa-plus"></span> Add Post
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding"style="overflow-x:auto !important;" >
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Post</th>
                    <th>Thumbnail</th>
                    <!--<th>Tags</th>-->
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $postRow)
                <tr id="post_row_{{ $postRow->postId }}">
                    <td>{{ $postRow->postTitle }}</td>
                    <td>{{ $postRow->categoryName }}</td>
                    <td>{!! $postRow->post !!}</td>
                    <td>
                        @if ($postRow->postThumbnail)
                        <img src="{{ asset('assets/images/posts') }}/{{ $postRow->postThumbnail }}" width="100" height="100">
                        @endif
                    </td>
                    <!--<td>{{ $postRow->postTags }}</td>-->
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="location.href = '{{url('editPost/')}}/{{ $postRow->postId }}';">Edit</a></li>
                                <li><a href="javascript:void(0)" onclick="deletePost('{{ $postRow->postId }}')">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ csrf_field() }}
<?php
$pageNavId = 'nav-post';
if(isset($pendingPosts)) {
    $pageNavId = 'nav-pending';
}
?>
<script>
    $(document).ready(function () {
    $(".sidebar-menu li").removeClass("active");
    $('#{{$pageNavId}}').addClass('active');
    });
</script>
@endsection
