<div class="container message">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('videomessage'))
            <div class="alert custom-alert custom-alert-1 alert-success" style="display: none;" role="alert"> 
                <i class="glyphicon glyphicon-ok"></i> {!! session('videomessage') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            @endif
            @if(Session::has('message'))
            <div class="alert custom-alert custom-alert-1 alert-success" style="display: none;" role="alert"> 
                <i class="glyphicon glyphicon-ok"></i> {!! session('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            @endif
            @if(Session::has('error_message'))
            <div class="alert custom-alert custom-alert-1 alert-danger" style="display: none;" role="alert"> 
                <i class="glyphicon glyphicon-warning-sign"></i> {!! session('error_message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            @endif
            @if (isset($errors) && count($errors) > 0 && !Session::has('message') && !Session::has('videomessage'))
            <?php $classCounter = 1; ?>
            @foreach ($errors->all() as $error)
            <div class="alert custom-alert custom-alert-{{$classCounter}} alert-danger" style="display: none;" role="alert"> 
                <i class="glyphicon glyphicon-warning-sign"></i> {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
            <?php $classCounter++; ?>
            @endforeach
            @endif
        </div>
    </div>
</div>