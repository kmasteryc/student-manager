@extends('layouts.page_content')

@section('title')
    Total {!! $parents->count() !!} parents.
@endsection

@section('sub_title')
    <a href="{!! route("parent::create") !!}" data-pjax>Add new parent</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('general.parent')</th>
    			<th>@lang('general.info')</th>
    			<th>@lang('general.child')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('parents.row', $parents, 'parent')
    	</tbody>
    </table>
@endsection