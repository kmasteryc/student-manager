<form action="" method="get" class="form-horizontal" role="form">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.scholastic')</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_scholastic" class="form-control select2">
                        <option value="0">@lang('general.all_scholastic')</option>
                        @foreach($scholastics as $scholastic)
                            <option value="{!! $scholastic->id !!}">{!! $scholastic->scholastic_from.' - '.$scholastic->scholastic_to !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.semester')</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_semester" class="form-control select2">
                        <option value="0">@lang('general.all_semester')</option>
                        @foreach($semesters as $semester)
                            <option value="{!! $semester->id !!}">{!! $semester->semester_name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.grade')</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_grade" class="form-control select2">
                        <option value="0">@lang('general.all_grade')</option>
                        @foreach($grades as $grade)
                            <option value="{!! $grade->id !!}">{!! $grade->grade_name !!}</option>
                        @endforeach
                        {{--<option value="0">All grades</option>--}}
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.cl4ss_type')</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_cl4ss_type" class="form-control select2">
                        <option value="0">@lang('general.all_class')</option>
                        @foreach($cl4ss_types as $cl4ss_type)
                            <option value="{!! $cl4ss_type->id !!}">{!! $cl4ss_type->cl4ss_type_name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.response_teacher')</label>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="filter_teacher_name" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>@lang('general.class_state')</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_cl4ss_state" class="form-control select2">
                        <option value="0">@lang('general.all_state')</option>
                        <option value="1">@lang('general.deactived')</option>
                        <option value="2">@lang('general.actived')</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> @lang('general.filter')</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    @if(request()->query('filter_semester'))
        $("select[name=filter_semester]").val({!! request()->query('filter_semester') !!}).trigger('change');
    @endif
    @if(request()->query('filter_scholastic'))
        $("select[name=filter_scholastic]").val({!! request()->query('filter_scholastic') !!}).trigger('change');
    @endif
    @if(request()->query('filter_grade'))
        $("select[name=filter_grade]").val({!! request()->query('filter_grade') !!}).trigger('change');
    @endif
    @if(request()->query('filter_cl4ss_type'))
        $("select[name=filter_cl4ss_type]").val({!! request()->query('filter_cl4ss_type') !!}).trigger('change');
    @endif
    @if(request()->query('filter_cl4ss_state'))
        $("select[name=filter_cl4ss_state]").val({!! request()->query('filter_cl4ss_state') !!}).trigger('change');
    @endif
    @if(request()->query('filter_teacher_name'))
        $("input[name=filter_teacher_name]").val("{!! request()->query('filter_teacher_name') !!}");
    @endif

</script>