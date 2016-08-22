@extends('layouts.page_content')

@section('title')
    Total {!! $students->count() !!} students.
@endsection

@section('sub_title')
    <a href="{!! route("student::create") !!}" data-pjax>Add new student</a>
@endsection

@section('body')
    @include('students.filter')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.student')</th>
    			<th>@lang('general.parent')</th>
    			<th>@lang('general.class')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('students.row', $students, 'student')
    	</tbody>
    </table>
    <div class="center">{!! $students->links() !!}</div>
@endsection