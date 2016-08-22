<form action="" method="get" class="form-horizontal" role="form">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>Filter by scholastic</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_scholastic" class="form-control select2">
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
                    <select name="filter_semester" class="form-control select2">
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
                    <select name="filter_grade" class="form-control select2">
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
                    <select name="filter_cl4ss" class="form-control select2">
                        <option value="0">All classes</option>
                        @foreach($cl4sses as $cl4ss)
                            <option value="{!! $cl4ss->id !!}">{!! $cl4ss->cl4ss_name !!}</option>
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
                    <input type="text" name="filter_student_name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-7">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    $("select[name=filter_semester]").val({!! request()->query('filter_semester') !!}).trigger('change');
    $("select[name=filter_scholastic]").val({!! request()->query('filter_scholastic') !!}).trigger('change');
    $("select[name=filter_grade]").val({!! request()->query('filter_grade') !!}).trigger('change');
    $("select[name=filter_cl4ss]").val({!! request()->query('filter_cl4ss') !!}).trigger('change');
    $("input[name=filter_student_name]").val("{!! request()->query('filter_student_name') !!}");
</script>