@extends('layouts.page_content')

@section('title')
    You are responsible for {!! $cl4sses->count() !!} classes.
@endsection

@section('body')
    @each('teacher.cl4ss_currents.row', $cl4sses, 'cl4ss')
@endsection