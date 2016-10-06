<form action="/admin/site" method="post">
    <label class="field-text">
        <span>Name</span>
        <input type="text" name="name" placeholder="Enter Site Name" value="<?php echo $dto -> getName(); ?>"/>
    </label>
    <input type="submit" name="action" value="Update">
</form>