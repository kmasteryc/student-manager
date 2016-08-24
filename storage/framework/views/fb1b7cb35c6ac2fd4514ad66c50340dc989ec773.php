<tr>
    <td>Action</td>
    <td><?php echo $student->first_name; ?></td>
    <td><?php echo $student->last_name; ?></td>
    <td><?php echo $student->parents->pluck('full_name')->implode(', '); ?></td>
</tr>