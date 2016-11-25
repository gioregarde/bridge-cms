<?php

class AdminSiteController extends BaseController {

    function __construct($path) {
        parent::__construct($path);
        $this -> layout = 'admin.php';
    }

    function action() {
        parent::action();
        authenticateForward();

        if ($this -> request -> getAction() == 'Update') {
            if ($this -> request -> valid()) {
                $site_model = new SiteModel();
                ObjectUtil::copy($this -> request, $site_model);
                $site_model -> setUserId($this -> user_id);
                SiteDao::update($site_model);
                $this -> response -> setDto(new AdminSiteDto($site_model));
                $this -> response -> addNotification('Site updated.');
            } else {
                $this -> response -> setError($this -> request -> getErrors());
                $this -> response -> setDto(new AdminSiteDto($this -> request));
            }
        } else {
            $site_model = SiteDao::find();
            $this -> response -> setDto(new AdminSiteDto($site_model));
        }
    }

}

?>