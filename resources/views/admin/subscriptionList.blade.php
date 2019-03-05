@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" onclick="location.href = '{{ URL::route('addSubscriber') }}';">
            <span class="fa fa-plus"></span> Add Subscriber
        </button>
    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Our User</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $userRow)
                <tr>
                    <td>{{ $userRow->subscriptionEmail }}</td>
                    <td>
                        @if($userRow->subscriptionUserId != 4)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" onclick="location.href = '{{url('editSubscriber/')}}/{{ $userRow->subscriptionId }}';">Edit</a></li>
                                <li><a href="deleteSubscriber/{{ $userRow->subscriptionId }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
    $(".sidebar-menu li").removeClass("active");
    $('#nav-subscribe').addClass('active');
    });
</script>
@endsection
