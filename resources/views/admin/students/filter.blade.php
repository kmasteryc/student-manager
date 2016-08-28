<form action="" method="get" class="form-horizontal" role="form">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>Filter by scholastic</label>
                </div>
                <div class="col-sm-7">
                    <select name="q_scholastic" class="form-control select2">
                        <option value="0">All scholastics</option>
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
                    <label>Filter by semester</label>
                </div>
                <div class="col-sm-7">
                    <select name="q_semester" class="form-control select2">
                        <option value="0">All semesters</option>
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
                    <label>Filter by grade</label>
                </div>
                <div class="col-sm-7">
                    <select name="q_grade" class="form-control select2">
                        <option value="0">All grades</option>
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
                    <label>Filter by class</label>
                </div>
                <div class="col-sm-7">
                    <select name="q_cl4ss_type" class="form-control select2">
                        <option value="0">All classes</option>
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
                    <label>Filter by student's name</label>
                </div>
                <div class="col-sm-7">
                    <input type="text" name="q_student_name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    @if(request()->query('q_semester'))
        $("select[name=q_semester]").val({!! request()->query('q_semester') !!}).trigger('change');
    @endif
    @if(request()->query('q_scholastic'))
        $("select[name=q_scholastic]").val({!! request()->query('q_scholastic') !!}).trigger('change');
    @endif
    @if(request()->query('q_grade'))
        $("select[name=q_grade]").val({!! request()->query('q_grade') !!}).trigger('change');
    @endif
    @if(request()->query('q_cl4ss_type'))
        $("select[name=q_cl4ss_type]").val({!! request()->query('q_cl4ss_type') !!}).trigger('change');
    @endif
    @if(request()->query('q_student_name'))
        $("input[name=q_student_name]").val("{!! request()->query('q_student_name') !!}");
    @endif
</script>