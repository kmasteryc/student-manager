<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo route('admin::cl4ss::update', $cl4ss); ?>" method="post" class="form-horizontal" role="form" data-pjax>
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="form-group">
                    <legend><i class="fa fa-pencil-square-o"></i> <?php echo app('translator')->get('general.edit'); ?>: <?php echo $cl4ss->detail_name; ?></legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.cl4ss'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="cl4ss_type_id" class="form-control select2">
                            <?php foreach($cl4ss_types as $cl4ss_type): ?>
                                <option value="<?php echo $cl4ss_type->id; ?>" <?php echo $cl4ss->cl4ssType->id == $cl4ss_type->id ? 'selected' : ''; ?>><?php echo $cl4ss_type->cl4ss_type_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.teacher'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="teacher_id" class="form-control select2">
                            <?php foreach($users as $user): ?>
                                <option value="<?php echo $user->id; ?>"
                                        <?php echo $user->id == $cl4ss->teacher_id ? 'selected' : ''; ?>>
                                    <?php echo $user->full_name; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.parent'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control select2">
                            <?php foreach($users as $user): ?>
                                <option value="<?php echo $user->id; ?>"
                                        <?php echo $user->id == $cl4ss->parent_id ? 'selected' : ''; ?>>
                                    <?php echo $user->full_name(); ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.scholastic'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="scholastic_id" class="form-control select2">
                            <?php foreach($scholastics as $scholastic): ?>
                                <option value="<?php echo $scholastic->id; ?>" <?php echo $scholastic->id == $cl4ss->scholastic_id ? 'selected' : ''; ?>>
                                    <?php echo $scholastic->scholastic_from; ?> - <?php echo $scholastic->scholastic_to; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.semester'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="semester_id" class="form-control select2">
                            <?php foreach($semesters as $semester): ?>
                                <option value="<?php echo $semester->id; ?>" <?php echo $semester->id == $cl4ss->semester_id ? 'selected' : ''; ?>>
                                    <?php echo $semester->semester_name; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.grade'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="grade_id" class="form-control select2">
                            <?php foreach($grades as $grade): ?>
                                <option value="<?php echo $grade->id; ?>"
                                        <?php echo $grade->id == $cl4ss->grade_id ? 'selected' : ''; ?>>
                                    <?php echo $grade->grade_name; ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('general.state'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <select name="cl4ss_state" class="form-control">
                            <option value="1" <?php echo $cl4ss->cl4ss_state == 1?'selected':''; ?>>Deactive</option>
                            <option value="2" <?php echo $cl4ss->cl4ss_state == 2?'selected':''; ?>>Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button class="btn btn-primary">
                            <i class="fa fa-pencil icon-loading-btn"></i>
                            <?php echo app('translator')->get('form.btn_edit'); ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>