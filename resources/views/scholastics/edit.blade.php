@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('scholastic::update', $scholastic) !!}"
                  method="post"
                  class="form-horizontal"
                  role="form">

                {{csrf_field()}}
                {{method_field('PUT')}}

                <div class="form-group">
                    <legend>@lang('form.edit_scholastic_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.scholastic_year_from')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               name="scholastic_from"
                               value="{!! value($scholastic->scholastic_from) !!}"
                               placeholder="201x">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.scholastic_year_to')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               name="scholastic_to"
                               value="{!! value($scholastic->scholastic_to) !!}"
                               placeholder="201x">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">@lang('form.edit_btn')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection