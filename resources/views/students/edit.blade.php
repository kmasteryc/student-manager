@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('student::update', $student) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i>
                        @lang('form.create_student_form_title')
                    </legend>
                </div>

                {{--NAME--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.user_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="user_name"
                               value="{!! $student->user_name !!}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.last_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="last_name"
                               value="{!! $student->last_name !!}"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.first_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="first_name"
                               value="{!! $student->first_name !!}"
                        >
                    </div>
                </div>

                {{--PASSWORD--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.password')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="password"
                               class="form-control"
                               name="password"
                        >
                    </div>
                </div>

                {{--RE-PASSWORD--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.repassword')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="password"
                               class="form-control"
                               name="password_confirmation">
                    </div>
                </div>

                {{--EMAIL--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.email')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="email"
                               class="form-control"
                               name="email"
                               value="{!! $student->email !!}">
                    </div>
                </div>

                {{--INFO--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.info')</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="info" class="form-control" rows="20">{!! $student->info !!}</textarea>
                    </div>
                </div>

                {{--BIRTHDAY--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.birthday')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control pickadate" value="{!! $student->birthday !!}" name="birthday">
                    </div>
                </div>


                {{--PARENT--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.parent')</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name="parents[]" multiple="multiple">
                            @foreach($parents as $parent)
                                <option value="{!! $parent->id !!}">{!! $parent->full_name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                {{--CLASS--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.class')</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name="cl4sses[]" multiple="multiple">
                            @foreach($cl4sses as $cl4ss)
                                <option value="{!! $cl4ss->id !!}">{!! $cl4ss->detail_name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">
                            @lang('form.btn_create')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(".select2[name^='parents']").val([{!! $student->parents->pluck('id')->implode(',') !!}]).trigger('change');
        $(".select2[name^='cl4sses']").val([{!! $student->cl4sses->pluck('id')->implode(',') !!}]).trigger('change');
    </script>
@endsection
