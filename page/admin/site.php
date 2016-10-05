<form action="/admin/site" method="post">
    <label>
        <span>Name:</span>
        <input type="text" name="name" value="<?php echo $dto -> getName(); ?>"/>
    </label>
    <input type="submit" name="action" value="Update">
</form>