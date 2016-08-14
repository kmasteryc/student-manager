@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">@yield('panel_title')</h3>
            </div>
            <div class="panel-body">
                @yield('panel_body')
            </div>
            @yield('test')
        </div>
    </div>
@endsection