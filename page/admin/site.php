<div class="container-fluid top-section">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?php if ($response -> hasNotifications()) { ?>
                <?php foreach ($response -> getNotifications() as $notification) { ?>
                    <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $notification; ?></strong>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if ($response -> hasErrors()) { ?>
                <?php foreach ($response -> getErrors() as $error) { ?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $error; ?></strong>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" action="<?php echo Properties::getUrlRoot(true); ?>/admin/site" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter Site Name" value="<?php echo $dto -> getName(); ?>">
                    </div>
                </div>
                <input type="submit" class="btn btn-default col-sm-offset-5 col-sm-2" name="action" value="Update">
            </form>
        </div>
    </div>
</div>