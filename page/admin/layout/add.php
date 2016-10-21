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
        <div class="script-panel" id="css"></div>
        <textarea class="script-textarea" name="css"></textarea>
    </label>
     <label class="field-ace">
        <span>Layout (Use header, nav, section, footer tags)</span>
        <div class="script-panel" id="layout"></div>
        <textarea class="script-textarea" name="layout"></textarea>
    </label>
    <label>
        <input type="submit" name="action" value="Add">
    </label>
</form>