<tr>
    <td>
        <input class="form-control" type="checkbox" name="students[]" value="<?php echo $student->id; ?>">
    </td>

    <td><?php echo $student->full_name; ?></td>
    <td><?php echo $student->birthday; ?></td>
    <td>
        <?php $__empty_1 = true; foreach($student->parents as $parent): $__empty_1 = false; ?>
            <a href="<?php echo route("admin::parent::edit", $parent); ?>" data-pjax><?php echo $parent->full_name; ?></a>
        <?php endforeach; if ($__empty_1): ?>
            <a href="<?php echo route("admin::student::edit", $student); ?>" data-pjax><span class="text-danger">Add parents</span></a>
        <?php endif; ?>
    </td>

</tr>
