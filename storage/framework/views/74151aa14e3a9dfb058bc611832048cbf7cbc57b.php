<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                MENU
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">STUDENT MANAGER</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" method="GET" role="search">
                <div class="form-group">
                    <input type="text" name="q" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo auth()->check()?auth()->user()->full_name:''; ?>

                        <?php echo auth()->check()?Tool::label(auth()->user()):''; ?>

                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php if(auth()->check()): ?>
                            <li><a href="<?php echo url('/logout'); ?>">Logout (<?php echo auth()->user()->username; ?>)</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo url('/login'); ?>">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>