@extends('layouts.page_content')

@section('title')
    Total {!! $scholastics->count() !!} scholastics.
@endsection

@section('sub_title')
    <a href="{!! route("admin::scholastic::create") !!}" data-pjax>Add new scholastic</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('form.scholastic_year_from')</th>
    			<th>@lang('form.scholastic_year_to')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('admin.scholastics.row', $scholastics, 'scholastic')
    	</tbody>
    </table>
@endsection