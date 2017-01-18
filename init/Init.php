<?php

class Init {

    private static $field_name = array('db_servername' => 'DB Server Name',
                                       'db_username' => 'DB Username',
                                       'db_name' => 'DB Name',
                                       'ad_username' => 'Admin Username',
                                       'ad_password' => 'Admin Password',
                                       'st_name' => 'Site Name');
    private static $error_msg = array();
    private static $patterns = array('/init = 1/',
                                     '/db\.host = \'.*\'/',
                                     '/db\.name = \'.*\'/',
                                     '/db\.user = \'.*\'/',
                                     '/db\.pass = \'.*\'/');
    const SQL_FILE = 'resources/bridge-cms.sql';
    const INIT_PAGE = 'init/InitPage.php';

    public static function start() {
        if (Properties::get('init')) {

            // check values
            $db_servername = self::checkField('db_servername');
            $db_username = self::checkField('db_username');
            $db_password = self::checkField('db_password');
            $db_name = self::checkField('db_name');
            $ad_username = self::checkField('ad_username');
            $ad_password = self::checkField('ad_password');
            $st_name = self::checkField('st_name');

            if (count(self::$error_msg) == 0) {
                // prepare sql
                $sql = file_get_contents(self::SQL_FILE);
                $sql = str_replace('db_name', $db_name, $sql);
                $sql = str_replace('ad_username', $ad_username, $sql);
                $sql = str_replace('ad_password', sha1($ad_password), $sql);
                $sql = str_replace('st_name', $st_name, $sql);

                try {
                    $conn = new PDO('mysql:host='.$db_servername, $db_username, $db_password);
                    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn -> exec($sql);

                    $content = file_get_contents(Properties::PROPERTIES_FILE);
                    $replacements = array(
                        'init = 0',
                        'db.host = \''.$db_servername.'\'',
                        'db.name = \''.$db_name.'\'',
                        'db.user = \''.$db_username.'\'',
                        'db.pass = \''.$db_password.'\''
                    );
                    $content = preg_replace(self::$patterns, $replacements, $content);
                    file_put_contents(Properties::PROPERTIES_FILE, $content);

                    header("Refresh:0");
                } catch (PDOException $e) {
                    array_push(self::$error_msg,'System Error. Try Again');
                }
                $conn = null;

            }

            require_once(self::INIT_PAGE);
            die;
        }

    }

    public static function checkField($field) {
        $field_value = isset($_POST[$field]) ? $_POST[$field] : '';
        if ($field != 'db_password' && $field_value == '') {
            array_push(self::$error_msg, self::$field_name[$field].' is Required');
        }
        return $field_value;
    }

}

?>
