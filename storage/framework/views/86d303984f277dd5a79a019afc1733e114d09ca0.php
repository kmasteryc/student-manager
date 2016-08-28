<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo route('admin::mark_type::store'); ?>"
                  method="post"
                  class="form-horizontal"
                  role="form"
                  data-pjax>
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <legend><i class="fa fa-star-o"></i> <?php echo app('translator')->get('form.create_mark_type_form_title'); ?></legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('form.mark_type_name'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="mark_type_name"
                               value="<?php echo e(old('mark_type_name')); ?>"
                               placeholder="Test  15 minutes">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <label><?php echo app('translator')->get('form.mark_type_multiple'); ?></label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               name="mark_type_multiple"
                               value="<?php echo e(old('mark_type_multiple')); ?>"
                               placeholder="20">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('form.btn_create'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>