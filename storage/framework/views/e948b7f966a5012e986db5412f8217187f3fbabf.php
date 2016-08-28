<!-- uncomment code for absolute positioning tweek see top comment in css -->
    <div class="absolute-wrapper"></div>
    <!-- Menu -->
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">

                    <?php echo $__env->make('layouts.partials.sidebar_cate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer"><b><?php echo app('translator')->get('general.class_layer'); ?> </b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('admin::cl4ss::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_class'); ?></a></li>
                                    <li><a href="<?php echo route('admin::grade::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_grade'); ?></a></li>
                                    <li><a href="<?php echo route('admin::semester::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_semester'); ?></a></li>
                                    <li><a href="<?php echo route('admin::scholastic::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_scholastic'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer"><b><?php echo app('translator')->get('general.user_layer'); ?> </b></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('admin::student::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_student'); ?></a></li>
                                    <li><a href="<?php echo route('admin::parent::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_parent'); ?></a></li>
                                    <li><a href="<?php echo route('admin::teacher::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_teacher'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#mark_layer"><b><?php echo app('translator')->get('general.mark_layer'); ?> </b></a>
                        <div id="mark_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <?php /*<li><a href="<?php echo route('admin::cl4ss::index'); ?>" data-pjax>Manage mark</a></li>*/ ?>
                                    <li><a href="<?php echo route('admin::mark_type::index'); ?>" data-pjax><?php echo app('translator')->get('general.manage_mark_type'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

