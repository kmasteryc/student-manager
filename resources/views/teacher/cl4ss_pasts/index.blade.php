@extends('layouts.page_content')

@section('title')
    You've been responsible for {!! $cl4sses->count() !!} classes.
@endsection

@section('body')
    @each('teacher.cl4ss_pasts.row', $cl4sses, 'cl4ss')
@endsection