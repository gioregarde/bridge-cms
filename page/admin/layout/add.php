<form action="/admin/layout/add" method="post">
    <?php if ($response -> hasErrors()) { ?>
        <label>
            <?php foreach ($response -> getErrors() as $error) { ?>
                <span>* <?php echo $error; ?></span>
            <?php } ?>
        </label>
    <?php } ?>
    <label class="field-text">
        <span>Name</span>
        <input type="text" name="name" value="<?php echo $dto -> getName(); ?>"/>
    </label>
     <label class="field-ace">
        <span>CSS</span>
        <div class="script-panel" id="css"><?php echo $dto -> getCss(); ?></div>
        <textarea class="script-textarea" name="css"></textarea>
    </label>
     <label class="field-ace">
        <span>Layout (Use header, nav, section, footer tags)</span>
        <div class="script-panel" id="layout"><?php if ($dto -> getLayout()) { echo $dto -> getLayout(); } else { ?>&lt;html&gt;
    &lt;head&gt;&lt;?php $misc = 1; require('page/layout/page.php'); $misc = 0;?&gt;&lt;/head&gt;
    &lt;body&gt;
        &lt;header&gt;&lt;?php $header = 1; require('page/layout/page.php'); $header = 0;?&gt;&lt;/header&gt;
        &lt;div class="content"&gt;&lt;?php $content = 1; require('page/layout/page.php'); $content = 0; ?&gt;&lt;/div&gt;
        &lt;div class="content"&gt;&lt;?php $content = 1; require('page/layout/page.php'); $content = 0; ?&gt;&lt;/div&gt;
        &lt;footer&gt;&lt;?php $footer = 1; require('page/layout/page.php'); $footer = 0; ?&gt;&lt;/footer&gt;
    &lt;/body&gt;
&lt;/html&gt;<?php }?></div>
        <textarea class="script-textarea" name="layout"></textarea>
    </label>
    <label>
        <input type="submit" name="action" value="Add">
    </label>
</form>