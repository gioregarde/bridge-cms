<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo Properties::getUrlRoot(true); ?>/static/css/lib/bootstrap/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo Properties::getUrlRoot(true); ?>/static/js/lib/jquery/jquery-3.1.1.min.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?php echo Properties::getUrlRoot(true); ?>/static/js/lib/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="jumbotron">
                        <h1>Welcome</h1>
                        <p>Setup page for Initialization of Bridge-cms</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <?php if (isset($_POST['action']) && $_POST['action'] == 'Create') { ?>
                        <div class="alert alert-danger">
                            <?php foreach (self::$error_msg as $msg) { ?>
                                <strong><?php echo $msg ?></strong><br>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4">DB Server Name :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="db_servername" value="localhost">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">DB Username :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="db_username" value="root">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">DB Password :</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="db_password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">DB Name :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="db_name" value="bridge-cms">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Admin Username :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="ad_username" value="admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Admin Password :</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="ad_password" value="admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Site Name :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="st_name" value="bridge-cms">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default col-sm-offset-5 col-sm-2" name="action" value="Create">
                   </form>
                </div>
            </div>
        </div>
    </body>
</html>