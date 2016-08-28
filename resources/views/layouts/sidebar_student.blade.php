
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
                        <a data-toggle="collapse" href="#class_layer"><b>@lang('general.learn_result')</b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route("student::subject::current") !!}" data-pjax>@lang('general.current_result')</a></li>
                                    <li><a href="{!! route("student::subject::all") !!}" data-pjax>@lang('general.all_result')</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

