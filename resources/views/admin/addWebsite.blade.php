@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add Website
    </div>
    @include('admin.layouts.errorView')
    <?php
    if ($website != '') {
        $websiteId = $website[0]->websiteId;
        $websiteName = $website[0]->websiteName;
        $websiteUrl = $website[0]->websiteUrl;
    } else {
        $websiteId = 'add';
        $websiteName = '';
        $websiteUrl = '';
    }
    ?>
    <div class="card-body">
        <form id="addWebsiteForm" class="form form-horizontal" method="POST" action="{{ URL::route('insertWebsite') }}">
            {{ csrf_field() }}
            <input type="hidden" name="websiteId" id="websiteId" value="{{ $websiteId }}">
            <div class="section">
                <div class="section-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Website Name *</label>
                        <div class="col-md-9">
                            <input required="" type="text" id="websiteName" name="websiteName" class="form-control" value="{{ $websiteName }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Website URL *</label>
                        <div class="col-md-9">
                            <input required="" type="text" id="websiteUrl" name="websiteUrl" class="form-control" value="{{ $websiteUrl }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" onclick="location.href = '{{ URL::route('websites') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-website').addClass('active');
    });
</script>
@endsection
