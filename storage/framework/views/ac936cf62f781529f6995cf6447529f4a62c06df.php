<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('form.mark_type_panel_title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_title'); ?>
    <a href="<?php echo route("admin::mark_type::create"); ?>" data-pjax>Add new mark type</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <table class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th><?php echo app('translator')->get('general.action'); ?></th>
    			<th><?php echo app('translator')->get('form.mark_type_name'); ?></th>
    			<th><?php echo app('translator')->get('form.mark_type_multiple'); ?></th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php echo $__env->renderEach('admin.mark_types.row', $mark_types, 'mark_type'); ?>
    	</tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>