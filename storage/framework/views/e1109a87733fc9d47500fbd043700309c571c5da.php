<?php $__env->startSection('title'); ?>
    You've been responsible for <?php echo $cl4sses->count(); ?> classes.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->renderEach('teacher.cl4ss_pasts.row', $cl4sses, 'cl4ss'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>