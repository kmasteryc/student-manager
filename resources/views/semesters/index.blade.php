@extends('layouts.list_panel')

@section('panel_title')
    @lang('form.semester_panel_title')
@endsection

@section('panel_body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('form.semester_name')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('semesters.row', $semesters, 'semester')
    	</tbody>
    </table>
@endsection