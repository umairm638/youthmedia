<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
        <div class="alert alert-success"><em> {!! session('message') !!}</em></div>
        @endif
        @if(Session::has('error_message'))
        <div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div>
        @endif
        @if (isset($errors) && count($errors) > 0 && !Session::has('message'))
        <div style="width: 50%; margin-left: 1%; margin-top: 1%;" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>