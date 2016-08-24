<?php $__env->startSection('title'); ?>
    Total <?php echo $result_cl4sses->total(); ?> classes.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_title'); ?>
    <a href="<?php echo route("admin::cl4ss::create"); ?>" data-pjax>Add new class</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('admin.cl4sses.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th><?php echo app('translator')->get('general.action'); ?></th>
            <th><?php echo app('translator')->get('general.grade'); ?></th>
            <th><?php echo app('translator')->get('general.cl4ss_type'); ?></th>
            <th><?php echo app('translator')->get('general.semester'); ?></th>
            <th><?php echo app('translator')->get('general.response_teacher'); ?></th>
            <th><?php echo app('translator')->get('general.scholastic'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if($result_cl4sses->count() > 0): ?>
            <?php echo $__env->renderEach('admin.cl4sses.row', $result_cl4sses, 'cl4ss'); ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No class found!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="center">
        <?php echo $result_cl4sses->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>