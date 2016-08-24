@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::grade::update', $grade) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form"
                  data-pjax>

                {{csrf_field()}}
                {{method_field('PUT')}}

                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> @lang('form.edit_grade_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('general.grade')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="grade_name"
                               value="{!! $grade->grade_name !!}"
                               placeholder="Grade 6">
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