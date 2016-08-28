<tr>
    <form action="<?php echo route("admin::cl4ss::destroy", $cl4ss); ?>" method="POST" data-pjax>
        <?php echo csrf_field(); ?>

        <?php echo method_field('DELETE'); ?>

        <td>
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo route('admin::cl4ss::add-student', $cl4ss); ?>" data-pjax>
                    <i class="fa fa-plus"></i>
                    <?php echo app('translator')->get('form.add_student'); ?>
                </a>

                <a class="btn btn-default" href="<?php echo route('admin::cl4ss::edit', $cl4ss); ?>" data-pjax>
                    <i class="fa fa-pencil"></i>
                    <?php echo app('translator')->get('form.btn_edit'); ?>
                </a>

                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    <?php echo app('translator')->get('form.btn_delete'); ?>
                </button>

            </div>
        </td>
        <td><?php echo $cl4ss->grade->grade_name; ?></td>
        <td><?php echo $cl4ss->cl4ssType->cl4ss_type_name; ?></td>
        <td><?php echo $cl4ss->semester->semester_name; ?></td>
        <td><?php echo $cl4ss->teacher->full_name; ?></td>
        <td><?php echo $cl4ss->scholastic->scholastic_duration; ?></td>

    </form>
</tr>