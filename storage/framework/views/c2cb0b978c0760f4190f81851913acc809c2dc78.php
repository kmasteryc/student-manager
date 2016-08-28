
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
                        <a data-toggle="collapse" href="#class_layer"><b><?php echo app('translator')->get('general.responsible_class'); ?></b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('teacher::cl4ss::current'); ?>" data-pjax><?php echo app('translator')->get('general.current_responsible_class'); ?></a></li>
                                    <li><a href="<?php echo route('teacher::cl4ss::past'); ?>" data-pjax><?php echo app('translator')->get('general.past_responsible_class'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer"><b><?php echo app('translator')->get('general.responsible_subject'); ?></b></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('teacher::subject::teaching'); ?>" data-pjax><?php echo app('translator')->get('general.teaching_subject'); ?></a></li>
                                    <li><a href="<?php echo route('teacher::subject::teached'); ?>" data-pjax><?php echo app('translator')->get('general.teached_subject'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

