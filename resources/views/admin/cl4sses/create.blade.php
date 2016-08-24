@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::cl4ss::store') !!}" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i> @lang('form.create_cl4ss_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.cl4ss')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="cl4ss_type_id" class="form-control select2">
                            @foreach($cl4ss_types as $cl4ss_type)
                                <option value="{!! $cl4ss_type->id !!}">{!! $cl4ss_type->cl4ss_type_name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.teacher')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="teacher_id" class="form-control select2">
                            @foreach($teachers as $teacher)
                                <option value="{!! $teacher->id !!}">{!! $teacher->full_name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.parent')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control select2">
                            @foreach($parents as $parent)
                                <option value="{!! $parent->id !!}">
                                    {!! $parent->full_name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.scholastic')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="scholastic_id" class="form-control">
                            @foreach($scholastics as $scholastic)
                                <option value="{!! $scholastic->id !!}">
                                    {!! $scholastic->scholastic_from !!} - {!! $scholastic->scholastic_to !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.semester')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="semester_id" class="form-control">
                            @foreach($semesters as $semester)
                                <option value="{!! $semester->id !!}">
                                    {!! $semester->semester_name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.grade')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="grade_id" class="form-control">
                            @foreach($grades as $grade)
                                <option value="{!! $grade->id !!}">
                                    {!! $grade->grade_name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.state')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="cl4ss_state" class="form-control">
                            <option value="1">Deactive</option>
                            <option value="2">Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">@lang('form.btn_create')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection