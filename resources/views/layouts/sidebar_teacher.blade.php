
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
                        <a data-toggle="collapse" href="#class_layer"><b>@lang('general.responsible_class')</b></a>
                        <div id="class_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('teacher::cl4ss::current') !!}" data-pjax>@lang('general.current_responsible_class')</a></li>
                                    <li><a href="{!! route('teacher::cl4ss::past') !!}" data-pjax>@lang('general.past_responsible_class')</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="panel panel-default custom-dropdown">
                        <a data-toggle="collapse" href="#user_layer"><b>@lang('general.responsible_subject')</b></a>
                        <div id="user_layer" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="{!! route('teacher::subject::teaching') !!}" data-pjax>@lang('general.teaching_subject')</a></li>
                                    <li><a href="{!! route('teacher::subject::teached') !!}" data-pjax>@lang('general.teached_subject')</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

