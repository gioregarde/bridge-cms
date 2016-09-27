<!DOCTYPE html>
<html>
    <head>
        <?php require_once(Properties::get(Properties::PATH_MISC).$this -> layout); ?>
        <?php if ($this -> css && file_exists($this -> css)) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo Properties::PATH_DIV.$this -> css; ?>">
         <?php } ?>
        <?php if ($this -> js && file_exists($this -> js)) { ?>
            <script type="text/javascript" src="<?php echo Properties::PATH_DIV.$this -> js; ?>"></script>
         <?php } ?>
    </head>
    <body>
        <header>
            <?php require_once(Properties::get(Properties::PATH_HEADER).$this -> layout); ?>
        </header>
        <content>
            <?php require_once($this -> view); ?>
        </content>
        <footer>
            <?php require_once(Properties::get(Properties::PATH_FOOTER).$this -> layout); ?>
        </footer>
    </body>
</html>