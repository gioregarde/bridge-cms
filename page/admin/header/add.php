<div class="container-fluid top-section">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
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
            <form class="form-horizontal" action="<?php echo Properties::getUrlRoot(true); ?>/admin/header/add" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="<?php echo $dto -> getName(); ?>">
                    </div>
                </div>
                <div class="form-group field-ace">
                    <label class="control-label col-sm-2">Content</label>
                    <div class="col-sm-9">
                        <div class="script-panel" id="content"><?php echo $dto -> getContent(); ?></div>
                        <textarea class="script-textarea" name="content"></textarea>
                    </div>
                </div>
                <div class="form-group field-ace">
                    <label class="control-label col-sm-2">CSS</label>
                    <div class="col-sm-9">
                        <div class="script-panel" id="css"><?php echo $dto -> getCss(); ?></div>
                        <textarea class="script-textarea" name="css"></textarea>
                    </div>
                </div>
                <div class="form-group field-ace">
                    <label class="control-label col-sm-2">JS</label>
                    <div class="col-sm-9">
                        <div class="script-panel" id="js"><?php echo $dto -> getJs(); ?></div>
                        <textarea class="script-textarea" name="js"></textarea>
                    </div>
                </div>
                <div class="form-group field-ace">
                    <label class="control-label col-sm-2">Controller</label>
                    <div class="col-sm-9">
                        <div class="script-panel" id="controller"><?php echo $dto -> getController(); ?></div>
                        <textarea class="script-textarea" name="controller"></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-default col-sm-offset-5 col-sm-2" name="action" value="Add">
            </form>
        </div>
    </div>
</div>