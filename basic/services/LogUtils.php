<?php
/**
 * Created by kazak1377.
 * @email: kazak1377@gmail.com
 * Date: 5/21/16
 * Time: 5:14 PM
 */

namespace app\services;


class LogUtils {
    public static function varDumpToString($var) {
        ob_start();
        var_dump($var);
        return ob_get_clean();
    }

    public static function info($var,$tag) {
        \Yii::info(self::varDumpToString($var),$tag);
    }
}