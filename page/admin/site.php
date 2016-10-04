<form action="/admin/site" method="post">
    <input type="text" name="name" value="<?php echo $dto -> getName(); ?>"/>
    <input type="submit" name="action" value="Update">
</form>