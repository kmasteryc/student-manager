<table class="table table-bordered table-hover datatable">
    <h3><?php echo $cl4ss->detail_name; ?>. Total: <?php echo $cl4ss->students->count(); ?> students</h3>
    <thead>
    <tr>
        <th>Action</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Parent</th>
    </tr>
    </thead>
    <tbody>
    <?php echo $__env->renderEach('teacher.cl4ss_currents.row_student', $cl4ss->students, 'student'); ?>
    </tbody>
</table>