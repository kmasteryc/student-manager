
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
                        <a data-toggle="collapse" href="#class_layer"><b>Responsible class</b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('teacher::cl4ss::current'); ?>" data-pjax>Current responsible classes</a></li>
                                    <li><a href="<?php echo route('teacher::cl4ss::past'); ?>" data-pjax>Past responsible classes</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer"><b>Responsible subjects</b></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo route('teacher::subject::teaching'); ?>" data-pjax>Teaching subjects</a></li>
                                    <li><a href="<?php echo route('teacher::subject::teached'); ?>" data-pjax>Teached subjects</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

