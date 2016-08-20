<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! $title or 'Student Manager System' !!}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pnotify.custom.min.css') }}">
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



<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/pjax.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/pnotify.custom.min.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>
@section('script')
@show
</body>
</html>
