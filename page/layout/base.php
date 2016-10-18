<!DOCTYPE html>
<html>
    <?php if (get_class($this) == 'BaseController' && $this -> filename) { ?>
        <head>
            <style>
                <?php echo htmlspecialchars(PageUtil::getCss($this -> filename)); ?>
            </style>
            <script type="text/javascript">
                <?php echo htmlspecialchars(PageUtil::getJs($this -> filename)); ?>
            </script>
        </head>
        <body>
            <?php require_once(PageUtil::PATH_DYNAMIC_CONTROLLER.$this -> filename); ?>
            <content>
                <?php require_once(PageUtil::PATH_DYNAMIC_HTML.$this -> filename); ?>
            </content>
        </body>
    <?php } else { ?>
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
    <?php } ?>
</html>