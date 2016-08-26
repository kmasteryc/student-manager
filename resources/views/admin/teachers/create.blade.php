@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::teacher::store') !!}"
                  method="post"
                  class="form-horizontal"
                  role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i>
                        @lang('form.create_teacher_form_title')
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
                               name="username"
                               value="{!! old('username') !!}"
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
                               value="{!! old('last_name') !!}"
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
                               value="{!! old('first_name') !!}"
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
                               value="{!! old('email') !!}">
                    </div>
                </div>

                {{--INFO--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.info')</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="info" class="form-control" rows="20"></textarea>
                    </div>
                </div>

                {{--BIRTHDAY--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.birthday')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control pickadate" name="birthday">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.subject')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="subjects[]" class="form-control select2" multiple>
                            @foreach($subjects as $subject)
                                <option value="{!! $subject->id !!}">
                                    {!! $subject->subject_name !!}
                                </option>
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
@endsection