@extends('layouts.list_panel')

@section('panel_title')
    @lang('form.scholastic_panel_title')
@endsection

@section('panel_body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
    			<th>@lang('form.scholastic_year_from')</th>
    			<th>@lang('form.scholastic_year_to')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('scholastics.row', $scholastics, 'scholastic')
    	</tbody>
    </table>
@endsection