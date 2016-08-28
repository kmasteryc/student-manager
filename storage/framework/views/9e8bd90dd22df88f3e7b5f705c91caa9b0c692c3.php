<?php $__env->startSection('content'); ?>
    <h3><?php echo app('translator')->get('form.list_student_in_class'); ?> <?php echo $cl4ss->detail_name; ?></h3>
    <form action="<?php echo route("admin::cl4ss::update-student", $cl4ss); ?>" method="POST" id="student-form" data-pjax>
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo app('translator')->get('general.total'); ?>: <?php echo $cur_students->count(); ?> <?php echo app('translator')->get('general.student'); ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('general.action'); ?></th>
                                <th><?php echo app('translator')->get('general.student'); ?></th>
                                <th><?php echo app('translator')->get('general.birthday'); ?></th>
                                <th><?php echo app('translator')->get('general.parent'); ?></th>
                            </tr>
                            </thead>
                            <tbody id="current_students">
                            <?php echo $__env->renderEach('admin.cl4sses.row_current_student', $cur_students, 'student'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo app('translator')->get('form.list_all_students'); ?></h3>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered table-hover datatable"
                        data-columns='[{"orderable": false},null,null,{"orderable":false}]'>
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('general.action'); ?></th>
                                <th><?php echo app('translator')->get('general.student'); ?></th>
                                <th><?php echo app('translator')->get('general.birthday'); ?></th>
                                <th><?php echo app('translator')->get('general.parent'); ?></th>
                            </tr>
                            </thead>
                            <tbody id="all_students">
                            <?php echo $__env->renderEach('admin.cl4sses.row_all_student', $all_students, 'student'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="success_text" value="">
        <input type="hidden" name="error_text" value="">
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var api = "<?php echo route('admin::cl4ss::update-student', $cl4ss); ?>";
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>