@extends('layouts.page_content')

@section('title')
    Total {!! $teachers->count() !!} teachers.
@endsection

@section('sub_title')
    <a href="{!! route("teacher::create") !!}" data-pjax>Add new teacher</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.teacher')</th>
    			<th>@lang('general.birthday')</th>
    			<th>@lang('general.subject')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('teachers.row', $teachers, 'teacher')
    	</tbody>
    </table>
@endsection