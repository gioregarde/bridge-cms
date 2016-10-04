<?php

class AdminSiteController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();
        if ($this -> form -> getAction() == 'Update' && $this -> form -> valid()) {
            $site_model = new SiteModel();
            ObjectUtil::copy($this -> form, $site_model);
            SiteDao::update($site_model);
            $this -> dto = new AdminSiteDto($site_model);
        } else {
            $site_model = SiteDao::find();
            $this -> dto = new AdminSiteDto($site_model);
        }
    }

}

?>