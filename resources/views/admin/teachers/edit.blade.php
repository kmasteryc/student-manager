@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::teacher::update', $teacher) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> @lang('form.edit_teacher_form_title')</legend>
                </div>

                {{--USER NAME--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.user_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="user_name"
                               value="{!! $teacher->user_name !!}"
                        >
                    </div>
                </div>

                {{--LAST NAME--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.last_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="last_name"
                               value="{!! $teacher->last_name !!}">
                    </div>
                </div>

                {{--FIRST NAME--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.first_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="first_name"
                               value="{!! $teacher->first_name !!}">
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
                               name="password">
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
                               value="{!! $teacher->email !!}">
                    </div>
                </div>

                {{--INFO--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.info')</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="info" class="form-control" rows="20">{!! $teacher->info !!}</textarea>
                    </div>
                </div>

                {{--BIRTHDAY--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.birthday')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control pickadate" name="birthday" value="{!! $teacher->birthday !!}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.subject')</label>
                    </div>
                    <div class="col-sm-10">
                        <select name="subjects[]" class="form-control select2" multiple>
                            @foreach($subjects as $subject)
                                <option value="{!! $subject->id !!}" {!! $teacher->subjects->contains($subject) ? 'selected' : '' !!}>
                                    {!! $subject->subject_name !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-pencil icon-loading-btn"></i>
                            @lang('form.btn_edit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".select2").val([{!! $teacher->subjects->pluck('id')->implode(',') !!}]).trigger('change');
    </script>
@endsection