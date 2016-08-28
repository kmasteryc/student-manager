<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="page-header">
            <h1><?php echo $__env->yieldContent('title'); ?> <small><?php echo $__env->yieldContent('sub_title'); ?></small></h1>
        </div>
        <?php echo $__env->yieldContent('body'); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>