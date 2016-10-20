<form action="/admin/page/edit" method="post">
    <input type="hidden" name="id" value="<?php echo $dto -> getId(); ?>"/>
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
    <label class="field-text">
        <span>URL</span>
        <input type="text" name="url" value="<?php echo $dto -> getUrl(); ?>"/>
    </label>
    <label class="field-radio">
        <span>Header</span>
        <input type="hidden" name="headerOld" value="<?php echo $dto -> getHeaderOld(); ?>" />
        <input type="radio" name="header" value="" <?php if (!$dto -> getHeader()) echo 'checked'; ?>>None</input>
        <?php foreach ($dto -> getHeaderArray() as $header_array) { ?>
            <input type="radio" name="header" <?php if ($dto -> getHeader() == $header_array['id']) echo 'checked'; ?> value="<?php echo $header_array['id']; ?>"><?php echo $header_array['name']; ?></input>
        <?php } ?>
    </label>
    <label class="field-radio">
        <span>Navigation</span>
        <input type="hidden" name="navigationOld" value="<?php echo $dto -> getNavigationOld(); ?>" />
        <input type="radio" name="navigation" value="" <?php if (!$dto -> getNavigation()) echo 'checked'; ?>>None</input>
        <?php foreach ($dto -> getNavigationArray() as $navigation_array) { ?>
            <input type="radio" name="navigation" <?php if ($dto -> getNavigation() == $navigation_array['id']) echo 'checked'; ?> value="<?php echo $navigation_array['id']; ?>"><?php echo $navigation_array['name']; ?></input>
        <?php } ?>
    </label>
    <label class="field-radio">
        <span>Footer</span>
        <input type="hidden" name="footerOld" value="<?php echo $dto -> getFooterOld(); ?>" />
        <input type="radio" name="footer" value="" <?php if (!$dto -> getFooter()) echo 'checked'; ?>>None</input>
        <?php foreach ($dto -> getFooterArray() as $footer_array) { ?>
            <input type="radio" name="footer" <?php if ($dto -> getFooter() == $footer_array['id']) echo 'checked'; ?> value="<?php echo $footer_array['id']; ?>"><?php echo $footer_array['name']; ?></input>
        <?php } ?>
    </label>
    <label>
        <input type="submit" name="action" value="Update">
    </label>
</form>