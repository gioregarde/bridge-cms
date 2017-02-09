<html>
    <head>
        <?php $misc = 1; require('page/layout/page.php'); $misc = 0;?>
    </head>
    <body>
        <?php $header = 1; require('page/layout/page.php'); $header = 0;?>
        <?php $navigation = 1; require('page/layout/page.php'); $navigation = 0;?>
        <div class="content"><?php $content = 1; require('page/layout/page.php'); $content = 0;?></div>
        <?php $footer = 1; require('page/layout/page.php'); $footer = 0;?>
    </body>
</html>