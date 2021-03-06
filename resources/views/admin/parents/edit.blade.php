@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::parent::update', $parent) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> @lang('form.edit_parent_form_title')</legend>
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
                               value="{!! $parent->user_name !!}"
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
                               value="{!! $parent->last_name !!}">
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
                               value="{!! $parent->first_name !!}">
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
                               value="{!! $parent->email !!}">
                    </div>
                </div>

                {{--INFO--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.info')</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea name="info" class="form-control" rows="20">{!! $parent->info !!}</textarea>
                    </div>
                </div>

                {{--BIRTHDAY--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.birthday')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control pickadate" name="birthday"
                               value="{!! $parent->birthday !!}">
                    </div>
                </div>


                {{--CHILD--}}
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.child')</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="select2 form-control" name="students[]" multiple="multiple">
                            @foreach($students as $student)
                                <option value="{!! $student->id !!}">{!! $student->full_name !!}</option>
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

    <script>
        $(document).ready(function(){
            $(".select2").val([{!! $parent->students->pluck('id')->implode(',') !!}]).trigger('change');
        });
    </script>
@endsection
