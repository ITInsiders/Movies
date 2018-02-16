<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 11.02.2018
 * Time: 20:37
 */

class System
{
    private static $DB = null;
    private static $Styles = array();
    private static $Scripts = array();

    public static function getDataBase() {
        if (empty(self::$DB))
            self::$DB = new DB();
        return self::$DB;
    }

    public static function getFiles($dirpath, $type = null) {
        $result = array();
        $dir = scandir($dirpath);
        foreach ($dir as $file) {
            if (!in_array($file, array(".", "..")) && !is_dir($dirpath . "/" . $file))
                if (empty($type) || strpos($file, $type))
                    $result[] = $file;
        }
        return $result;
    }

    public static function Styles($src = null) {
        if (empty($src))
            return implode("\n", System::$Styles);
        else
            System::$Styles[] = "<link rel=\"stylesheet\" href=\"$src\">";
    }

    public static function Scripts($src = null) {
        if (empty($src))
            return implode("\n", System::$Scripts);
        else
            System::$Scripts[] = "<script src=\"$src\"></script>";
    }

    public static function Error($code = 404) {
        switch (floatval($code))
        {
            case 404:
                header("Location: ERROR/404");
                break;
            default:
                header("Location: ERROR/404");
                break;
        }
        exit();
    }
}