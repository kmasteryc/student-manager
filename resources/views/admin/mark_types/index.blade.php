@extends('layouts.page_content')

@section('title')
    @lang('form.mark_type_panel_title')
@endsection

@section('sub_title')
    <a href="{!! route("admin::mark_type::create") !!}" data-pjax>Add new mark type</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('form.mark_type_name')</th>
    			<th>@lang('form.mark_type_multiple')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('admin.mark_types.row', $mark_types, 'mark_type')
    	</tbody>
    </table>
@endsection