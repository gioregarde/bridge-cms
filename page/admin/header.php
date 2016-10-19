<form action="/admin/header" method="post">
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
                <th>ID</th>
                <th>NAME</th>
                <th>ENABLED</th>
                <th>DATETIME</th>
            </tr>
            <?php foreach ($dto_array as $dto) { ?>
                <tr>
                    <td><input type="checkbox" name="page_id[]" value="<?php echo $dto -> getId(); ?>"/></td>
                    <td><?php echo $dto -> getId(); ?></td>
                    <td><a href="/admin/header/edit?id=<?php echo $dto -> getId(); ?>"><?php echo $dto -> getName(); ?></a></td>
                    <td><?php echo $dto -> getEnabled(); ?></td>
                    <td><?php echo $dto -> getDatetime(); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <label>
        <a class="button" href="/admin/header/add">Add</a>
        <input type="submit" name="action" value="Delete">
    </label>
</form>