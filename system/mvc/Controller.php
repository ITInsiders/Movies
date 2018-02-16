<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 13.02.2018
 * Time: 8:42
 */

abstract class Controller
{
    /**
     *
     */
    public function display() {
        $name = $this->getName();
        $method = $_GET["method"];
        $title = (empty($method))?$name:$method;

        $path_view = "mvc/view/$name/" . $name.$method . ".php";

        $model = $this->getModel();
        $items = $model->getItems();

        if (file_exists($path_view))
            require_once($path_view);
        else
            System::Error();

        if (!empty($_COOKIE["RedirectMessage"]))
            setcookie("RedirectMessage", "", time() - 1);
    }

    /**
     * @return mixed
     */
    protected function getName() {
        return str_replace("Controller", "", get_class($this));
    }

    /**
     * @param null $name
     * @return null
     */
    protected function getModel($name = null) {
        if (empty($name))
            $name = $this->getName();

        $name_model = $name . "Model";
        $path_model = "mvc/model/$name.php";
        if (file_exists($path_model)) {
            require_once($path_model);
            return new $name_model();
        } else return null;
    }

    /**
     * @param $href
     * @param null $message
     */
    protected function Redirect($href, $message = null) {
        $time = time() + 60 * 60;
        setcookie("RedirectMessage", $message, $time);
        header("Location: $href");
        exit();
    }
}