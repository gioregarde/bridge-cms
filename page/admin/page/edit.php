<div class="container-fluid top-section">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?php if ($response -> hasErrors()) { ?>
                <?php foreach ($response -> getErrors() as $error) { ?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $error; ?></strong>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" action="<?php echo Properties::getUrlRoot(true); ?>/admin/page/edit" method="post">
                <input type="hidden" name="id" value="<?php echo $dto -> getId(); ?>"/>
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="<?php echo $dto -> getName(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">URL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="url" value="<?php echo $dto -> getUrl(); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Header</label>
                    <input type="hidden" name="headerOld" value="<?php echo $dto -> getHeaderOld(); ?>" />
                    <div class="col-sm-9">
                        <select class="form-control" name="header">
                            <option value="" <?php if (!$dto -> getHeader()) echo 'select'; ?>>--</option>
                            <?php foreach ($dto -> getHeaderArray() as $header_array) { ?>
                                <option value="<?php echo $header_array['id']; ?>" <?php if ($dto -> getHeader() == $header_array['id']) echo 'selected'; ?>><?php echo $header_array['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Navigation</label>
                    <input type="hidden" name="navigationOld" value="<?php echo $dto -> getNavigationOld(); ?>" />
                    <div class="col-sm-9">
                        <select class="form-control" name="navigation">
                            <option value="" <?php if (!$dto -> getNavigation()) echo 'selected'; ?>>--</option>
                            <?php foreach ($dto -> getNavigationArray() as $navigation_array) { ?>
                                <option value="<?php echo $navigation_array['id']; ?>" <?php if ($dto -> getNavigation() == $navigation_array['id']) echo 'selected'; ?>><?php echo $navigation_array['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Footer</label>
                    <input type="hidden" name="footerOld" value="<?php echo $dto -> getFooterOld(); ?>" />
                    <div class="col-sm-9">
                        <select class="form-control" name="footer">
                            <option value="" <?php if (!$dto -> getFooter()) echo 'selected'; ?>>--</option>
                            <?php foreach ($dto -> getFooterArray() as $footer_array) { ?>
                                <option value="<?php echo $footer_array['id']; ?>" <?php if ($dto -> getFooter() == $footer_array['id']) echo 'selected'; ?>><?php echo $footer_array['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Layout</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="layoutId">
                            <?php foreach ($dto -> getLayoutArray() as $layout_array) { ?>
                                <option value="<?php echo $layout_array['id']; ?>" <?php if ($dto -> getLayoutId() == $layout_array['id']) echo 'selected'; ?> data-section-count="<?php echo $layout_array['section_count']; ?>"><?php echo $layout_array['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Contents</label>
                    <div>
                        <ul class="content-list col-sm-9">
                            <?php if (count($dto -> getContent()) == 0) { ?>
                                <li class="row">
                                    <div class="col-sm-2">
                                        <select class="form-control" name="content[]">
                                            <option value="" >--</option>
                                            <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                                                <option value="<?php echo $content_array['id']; ?>"><?php echo $content_array['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control col-sm-2" name="section[]"></select>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <?php foreach ($dto -> getContent() as $index => $content) { ?>
                                    <li class="row">
                                        <div class="col-sm-2">
                                            <select class="form-control col-sm-2" name="content[]">
                                                <option value="" >--</option>
                                                <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                                                    <option value="<?php echo $content_array['id']; ?>" <?php if ($content == $content_array['id']) echo 'selected'; ?>><?php echo $content_array['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control col-sm-2" name="section[]" data-section="<?php echo $dto -> getSection()[$index]; ?>"></select>
                                        </div>
                                        <?php if ($index != 0) { ?>
                                            <button class="content-remove btn btn-default"><i class="glyphicon glyphicon-minus"></i></button>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <li class="row"><button class="content-add btn btn-default"><i class="glyphicon glyphicon-plus"></i></button></li>
                        </ul>
                        <?php if (count($dto -> getContent()) == 0) { ?>
                            <input type="hidden" name="contentOld[]" value=""/>
                        <?php } else { ?>
                            <?php foreach ($dto -> getContent() as $index => $content) { ?>
                                <input type="hidden" name="contentOld[]" value="<?php echo $dto -> getContentOld()[$index]; ?>" />
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <input type="submit" class="btn btn-default col-sm-offset-5 col-sm-2" name="action" value="Update">
            </form>
        </div>
    </div>
</div>
<div id="contentTemplate" class="col-sm-9 hidden">
    <li class="row">
        <div class="col-sm-2">
            <select class="form-control" name="content[]">
                <option value="" >--</option>
                <?php foreach ($dto -> getContentArray() as $content_array) { ?>
                    <option value="<?php echo $content_array['id']; ?>" <?php if ($dto -> getContent() == $content_array['id']) echo 'selected'; ?>><?php echo $content_array['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control col-sm-2" name="section[]"></select>
        </div>
        <button class="content-remove btn btn-default"><i class="glyphicon glyphicon-minus"></i></button>
    </li>
</div>