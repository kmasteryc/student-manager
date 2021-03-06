@extends('layouts.page_content')

@section('title')
    Total {!! $parents->count() !!} parents.
@endsection

@section('sub_title')
    <a href="{!! route("admin::parent::create") !!}" data-pjax>Add new parent</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover datatable">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.parent')</th>
    			<th>@lang('general.info')</th>
    			<th>@lang('general.child')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('admin.parents.row', $parents, 'parent')
    	</tbody>
    </table>
@endsection