@extends('admin.layouts.app')

@section('content')
@include('admin.tinymceSettings')
<div class="card">
    
    @include('admin.layouts.errorView')
    <div class="card-body no-padding" style="margin: 20px;">
        <form action="{{ URL::route('sendMailToSubscribers') }}" method="post" class="subscribe-form" enctype="multipart/form-data">
         {{ csrf_field() }}
          <div class="form-group">
            <label for="email_subject">Enter Subject</label>
            <input type="text" class="form-control" name="emailSubject" id="email_subject" placeholder="Enter Subject of Email">
          </div>

          <div class="form-group">
            <label for="pageDescription">Email Body</label>
            <textarea class="form-control" id="pageDescription" rows="3" name="emailBody"></textarea>
          </div>

          <div class="form-group">
            <label for="subscribersList">Select Users</label>
            <select multiple class="form-control " id="subscribersList" name="subscribersList[]">
            @foreach ($user as $userRow)
              <option value="{{ $userRow->subscriptionEmail }}">{{ $userRow->subscriptionEmail }}</option>
              @endforeach
            </select>
            <input type="radio" id="selectAll" name="subscribers" /> Check All 
            <input type="radio" id="unCheck" name="subscribers" /> Uncheck
          </div><br>
          
          <input type="submit" name="submit" value="Send Email" class="btn btn-success">
        </form>
    </div>
  

</div>

<script>
    $(document).ready(function () {
    $(".sidebar-menu li").removeClass("active");
    $('#nav-subscribe').addClass('active');
    });
    $('#selectAll').click(function(){ 
    $('#subscribersList option').prop('selected', true);   
 });
    $('#unCheck').click(function(){ 
    $('#subscribersList option').prop('selected', false);   
 });
   
</script>
<script type="text/javascript">
    
</script>

@endsection
