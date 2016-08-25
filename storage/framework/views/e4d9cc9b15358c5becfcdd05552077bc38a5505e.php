<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo isset($title) ? $title : 'Student Manager System'; ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('lib/font-awesome/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/pnotify/pnotify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/select2/css/select2.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('lib/pickadate/themes/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/pickadate/themes/default.date.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/pickadate/themes/rtl.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('lib/bootstrap-modal/css/bootstrap-modal-bs3patch.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/bootstrap-modal/css/bootstrap-modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/bootstrap-modal/css/bootstrap-modal-bs3patch.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('lib/datatables/media/css/jquery.dataTables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('lib/datatables/media/css/dataTables.bootstrap.css')); ?>">
    <?php /*    <link rel="stylesheet" href="<?php echo e(asset('lib/datatables/media/css/dataTables.uikit.css')); ?>">*/ ?>

    <script src="<?php echo asset('lib/jquery/jquery.js'); ?>"></script>

    <script>
        function url(url) {
            return "<?php echo url('/'); ?>/" + url;
        }
    </script>

    <script src="<?php echo asset('lib/jquery-pjax/jquery.pjax.js'); ?>"></script>
    <script src="<?php echo asset('lib/bootstrap/js/bootstrap.js'); ?>"></script>

    <script src="<?php echo asset('lib/bootstrap-modal/js/bootstrap-modal.js'); ?>"></script>
    <script src="<?php echo asset('lib/bootstrap-modal/js/bootstrap-modalmanager.js'); ?>"></script>

    <script src="<?php echo asset('lib/pnotify/pnotify.js'); ?>"></script>
    <script src="<?php echo asset('lib/pickadate/picker.js'); ?>"></script>
    <script src="<?php echo asset('lib/pickadate/picker.date.js'); ?>"></script>
    <script src="<?php echo asset('lib/select2/js/select2.js'); ?>"></script>
    <script src="<?php echo asset('lib/datatables/media/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo asset('js/app.js'); ?>"></script>
</head>
<body id="app-layout">

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-2" id="sidebar">

            <?php if(auth()->user()): ?>
                <?php if(auth()->user()->role_id == 4): ?>
                    <?php echo $__env->make('layouts.sidebar_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->user()->role_id == 3): ?>
                    <?php echo $__env->make('layouts.sidebar_teacher', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->user()->role_id == 2): ?>
                    <?php echo $__env->make('layouts.sidebar_parent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <?php if(auth()->user()->role_id == 1): ?>
                    <?php echo $__env->make('layouts.sidebar_student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.sidebar_guest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

        </div>

        <div class="col-md-10" id="content">

            <div id="pjax-container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>

<?php $__env->startSection('script'); ?>
<?php echo $__env->yieldSection(); ?>
</body>
</html>
