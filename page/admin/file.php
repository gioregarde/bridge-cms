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
        <div class="col-sm-offset-1 col-sm-10">
            <form class="form-horizontal" action="<?php echo Properties::getUrlRoot(true); ?>/admin/file?path=<?php echo $dto -> getPath(); ?>"" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr>
                            <th>Filename</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($dto_array as $item) { ?>
                                <tr>
                                    <td>
                                        <?php if ($item -> getType() == 'dir') { ?>
                                            <a href="<?php echo Properties::getUrlRoot(true); ?>/admin/file?path=<?php echo $dto -> getPath().'/'.$item -> getName(); ?>"><?php echo $item -> getName(); ?></a>
                                        <?php } else { ?>
                                            <a href="<?php echo Properties::getUrlRoot(true).$dto -> getFilePath().Properties::PATH_DIV.$item -> getName(); ?>" target="_blank"><?php echo $item -> getName(); ?></a>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $item -> getSize(); ?></td>
                                    <td><input type="submit" class="btn btn-default" name="action" data-item="<?php echo $item -> getName(); ?>" value="Delete"></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td><input class="form-control" name="folder" placeholder="Enter folder name"/></td>
                                <td></td>
                                <td><input type="submit" class="btn btn-default" name="action" value="CreateFolder"></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                <i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Browse &hellip;
                                                <input type="file" name="file_upload" class="hidden">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </td>
                                <td></td>
                                <td><input type="submit" class="btn btn-default" name="action" value="Upload"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="file"/>
                <a class="btn btn-default col-sm-offset-5 col-sm-2" href="<?php echo Properties::getUrlRoot(true); ?>/admin/file?path=<?php echo $dto -> getBackPath(); ?>">Back</a>
            </form>
        </div>
    </div>
</div>