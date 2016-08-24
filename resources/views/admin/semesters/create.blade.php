@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('admin::semester::store') !!}" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i> @lang('form.create_semester_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.semester_name')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="semester_name"
                               value="{!! old('semester_name') !!}"
                               placeholder="Semester I">
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