@extends('layouts.page_content')

@section('title')
    Total {!! $semesters->count() !!} semesters.
@endsection

@section('sub_title')
    <a href="{!! route("admin::semester::create") !!}" data-pjax>Add new semester</a>
@endsection

@section('body')

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>@lang('general.action')</th>
            <th>@lang('form.semester_name')</th>
        </tr>
        </thead>
        <tbody>
        @each('admin.semesters.row', $semesters, 'semester')
        </tbody>
    </table>

@endsection