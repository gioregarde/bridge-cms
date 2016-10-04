<?php

class ObjectUtil {

    const METHOD_GET = 'get';
    const METHOD_SET = 'set';

    static function copy($src, $dst) {
        if (!$src || !$dst) {
            return;
        }
        $src_method_list = get_class_methods($src);
        $dst_method_list = get_class_methods($dst);
        foreach ($src_method_list as $src_method) {
            if (strpos($src_method, self::METHOD_GET) !== false) {
                $dst_method = str_replace(self::METHOD_GET, self::METHOD_SET, $src_method);
                if (in_array($dst_method, $dst_method_list)) {
                    $dst -> $dst_method($src -> $src_method());
                }
            }
        }
    }

}

?>