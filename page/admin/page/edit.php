<form action="<?php echo Properties::getUrlRoot(true); ?>/admin/page/edit" method="post">
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
    <label class="field-select">
        <span>Header</span>
        <input type="hidden" name="headerOld" value="<?php echo $dto -> getHeaderOld(); ?>" />
        <select name="header">
            <option value="" <?php if (!$dto -> getHeader()) echo 'select'; ?>>--</option>
            <?php foreach ($dto -> getHeaderArray() as $header_array) { ?>
                <option value="<?php echo $header_array['id']; ?>" <?php if ($dto -> getHeader() == $header_array['id']) echo 'selected'; ?>><?php echo $header_array['name']; ?></option>
            <?php } ?>
        </select> 
    </label>
    <label class="field-select">
        <span>Navigation</span>
        <input type="hidden" name="navigationOld" value="<?php echo $dto -> getNavigationOld(); ?>" />
        <select name="navigation">
            <option value="" <?php if (!$dto -> getNavigation()) echo 'selected'; ?>>--</option>
            <?php foreach ($dto -> getNavigationArray() as $navigation_array) { ?>
                <option value="<?php echo $navigation_array['id']; ?>" <?php if ($dto -> getNavigation() == $navigation_array['id']) echo 'selected'; ?>><?php echo $navigation_array['name']; ?></option>
            <?php } ?>
        </select> 
    </label>
    <label class="field-select">
        <span>Footer</span>
        <input type="hidden" name="footerOld" value="<?php echo $dto -> getFooterOld(); ?>" />
        <select name="footer">
            <option value="" <?php if (!$dto -> getFooter()) echo 'selected'; ?>>--</option>
            <?php foreach ($dto -> getFooterArray() as $footer_array) { ?>
                <option value="<?php echo $footer_array['id']; ?>" <?php if ($dto -> getFooter() == $footer_array['id']) echo 'selected'; ?>><?php echo $footer_array['name']; ?></option>
            <?php } ?>
        </select> 
    </label>
    <label class="field-select">
        <span>Layout</span>
        <select name="layoutId">
            <?php foreach ($dto -> getLayoutArray() as $layout_array) { ?>
                <option value="<?php echo $layout_array['id']; ?>" <?php if ($dto -> getLayoutId() == $layout_array['id']) echo 'selected'; ?> data-section-count="<?php echo $layout_array['section_count']; ?>"><?php echo $layout_array['name']; ?></option>
            <?php } ?>
        </select> 
    </label>
    <label class="field-ul">
        <span>Contents</span>
        <?php if (count($dto -> getContent()) == 0) { ?>
            <ul class="content-list">
                <li>
                    <select name="content[]">
                        <option value="" >--</option>
                        <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                            <option value="<?php echo $content_array['id']; ?>"><?php echo $content_array['name']; ?></option>
                        <?php } ?>
                    </select>
                    <select name="section[]"></select>
                </li>
                <li><button class="content-add">+</button></li>
            </ul>
            <input type="hidden" name="contentOld[]" value=""/>
        <?php } else { ?>
            <ul class="content-list">
                <?php foreach ($dto -> getContent() as $index => $content) { ?>
                    <li>
                        <select name="content[]">
                            <option value="" >--</option>
                            <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                                <option value="<?php echo $content_array['id']; ?>" <?php if ($content == $content_array['id']) echo 'selected'; ?>><?php echo $content_array['name']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="section[]" data-section="<?php echo $dto -> getSection()[$index]; ?>"></select>
                        <?php if ($index != 0) { ?>
                            <button class="content-remove">-</button>
                        <?php } ?>
                    </li>
                <?php } ?>
                <li><button class="content-add">+</button></li>
            </ul>
            <?php foreach ($dto -> getContent() as $index => $content) { ?>
                <input type="hidden" name="contentOld[]" value="<?php echo $dto -> getContentOld()[$index]; ?>" />
            <?php } ?>
        <?php } ?>
    </label>
    <label>
        <input type="submit" name="action" value="Update">
    </label>
</form>
<div id="contentTemplate">
    <li>
        <select name="content[]">
            <option value="" >--</option>
            <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                <option value="<?php echo $content_array['id']; ?>" <?php if ($dto -> getContent() == $content_array['id']) echo 'selected'; ?>><?php echo $content_array['name']; ?></option>
            <?php } ?>
        </select>
        <select name="section[]"></select>
        <button class="content-remove">-</button>
    </li>
</div>