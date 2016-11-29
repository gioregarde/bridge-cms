<form action="/admin/file" method="post">
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
                <th></th>
                <th>Filename</th>
                <th>Size</th>
            </tr>
            <?php foreach ($dto_array as $item) { ?>
                <tr>
                    <td><input type="checkbox" name="name[]" value="<?php echo $item -> getName(); ?>"/></td>
                    <td>
                        <?php if ($item -> getType() == 'dir') { ?>
                            <a href="/admin/file?path=<?php echo $dto -> getPath().'/'.$item -> getName(); ?>"><?php echo $item -> getName(); ?></a>
                        <?php } else { echo $item -> getName(); }?>
                    </td>
                    <td><?php echo $item -> getSize(); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <label>
        <a class="button" href="/admin/file?path=<?php echo $dto -> getBackPath(); ?>">Back</a>
        <a class="button" href="/admin/file/upload">Upload</a>
        <input type="submit" name="action" value="Delete">
    </label>
</form>