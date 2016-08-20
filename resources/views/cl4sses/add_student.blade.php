@extends('layouts.app')

@section('content')
    <h3>@lang('form.list_student_in_class') {!! $cl4ss->detail_name !!}</h3>
    <form action="{!! route("cl4ss::update-student", $cl4ss) !!}" method="POST" id="student-form" data-pjax>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @lang('general.total'): {!! $cur_students->count() !!} @lang('general.student')
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('general.action')</th>
                                <th>@lang('general.student')</th>
                                <th>@lang('general.birthday')</th>
                                <th>@lang('general.parent')</th>
                            </tr>
                            </thead>
                            <tbody id="current_students">
                            @each('cl4sses.row_current_student', $cur_students, 'student')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">@lang('form.list_all_students')</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>@lang('general.action')</th>
                                <th>@lang('general.student')</th>
                                <th>@lang('general.birthday')</th>
                                <th>@lang('general.parent')</th>
                            </tr>
                            </thead>
                            <tbody id="all_students">
                            @each('cl4sses.row_all_student', $all_students, 'student')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="success_text" value="">
        <input type="hidden" name="error_text" value="">
    </form>

@endsection

@section('script')
    <script>
        var api = "{!! route('cl4ss::update-student', $cl4ss) !!}";
    </script>
@endsection