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
            <form class="form-horizontal" action="<?php echo Properties::getUrlRoot(true); ?>/admin/navigation" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead><tr>
                            <th></th>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ENABLED</th>
                            <th>DATETIME</th>
                        </tr></thead>
                        <tbody>
                            <?php foreach ($dto_array as $dto) { ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?php echo $dto -> getId(); ?>"/></td>
                                    <td><?php echo $dto -> getId(); ?></td>
                                    <td><a href="<?php echo Properties::getUrlRoot(true); ?>/admin/navigation/edit?id=<?php echo $dto -> getId(); ?>"><?php echo $dto -> getName(); ?></a></td>
                                    <td><?php echo $dto -> getEnabled(); ?></td>
                                    <td><?php echo $dto -> getDatetime(); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-default col-sm-offset-3 col-sm-2" href="<?php echo Properties::getUrlRoot(true); ?>/admin/navigation/add">Add</a>
                <input type="submit" class="btn btn-default col-sm-offset-1 col-sm-2" name="action" value="Delete">
            </form>
        </div>
    </div>
</div>