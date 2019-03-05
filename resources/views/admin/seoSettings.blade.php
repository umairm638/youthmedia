<link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap-tagsinput.css') ?>">
<script src="<?php echo asset('js/bootstrap-tagsinput.min.js') ?>" type="text/javascript"></script>
<style>
    .bootstrap-tagsinput{
        width: 100% !important;
    }
</style>
<?php $classHide = ''; ?>
@if ($page[0]->pageCode == 'home' || $page[0]->pageCode == 'faq' || $page[0]->pageCode == 'privacypolicy' || $page[0]->pageCode == 'termsandconditions')
<?php $classHide = 'hide'; ?>
@endif
<div class="form-group {{ $classHide }}">
    <label class="col-md-3 control-label">Page Title</label>
    <div class="col-md-9">
        <input type="text" id="pageTitle" name="pageTitle" class="form-control" value="{{ $page[0]->pageTitle }}">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Page Description</label>
    <div class="col-md-9">
        <textarea class="form-control" name="pageDescription" id="pageDescription">{{ $page[0]->pageDescription }}</textarea>
    </div>
</div>
<div class="form-group margin-top-class">
    <label class="col-md-3 control-label">Page Keywords (comma separated)</label>
    <div class="col-md-9">
        <input data-role="tagsinput" type="text" id="pageKeywords" name="pageKeywords" class="form-control" value="{{ $page[0]->pageKeywords }}">
    </div>
</div>
<div class="card-header">
    &nbsp;
</div>