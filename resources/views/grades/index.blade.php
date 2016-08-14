@extends('layouts.list_panel')

@section('panel_title')
    @lang('form.grade_panel_title')
@endsection

@section('panel_body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.grade_name')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('grades.row', $grades, 'grade')
    	</tbody>
    </table>
@endsection