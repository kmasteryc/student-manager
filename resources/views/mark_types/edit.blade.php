@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('mark_type::update', $mark_type) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form"
                  data-pjax>
                {{csrf_field()}}
                {{method_field("PUT")}}
                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> @lang('form.edit_mark_type_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.mark_type_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="mark_type_name"
                               value="{{$mark_type->mark_type_name}}"
                               placeholder="Test  15 minutes">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.mark_type_multiple')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="mark_type_multiple"
                               value="{{$mark_type->mark_type_multiple}}"
                               placeholder="20">
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