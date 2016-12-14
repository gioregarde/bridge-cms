<?php if (isset($_POST['action']) && $_POST['action'] == 'Create') { ?>
    <?php foreach (self::$error_msg as $msg) { ?>
        <span><?php echo $msg ?></span><br>
    <?php } ?>
<?php } ?>
<form method="post">
    <label>
        <span>DB Server Name:</span>
        <input type="text" name="db_servername" value="localhost"/>
    </label>
    <br>
    <label>
        <span>DB Username:</span>
        <input type="text" name="db_username" value="root"/>
    </label>
    <br>
    <label>
        <span>DB Password:</span>
        <input type="text" name="db_password" value=""/>
    </label>
    <br>
    <label>
        <span>DB Name:</span>
        <input type="text" name="db_name" value="bridge-cms"/>
    </label>
    <br>

    <label>
        <span>Admin Username:</span>
        <input type="text" name="ad_username" value="admin"/>
    </label>
    <br>
    <label>
        <span>Admin Password:</span>
        <input type="text" name="ad_password" value="admin"/>
    </label>
    <br>

    <label>
        <span>Site Name:</span>
        <input type="text" name="st_name" value="bridge-cms"/>
    </label>
    <br>
    <input type="submit" name="action" value="Create">
</form>