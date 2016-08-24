<?php $__env->startSection('title'); ?>
    You have teached <?php echo $teachable_subjects->count(); ?> subjects in <?php echo $teached_subjects->count(); ?> classes!.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <?php foreach($teachable_subjects as $teachable_subject): ?>
        <table class="table table-bordered table-hover">
            <h3>Teaching <?php echo $teachable_subject->subject_name; ?> at</h3>
            <thead>
            <tr>
                <th>Action</th>
                <th>Class</th>
                <th>Repsonsible teacher</th>
                <th>Repsonsible parent</th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; foreach($teached_subjects->where('subject_id',$teachable_subject->id) as $teached_subject): $__empty_1 = false; ?>
                <tr>
                    <td>Action</td>
                    <td><?php echo $teached_subject->cl4ss->detail_name; ?></td>
                    <td><?php echo $teached_subject->teacher->full_name; ?></td>
                    <td><?php echo $teached_subject->cl4ss->parent->full_name; ?></td>
                </tr>
            <?php endforeach; if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="center">You've never taught this subject in any classes!</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>