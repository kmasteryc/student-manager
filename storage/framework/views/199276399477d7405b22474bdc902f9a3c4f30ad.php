<table class="table table-bordered table-hover datatable">
    <h3>. Total: N classes</h3>
    <thead>
    <tr>
        <th>Action</th>
        <th>Class</th>
        <th>Repsonsible teacher</th>
        <th>Repsonsible parent</th>
    </tr>
    </thead>
    <tbody>
    <?php echo $__env->renderEach('teacher.subject_teachings.row_cl4ss', $subject->cl4sses, 'cl4ss'); ?>
    </tbody>
</table>