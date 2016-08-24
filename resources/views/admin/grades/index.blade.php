@extends('layouts.page_content')

@section('title')
    Total {!! $grades->count() !!} grades.
@endsection

@section('sub_title')
    <a href="{!! route("admin::grade::create") !!}" data-pjax>Add new grade</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.grade')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('admin.grades.row', $grades, 'grade')
    	</tbody>
    </table>
@endsection