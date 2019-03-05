@extends('admin.layouts.app')

@section('content')
@include('admin.tinymceSettings')
<div class="card">
    <div class="card-header">
        FAQ
    </div>
    @include('admin.layouts.errorView')
    <?php
    if ($faq != '') {
        $faqId = $faq[0]->faqId;
        $faqQuestion = $faq[0]->faqQuestion;
        $faqAnswer = $faq[0]->faqAnswer;
    } else {
        $faqId = 'add';
        $faqQuestion = '';
        $faqAnswer = '';
    }
    ?>
    <div class="card-body">
        <div class="modal-body">
            <form id="faqAddForm" class="form form-horizontal" method="POST" action="{{ URL::route('addFaq') }}">
                {{ csrf_field() }}
                <input type="hidden" name="navId" value="{{ $navId }}">
                <input type="hidden" name="faqId" id="faqId" value="{{ $faqId }}">
                <div class="form-group">
                    <label class="col-md-3 control-label">Question</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="faqQuestion" id="faqQuestion">{{ $faqQuestion }}</textarea>
                    </div>
                </div>
                <div class="form-group margin-top-class">
                    <label class="col-md-3 control-label">Answer</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="faqAnswer" id="faqAnswer">{{ $faqAnswer }}</textarea>
                    </div>
                </div>
                <div class="form-footer margin-top-class">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default" onclick="location.href = '{{url('editPage/')}}/{{$navId}}';">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".sidebar-menu li").removeClass("active");
        $('#nav-pages').addClass('active');
    });
</script>
@endsection
