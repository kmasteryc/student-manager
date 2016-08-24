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
                        <?php foreach($scholastics as $scholastic): ?>
                            <option value="<?php echo $scholastic->id; ?>"><?php echo $scholastic->scholastic_from.' - '.$scholastic->scholastic_to; ?></option>
                        <?php endforeach; ?>
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
                        <?php foreach($semesters as $semester): ?>
                            <option value="<?php echo $semester->id; ?>"><?php echo $semester->semester_name; ?></option>
                        <?php endforeach; ?>
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
                        <?php foreach($grades as $grade): ?>
                            <option value="<?php echo $grade->id; ?>"><?php echo $grade->grade_name; ?></option>
                        <?php endforeach; ?>
                        <?php /*<option value="0">All grades</option>*/ ?>
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
                    <select name="filter_cl4ss_type" class="form-control select2">
                        <option value="0">All classes</option>
                        <?php foreach($cl4ss_types as $cl4ss_type): ?>
                            <option value="<?php echo $cl4ss_type->id; ?>"><?php echo $cl4ss_type->cl4ss_type_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <label>Filter by response teacher's name</label>
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
                    <label>Filter by class's state</label>
                </div>
                <div class="col-sm-7">
                    <select name="filter_cl4ss_state" class="form-control select2">
                        <option value="0">All states</option>
                        <option value="1">Deactive</option>
                        <option value="2">Active</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    <?php if(request()->query('filter_semester')): ?>
        $("select[name=filter_semester]").val(<?php echo request()->query('filter_semester'); ?>).trigger('change');
    <?php endif; ?>
    <?php if(request()->query('filter_scholastic')): ?>
        $("select[name=filter_scholastic]").val(<?php echo request()->query('filter_scholastic'); ?>).trigger('change');
    <?php endif; ?>
    <?php if(request()->query('filter_grade')): ?>
        $("select[name=filter_grade]").val(<?php echo request()->query('filter_grade'); ?>).trigger('change');
    <?php endif; ?>
    <?php if(request()->query('filter_cl4ss_type')): ?>
        $("select[name=filter_cl4ss_type]").val(<?php echo request()->query('filter_cl4ss_type'); ?>).trigger('change');
    <?php endif; ?>
    <?php if(request()->query('filter_cl4ss_state')): ?>
        $("select[name=filter_cl4ss_state]").val(<?php echo request()->query('filter_cl4ss_state'); ?>).trigger('change');
    <?php endif; ?>
    <?php if(request()->query('filter_teacher_name')): ?>
        $("input[name=filter_teacher_name]").val("<?php echo request()->query('filter_teacher_name'); ?>");
    <?php endif; ?>

</script>