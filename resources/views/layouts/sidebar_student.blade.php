
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <div class="absolute-wrapper"></div>
    <!-- Menu -->
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer">School news <span class="caret"></span></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Category 1</a></li>
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Category 2</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer">Studying class <span class="caret"></span></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Announments</a></li>
                                    <li><a href="{!! route('grade::index') !!}" data-pjax>Schedule</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer">Studying subjects <span class="caret"></span></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Announments</a></li>
                                    <li><a href="{!! route('grade::index') !!}" data-pjax>Schedule</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer">Studied classes <span class="caret"></span></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Class 1</a></li>
                                    <li><a href="{!! route('cl4ss::index') !!}" data-pjax>Class 2</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer">User Layer <span class="caret"></span></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('student::index') !!}" data-pjax>Manage students</a></li>
                                    <li><a href="{!! route('parent::index') !!}" data-pjax>Manage parents</a></li>
                                    <li><a href="{!! route('teacher::index') !!}" data-pjax>Manage teacher</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

