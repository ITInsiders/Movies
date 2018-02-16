<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 11.02.2018
 * Time: 20:45
 */

require_once("system/System.php");

foreach (System::getFiles("system/helpers") as $file)
        require_once("system/helpers/$file");

foreach (System::getFiles("system/objects") as $file)
    require_once("system/objects/$file");

foreach (System::getFiles("helper", ".php") as $file)
    require_once("helper/$file");

foreach (System::getFiles("system/mvc", ".php") as $file)
    require_once("system/mvc/$file");

class ROOT {
    public function __construct() {
        $view = $_GET["view"];
        $task = $_GET["task"];
        $method = $_GET["method"];

        $name = (empty($view))?$task:$view;
        if (empty($name)) $view = $name = "Home";

        $controller_name = $name . "Controller";
        $path_file = "mvc/controller/$name.php";

        if (file_exists($path_file)) {
            require($path_file);

            $controller = new $controller_name();
            if (!empty($task) && !empty($method)) $controller->$method();
            if (!empty($view)) $controller->display();
        }
        else System::Error();
    }
}
new ROOT();