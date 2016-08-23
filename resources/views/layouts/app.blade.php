<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! $title or 'Student Manager System' !!}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('lib/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/pnotify/pnotify.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/select2/css/select2.css') }}">

    <link rel="stylesheet" href="{{ asset('lib/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/pickadate/themes/rtl.css') }}">

    <link rel="stylesheet" href="{{ asset('lib/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-modal/css/bootstrap-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}">

    <link rel="stylesheet" href="{{ asset('lib/datatables/media/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/datatables/media/css/dataTables.bootstrap.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('lib/datatables/media/css/dataTables.uikit.css') }}">--}}

    <script src="{!! asset('lib/jquery/jquery.js') !!}"></script>

    <script>
        function url(url) {
            return "{!! url('/') !!}/" + url;
        }
    </script>

    <script src="{!! asset('lib/jquery-pjax/jquery.pjax.js') !!}"></script>
    <script src="{!! asset('lib/bootstrap/js/bootstrap.js') !!}"></script>

    <script src="{!! asset('lib/bootstrap-modal/js/bootstrap-modal.js') !!}"></script>
    <script src="{!! asset('lib/bootstrap-modal/js/bootstrap-modalmanager.js') !!}"></script>

    <script src="{!! asset('lib/pnotify/pnotify.js') !!}"></script>
    <script src="{!! asset('lib/pickadate/picker.js') !!}"></script>
    <script src="{!! asset('lib/pickadate/picker.date.js') !!}"></script>
    <script src="{!! asset('lib/select2/js/select2.js') !!}"></script>
    <script src="{!! asset('lib/datatables/media/js/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('js/app.js') !!}"></script>
</head>
<body id="app-layout">

@include('layouts.nav')

@include('layouts.alert')

<div class="col-md-2" id="sidebar">
    @if(auth()->user())
        @if(auth()->user()->role_id == 4)
            @include('layouts.sidebar_admin')
        @endif
        @if(auth()->user()->role_id == 3)
            @include('layouts.sidebar_teacher')
        @endif
        @if(auth()->user()->role_id == 2)
            @include('layouts.sidebar_parent')
        @endif
        @if(auth()->user()->role_id == 1)
            @include('layouts.sidebar_student')
        @endif
    @else
        @include('layouts.sidebar_guest')
    @endif
</div>

<div class="col-md-10" id="content">
    <div id="pjax-container">
        @yield('content')
    </div>
</div>

@section('script')
@show

</body>
</html>
