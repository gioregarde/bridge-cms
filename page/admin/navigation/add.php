<form action="/admin/navigation/add" method="post">
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
        <span>Content</span>
        <div class="script-panel" id="content"><?php echo $dto -> getContent(); ?></div>
        <textarea class="script-textarea" name="content"></textarea>
    </label>
     <label class="field-ace">
        <span>CSS</span>
        <div class="script-panel" id="css"><?php echo $dto -> getCss(); ?></div>
        <textarea class="script-textarea" name="css"></textarea>
    </label>
     <label class="field-ace">
        <span>JS</span>
        <div class="script-panel" id="js"><?php echo $dto -> getJs(); ?></div>
        <textarea class="script-textarea" name="js"></textarea>
    </label>
     <label class="field-ace">
        <span>Controller</span>
        <div class="script-panel" id="controller"><?php echo $dto -> getController(); ?></div>
        <textarea class="script-textarea" name="controller"></textarea>
    </label>
    <label>
        <input type="submit" name="action" value="Add">
    </label>
</form>