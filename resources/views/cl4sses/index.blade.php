@extends('layouts.page_content')

@section('title')
    Total {!! $cl4sses->total() !!} classes.
@endsection

@section('sub_title')
    <a href="{!! route("cl4ss::create") !!}" data-pjax>Add new class</a>
@endsection

@section('body')
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th>@lang('general.action')</th>
                <th>@lang('general.grade')</th>
                <th>@lang('general.cl4ss')</th>
                <th>@lang('general.semester')</th>
                <th>@lang('general.response_teacher')</th>
                <th>@lang('general.scholastic')</th>
    		</tr>
    	</thead>
    	<tbody>
    		@each('cl4sses.row', $cl4sses, 'cl4ss')
    	</tbody>
    </table>
    <div class="center">
        {!! $cl4sses->links() !!}
    </div>
@endsection