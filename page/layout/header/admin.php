<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bridge-nav" <?php if (!isAuthenticated()) echo 'style="display: none !important;"';?>>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Properties::getUrlRoot(true); ?>/admin/home">Bridge</a>
        </div>

        <ul class="nav navbar-nav collapse navbar-collapse" id="bridge-nav" <?php if (!isAuthenticated()) echo 'style="display: none !important;"';?>>
            <li>
                <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/site">Site</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Components&nbsp;<span class="caret"></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/content">Content</a>
                    </li>
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/header">Header</a>
                    </li>
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/navigation">Navigation</a>
                    </li>
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/footer">Footer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/pages">Pages</a>
            </li>
            <li>
                <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/layout">Layout</a>
            </li>
            <li>
                <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/file">File Manager</a>
            </li>
            <li class="settings dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings&nbsp;<span class="caret"></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/login?action=logout">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right collapse navbar-collapse" <?php if (!isAuthenticated()) echo 'style="display: none !important;"';?>>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-cog"></i></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/login?action=logout">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <form class="navbar-form navbar-right" action="<?php echo Properties::getUrlRoot(true); ?>/admin/login" method="post" <?php if (isAuthenticated()) echo 'style="display: none !important;"';?>>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-play"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
</nav>