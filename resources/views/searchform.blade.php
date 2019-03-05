<!-- Start Search Box -->
<div class="search-box-wrapper">
    <div class="themeix-section-h">
        <span class="heading-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
        <h3>Search Videos</h3>
    </div>
    @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ URL::route('search') }}" method="post" class="subscribe-form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="search" id="search" placeholder="Search Videos.." required>
            <button type="submit">Go</button>
        </div>
    </form>
</div>
<!-- End Search Box -->