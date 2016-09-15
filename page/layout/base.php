<!DOCTYPE html>
<html>
    <head>
        <?php require_once(Properties::get(Properties::PATH_MISC).$layout); ?>
    </head>
    <body>
        <header>
            <?php require_once(Properties::get(Properties::PATH_HEADER).$layout); ?>
        </header>
        <content>
            <?php require_once($view); ?>
        </content>
        <footer>
            <?php require_once(Properties::get(Properties::PATH_FOOTER).$layout); ?>
        </footer>
    </body>
</html>