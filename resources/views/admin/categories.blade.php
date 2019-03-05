@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" onclick="location.href = '{{ URL::route('addCategory') }}';">
            <span class="fa fa-plus"></span> Add Category
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categoriesRow)
                <tr id="category_row_{{ $categoriesRow->categoryId }}">
                    <td>{{ $categoriesRow->categoryName }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="location.href = '{{url('editCategory/')}}/{{ $categoriesRow->categoryId }}';">Edit</a></li>
                                <li><a href="javascript:void(0)" onclick="deleteCategory('{{ $categoriesRow->categoryId }}')">Delete</a></li>
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
<script>
    $(document).ready(function () {
    $(".sidebar-menu li").removeClass("active");
    $('#nav-category').addClass('active');
    });
</script>
@endsection
