<form action="/admin/pages" method="post">
    <?php if ($response -> hasNotifications()) { ?>
        <label>
            <?php foreach ($response -> getNotifications() as $notification) { ?>
                <span>* <?php echo $notification; ?></span>
            <?php } ?>
        </label>
    <?php } ?>
    <label>
        <table>
            <tr>
                <th></th>
                <th>ID</th>
                <th>NAME</th>
                <th>URL</th>
                <th>ENABLED</th>
                <th>DATETIME</th>
            </tr>
            <?php foreach ($dto_array as $dto) { ?>
                <tr>
                    <td><input type="checkbox" name="page_id[]" value="<?php echo $dto -> getId(); ?>"></td>
                    <td><?php echo $dto -> getId(); ?></td>
                    <td><?php echo $dto -> getName(); ?></td>
                    <td><?php echo $dto -> getUrl(); ?></td>
                    <td><?php echo $dto -> getEnabled(); ?></td>
                    <td><?php echo $dto -> getDatetime(); ?></td>
                </tr>
            <?php } ?>
        </table>
    </label>
    <label>
        <a class="button" href="/admin/page/add">Add</a>
        <input type="submit" name="action" value="Delete">
    </label>
</form>