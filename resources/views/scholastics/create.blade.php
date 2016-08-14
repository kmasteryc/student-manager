@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{!! route('scholastic::store') !!}" method="post" class="form-horizontal" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <legend>@lang('form.create_scholastic_form_title')</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label>@lang('form.scholastic_year_from')</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="number"
                               class="form-control"
                               name="scholastic_from"
                               value="{{ old('scholastic_from') }}"
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
                               value="{{ old('scholastic_to') }}"
                               placeholder="201x">
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