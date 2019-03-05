@extends('admin.layouts.app')

@section('content')
@include('admin.tinymceSettings')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<?php
$webTitle = '';
$googleAnalytics = '';
$googleAnalyticsAdditional = '';
$fbAnalytics = '';
$otherSeo = '';
$otherAnalyticsHead = '';
$otherAnalyticsBody = '';
$aboutUs = '';
$contactAddress = '';
$contactPhoneOne = '';
$contactPhoneTwo = '';
$contactEmail = '';
if (count($generalSettings) > 0) {
    $webTitle = $generalSettings[0]->webTitle;
    $googleAnalytics = $generalSettings[0]->googleAnalytics;
    $googleAnalyticsAdditional = $generalSettings[0]->googleAnalyticsAdditional;
    $fbAnalytics = $generalSettings[0]->fbAnalytics;
    $otherSeo = $generalSettings[0]->otherSeo;
    $otherAnalyticsHead = $generalSettings[0]->otherAnalyticsHead;
    $otherAnalyticsBody = $generalSettings[0]->otherAnalyticsBody;
    $aboutUs = $generalSettings[0]->aboutUs;
    $contactAddress = $generalSettings[0]->contactAddress;
    $contactPhoneOne = $generalSettings[0]->contactPhoneOne;
    $contactPhoneTwo = $generalSettings[0]->contactPhoneTwo;
    $contactEmail = $generalSettings[0]->contactEmail;
}
?>
<div class="card card-tab">
    <div class="card-header">
        <ul class="nav nav-tabs tabs-design">
            <li role="tab1" class="active">
                <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">General</a>
            </li>
            <li role="tab2">
                <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Footer</a>
            </li>
            <li role="tab4">
                <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Social Media</a>
            </li>
            <li role="tab6">
                <a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab">Analytics</a>
            </li>
        </ul>
    </div>
    <div class="card-body no-padding tab-content">
        @include('admin.layouts.errorView')
        <form enctype="multipart/form-data" id="generalSettings" class="form form-horizontal" method="POST" action="{{ URL::route('settings') }}">
            {{ csrf_field() }}
            <div role="tabpanel" class="tab-pane active no-padding" id="tab1">
                <div class="row margin-top-class">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Website Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="webTitle" name="webTitle" class="form-control" value="{{ $webTitle }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab2">
                <div class="row margin-top-class">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">About Us</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="aboutUs" id="aboutUs">{{ $aboutUs }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group margin-top-class">
                                    <label class="col-md-3 control-label">Contact Address</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contactAddress" name="contactAddress" class="form-control" value="{{ $contactAddress }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact Phone One</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contactPhoneOne" name="contactPhoneOne" class="form-control" value="{{ $contactPhoneOne }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact Phone Two</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contactPhoneTwo" name="contactPhoneTwo" class="form-control" value="{{ $contactPhoneTwo }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contact Email</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contactEmail" name="contactEmail" class="form-control" value="{{ $contactEmail }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab4">
                <div class="row margin-top-class">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="socialName" name="socialName" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="socialLink" name="socialLink" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Icon</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="socialIcon" id="socialIcon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table border='1' class="table table-striped primary" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Icon</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socialSettings as $socialSettingsRow)
                                <tr id="social_row_{{ $socialSettingsRow->socialId }}">
                                    <td>{{ $socialSettingsRow->socialName }}</td>
                                    <td>{{ $socialSettingsRow->socialLink }}</td>
                                    <td>
                                        @if ($socialSettingsRow->socialIcon != '')
                                        <div class="col-md-offset-3 col-md-6">
                                            <img src="<?php echo asset('assets/images/settings') ?>/{{ $socialSettingsRow->socialIcon }}" alt="Image Not Found" width="50" height="35"> 
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0)" onclick="editSocial('{{ $socialSettingsRow->socialId }}')">Edit</a></li>
                                                <li><a href="javascript:void(0)" onclick="deleteSocial('{{ $socialSettingsRow->socialId }}')">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab6">
                <div class="row margin-top-class">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="section">
                            <div class="section-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Google Analytics (Head)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="googleAnalytics" id="googleAnalytics">{{ $googleAnalytics }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Google Analytics (Body)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="googleAnalyticsAdditional" id="googleAnalyticsAdditional">{{ $googleAnalyticsAdditional }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group margin-top-class">
                                    <label class="col-md-3 control-label">Facebook Analytics (Head)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="fbAnalytics" id="fbAnalytics">{{ $fbAnalytics }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group margin-top-class">
                                    <label class="col-md-3 control-label">AdWords Conversion (Body)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="otherSeo" id="otherSeo">{{ $otherSeo }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group margin-top-class">
                                    <label class="col-md-3 control-label">Other Analytics Code (Head)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="otherAnalyticsHead" id="otherAnalyticsHead">{{ $otherAnalyticsHead }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group margin-top-class">
                                    <label class="col-md-3 control-label">Other Analytics Code (Body)</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control mceNoEditor" name="otherAnalyticsBody" id="otherAnalyticsBody">{{ $otherAnalyticsBody }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" onclick="location.href = '{{ URL::route('admin') }}';">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Social Modal -->
    <div class="modal fade" id="editSocialModel" role="dialog">
        <div style="width: 1000px;" class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Social</h4>
                </div>
                <div class="modal-body images-form">
                    <form enctype="multipart/form-data" id="editSocialForm" class="form form-horizontal" method="POST" action="{{ URL::route('updateSocial') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="socialIdModel" id="socialIdModel" value="add">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input required="" type="text" id="socialNameModel" name="socialNameModel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Link</label>
                            <div class="col-md-9">
                                <input required="" type="text" id="socialLinkModel" name="socialLinkModel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Icon</label>
                            <div class="col-md-9">
                                <input type="file" id="socialIconModel" name="socialIconModel" class="form-control">
                                <img src="<?php echo asset('assets/images/settings') ?>/" class="hide" id="socialIconImage" alt="Image Not Found" width="50" height="35"> 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button form="editSocialForm" id="save-social-btn" type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
                            $(document).ready(function () {
                            $(".sidebar-menu li").removeClass("active");
                            $('#nav-home').addClass('active');
                            });
</script>
@endsection
