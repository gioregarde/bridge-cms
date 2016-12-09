<form action="/admin/file?path=<?php echo $dto -> getPath(); ?>"" method="post" enctype="multipart/form-data">
    <?php if ($response -> hasNotifications()) { ?>
        <label>
            <?php foreach ($response -> getNotifications() as $notification) { ?>
                <span>* <?php echo $notification; ?></span>
            <?php } ?>
        </label>
    <?php } ?>
    <?php if ($response -> hasErrors()) { ?>
        <label>
            <?php foreach ($response -> getErrors() as $error) { ?>
                <span>* <?php echo $error; ?></span>
            <?php } ?>
        </label>
    <?php } ?>
    <div class="table-list">
        <table>
            <tr>
                <th>Filename</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dto_array as $item) { ?>
                <tr>
                    <td>
                        <?php if ($item -> getType() == 'dir') { ?>
                            <a href="/admin/file?path=<?php echo $dto -> getPath().'/'.$item -> getName(); ?>"><?php echo $item -> getName(); ?></a>
                        <?php } else { ?>
                            <a href="<?php echo $dto -> getFilePath().Properties::PATH_DIV.$item -> getName(); ?>" target="_blank"><?php echo $item -> getName(); ?></a>
                        <?php } ?>
                    </td>
                    <td><?php echo $item -> getSize(); ?></td>
                    <td><input type="submit" name="action" data-item="<?php echo $item -> getName(); ?>" value="Delete"></td>
                </tr>
            <?php } ?>
                <tr>
                    <td><input name="folder"/></td>
                    <td></td>
                    <td><input type="submit" name="action" value="CreateFolder"></td>
                </tr>
                <tr>
                    <td><input type="file" name="file_upload"></td>
                    <td></td>
                    <td><input type="submit" name="action" value="Upload"></td>
                </tr>
        </table>
    </div>
    <input type="hidden" name="file"/>
    <label>
        <a class="button" href="/admin/file?path=<?php echo $dto -> getBackPath(); ?>">Back</a>
    </label>
</form>