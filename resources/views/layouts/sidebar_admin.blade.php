<!-- uncomment code for absolute positioning tweek see top comment in css -->
    <div class="absolute-wrapper"></div>
    <!-- Menu -->
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">

                    @include('layouts.partials.sidebar_cate')

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#class_layer"><b>Class Layer </b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('admin::cl4ss::index') !!}" data-pjax>Manage classes</a></li>
                                    <li><a href="{!! route('admin::grade::index') !!}" data-pjax>Manage grade</a></li>
                                    <li><a href="{!! route('admin::semester::index') !!}" data-pjax>Manage semester</a></li>
                                    <li><a href="{!! route('admin::scholastic::index') !!}" data-pjax>Manage scholastic</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer"><b>User Layer </b></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('admin::student::index') !!}" data-pjax>Manage students</a></li>
                                    <li><a href="{!! route('admin::parent::index') !!}" data-pjax>Manage parents</a></li>
                                    <li><a href="{!! route('admin::teacher::index') !!}" data-pjax>Manage teacher</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#mark_layer"><b>Mark Layer </b></a>
                        <div id="mark_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    {{--<li><a href="{!! route('admin::cl4ss::index') !!}" data-pjax>Manage mark</a></li>--}}
                                    <li><a href="{!! route('admin::mark_type::index') !!}" data-pjax>Manage mark type</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

