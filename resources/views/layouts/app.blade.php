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

    <script src="{!! asset('lib/jquery/jquery.js') !!}"></script>
</head>
<body id="app-layout">

@include('layouts.nav')

<div class="container">
    @include('layouts.alert')
    @include('layouts.sidebar')
</div>

<!-- JavaScripts -->

<script>
    function url(url) {
        return "{!! url('/') !!}/" + url;
    }
</script>

<script src="{!! asset('lib/jquery-pjax/jquery.pjax.js') !!}"></script>
<script src="{!! asset('lib/bootstrap/js/bootstrap.js') !!}"></script>
<script src="{!! asset('lib/pnotify/pnotify.js') !!}"></script>
<script src="{!! asset('lib/pickadate/picker.js') !!}"></script>
<script src="{!! asset('lib/pickadate/picker.date.js') !!}"></script>
<script src="{!! asset('lib/select2/js/select2.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>

@section('script')
@show

</body>
</html>
