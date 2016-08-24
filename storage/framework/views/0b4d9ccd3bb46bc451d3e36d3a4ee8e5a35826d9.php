<tr>
    <form action="<?php echo route("admin::mark_type::destroy", $mark_type); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <?php echo method_field('DELETE'); ?>

        <td>
            <div class="btn-group">
                <a class="btn btn-default" href="<?php echo route('admin::mark_type::edit', $mark_type); ?>" data-pjax>
                    <i class="fa fa-pencil"></i>
                    <?php echo app('translator')->get('form.btn_edit'); ?>
                </a>

                <button class="btn btn-danger btn-delete" type="submit">
                    <?php echo app('translator')->get('form.btn_delete'); ?>
                </button>

            </div>
        </td>

        <td><?php echo $mark_type->mark_type_name; ?></td>
        <td><?php echo $mark_type->mark_type_multiple; ?></td>
    </form>
</tr>