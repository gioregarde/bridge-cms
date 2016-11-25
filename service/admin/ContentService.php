<?php

class AdminContentService {

    function getContent($content_id, $dto_name) {
        $model = ContentDao::findById($content_id);
        $dto = new $dto_name($model);
        $filename = PageUtil::generateFilename($model);
        $dto -> setContent(htmlspecialchars(PageUtil::getView($filename)));
        $dto -> setCss(htmlspecialchars(PageUtil::getCss($filename)));
        $dto -> setJs(htmlspecialchars(PageUtil::getJs($filename)));
        $dto -> setController(htmlspecialchars(PageUtil::getController($filename)));

        return $dto;
    }

    function insertContent($request, $content_type_id, $user_id) {
        $model = new ContentModel();
        ObjectUtil::copy($request, $model);
        $model -> setContentTypeId($content_type_id);
        $model -> setUserId($user_id);
        ContentDao::insert($model);

        $filename = PageUtil::generateFilename($model);
        PageUtil::writeView($filename, htmlspecialchars_decode($request -> getContent()));
        PageUtil::writeCss($filename, htmlspecialchars_decode($request -> getCss()));
        PageUtil::writeJs($filename, htmlspecialchars_decode($request -> getJs()));
        PageUtil::writeController($filename, htmlspecialchars_decode($request -> getController()));
        return $model;
    }

    function updateContent($request, $content_type_id, $user_id) {
        $model = new ContentModel();
        ObjectUtil::copy($request, $model);
        $model -> setContentTypeId($content_type_id);
        $model -> setUserId($user_id);
        ContentDao::update($model);

        $filename = PageUtil::generateFilename($model);
        PageUtil::writeView($filename, htmlspecialchars_decode($request -> getContent()));
        PageUtil::writeCss($filename, htmlspecialchars_decode($request -> getCss()));
        PageUtil::writeJs($filename, htmlspecialchars_decode($request -> getJs()));
        PageUtil::writeController($filename, htmlspecialchars_decode($request -> getController()));
        return $model;
    }

    function deleteContent($request, $content_type_id) {
        $success = false;
        $count = ContentDao::delete($request -> getId());
        if ($count > 0) {
            foreach ($request -> getId() as $id) {
                $model = new ContentModel();
                $model -> setId($id);
                $model -> setContentTypeId($content_type_id);

                $filename = PageUtil::generateFilename($model);
                PageUtil::deleteView($filename);
                PageUtil::deleteCss($filename);
                PageUtil::deleteJs($filename);
                PageUtil::deleteController($filename);
            }
            $success = true;
        }

        return $success;
    }



}

?>