<!DOCTYPE html>
<?php if (get_class($this) == 'BaseController' && $dto -> getId()) { ?>
    <?php require_once('resources/dynamic/layout/'.$dto -> getLayoutId().'.php'); ?>
<?php } else { ?>
    <html>
        <head>
            <?php require_once(Properties::get(Properties::PATH_MISC).$this -> layout); ?>
            <?php if ($this -> css) { ?>
                <link rel="stylesheet" type="text/css" href="<?php echo Properties::PATH_DIV.Properties::getUrlRoot().$this -> css; ?>">
            <?php } ?>
            <?php if ($this -> js) { ?>
                <script type="text/javascript" src="<?php echo Properties::PATH_DIV.Properties::getUrlRoot().$this -> js; ?>"></script>
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
<?php } ?>
