@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add Category
    </div>
    @include('admin.layouts.errorView')
    <?php
    if ($category != '') {
        $categoryId = $category[0]->categoryId;
        $categoryName = $category[0]->categoryName;
    } else {
        $categoryId = 'add';
        $categoryName = '';
    }
    ?>
    <div class="card-body">
        <form id="addCategoryForm" class="form form-horizontal" method="POST" action="{{ URL::route('insertCategory') }}">
            {{ csrf_field() }}
            <input type="hidden" name="categoryId" id="categoryId" value="{{ $categoryId }}">
            <div class="section">
                <div class="section-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Name *</label>
                        <div class="col-md-9">
                            <input required="" type="text" id="categoryName" name="categoryName" class="form-control" value="{{ $categoryName }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" onclick="location.href = '{{ URL::route('categories') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-category').addClass('active');
    });
</script>
@endsection
