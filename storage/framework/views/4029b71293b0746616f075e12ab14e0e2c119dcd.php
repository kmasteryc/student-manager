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
                    <a data-toggle="collapse" href="#builded"><b>Tài khoản admin</b></a>
                    <div id="builded" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <li><a href="/login?u=admin&p=123456">admin - 123456</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="panel panel-default custom-dropdown">
                    <a data-toggle="collapse" href="#building"><b>Tài khoản giáo viên</b></a>
                    <div id="building" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <?php /*<li><a href="#">Username: teacher31,teacher11,teacher4,teacher32,teacher9,teacher28,teacher29</a></li>*/ ?>
                                <li><a href="/login?u=teacher31&p=123456">teacher31 - 123456</a></li>
                                <li><a href="/login?u=teacher11&p=123456">teacher11 - 123456</a></li>
                                <li><a href="/login?u=teacher4&p=123456">teacher4 - 123456</a></li>
                                <li><a href="/login?u=teacher32&p=123456">teacher32 - 123456</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="panel panel-default custom-dropdown">
                    <a data-toggle="collapse" href="#building"><b>Tài khoản học sinh</b></a>
                    <div id="building" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
                                <?php /*<li><a href="#">Username: student501,student504,student514,student523</a></li>*/ ?>
                                <li><a href="/login?u=student501&p=123456">student501 - 123456</a></li>
                                <li><a href="/login?u=student504&p=123456">student504 - 123456</a></li>
                                <li><a href="/login?u=student514&p=123456">student514 - 123456</a></li>
                                <li><a href="/login?u=student523&p=123456">student523 - 123456</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>

