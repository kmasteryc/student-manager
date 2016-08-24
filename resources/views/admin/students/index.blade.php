@extends('layouts.page_content')

@section('title')
    Total {!! $students->total() !!} students.
@endsection

@section('sub_title')
    <a href="{!! route("admin::student::create") !!}" data-pjax>Add new student</a>
@endsection

@section('body')
    @include('admin.students.filter')
    <table class="table table-bordered table-hover datatable"
           data-searching="false"
           data-paging="false"
           data-columns='[{"orderable":false},null,null,null,null]'>
        <thead>
        <tr>
            <th>@lang('general.action')</th>
            <th>@lang('general.image')</th>
            <th>@lang('general.last_name')</th>
            <th>@lang('general.first_name')</th>
            <th>@lang('general.parent')</th>
            <th>@lang('general.birthday')</th>
        </tr>
        </thead>
        <tbody>
        @if($students->count() > 0)
            @each('admin.students.row', $students, 'student')
        @else
            <tr>
                <td colspan="4">No student found!</td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="center">{!! $students->links() !!}</div>
@endsection