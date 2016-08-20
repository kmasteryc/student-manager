@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('cl4ss::update', $cl4ss) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form"
                  data-pjax>
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> @lang('general.edit'): {!! $cl4ss->detail_name !!}</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.cl4ss')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="cl4ss_name"
                               value="{!! $cl4ss->cl4ss_name !!}"
                               placeholder="201x">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.teacher')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="teacher_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{!! $user->id !!}"
                                        {!! $user->id == $cl4ss->teacher_id ? 'selected' : '' !!}}>
                                    {!! $user->name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.parent')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{!! $user->id !!}"
                                        {!! $user->id == $cl4ss->parent_id ? 'selected' : '' !!}}>
                                    {!! $user->name !!}
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
                                <option value="{!! $scholastic->id !!}"
                                        {!! $scholastic->id == $cl4ss->scholastic_id ? 'selected' : '' !!}}>
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
                                <option value="{!! $semester->id !!}"
                                        {!! $semester->id == $cl4ss->semester_id ? 'selected' : '' !!}}>
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
                                <option value="{!! $grade->id !!}"
                                        {!! $grade->id == $cl4ss->grade_id ? 'selected' : '' !!}}>
                                    {!! $grade->grade_name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button class="btn btn-primary">
                            <i class="fa fa-pencil icon-loading-btn"></i>
                            @lang('form.btn_edit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection