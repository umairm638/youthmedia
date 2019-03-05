@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">

    </div>
    @include('admin.layouts.errorView')
    <div class="card-body no-padding">
        <table class="datatable table table-striped primary" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Page</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($navigation as $navigationRow)
                <tr>
                    <td>

                        <a href="editPage/{{ $navigationRow->navId }}">
                            {{ $navigationRow->pageName }}
                        </a>
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
        $('#nav-pages').addClass('active');
    });
</script>
@endsection
