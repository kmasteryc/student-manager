@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('cl4ss::store') !!}" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i> @lang('form.create_cl4ss_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.cl4ss')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="cl4ss_name"
                               value="{{ old('cl4ss_name') }}"
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
                                <option value="{!! $user->id !!}">
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
                                <option value="{!! $user->id !!}">
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
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">@lang('form.btn_create')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection