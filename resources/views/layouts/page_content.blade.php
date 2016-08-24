@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="page-header">
            <h1>@yield('title') <small>@yield('sub_title')</small></h1>
        </div>
        @yield('body')
    </div>
@endsection