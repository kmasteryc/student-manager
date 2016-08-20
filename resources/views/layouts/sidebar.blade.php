<div class="col-md-2 sidebar">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <div class="absolute-wrapper"></div>
    <!-- Menu -->
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                    </li>

                    <li>
                        <a href="{!! route('cl4ss::index') !!}" data-pjax>
                            <span class="glyphicon glyphicon-plane"></span> Manage classes
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('grade::index') !!}" data-pjax>
                            <span class="glyphicon glyphicon-plane"></span> Manage grade
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('semester::index') !!}" data-pjax>
                            <span class="glyphicon glyphicon-plane"></span> Manage semester
                        </a>
                    </li>
                    <li>
                        <a href="{!! route('scholastic::index') !!}" data-pjax>
                            <span class="glyphicon glyphicon-plane"></span> Manage scholastic
                        </a>
                    </li>

                    <li>
                        <a href="{!! route('mark_type::index') !!}" data-pjax>
                            <span class="glyphicon glyphicon-plane"></span> Manage mark types
                        </a>
                    </li>

                    <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

                    <!-- Dropdown-->
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1">
                            <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                        </a>

                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>

                                    <!-- Dropdown level 2 -->
                                    <li class="panel panel-default" id="dropdown">
                                        <a data-toggle="collapse" href="#dropdown-lvl2">
                                            <span class="glyphicon glyphicon-off"></span> Sub Level <span
                                                    class="caret"></span>
                                        </a>
                                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                    <li><a href="#">Link</a></li>
                                                    <li><a href="#">Link</a></li>
                                                    <li><a href="#">Link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>
</div>
<div class="col-md-10 content">
    <div id="pjax-container">
        @section('content')
        @show
    </div>
</div>