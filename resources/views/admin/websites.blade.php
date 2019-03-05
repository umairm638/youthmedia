@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" onclick="location.href = '{{ URL::route('addWebsite') }}';">
            <span class="fa fa-plus"></span> Add Website
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($websites as $websitesRow)
                <tr id="website_row_{{ $websitesRow->websiteId }}">
                    <td>{{ $websitesRow->websiteName }}</td>
                    <td>{{ $websitesRow->websiteUrl }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="location.href = '{{url('editWebsite/')}}/{{ $websitesRow->websiteId }}';">Edit</a></li>
                                <li><a href="javascript:void(0)" onclick="deleteWebsite('{{ $websitesRow->websiteId }}')">Delete</a></li>
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
    $('#nav-website').addClass('active');
    });
</script>
@endsection
