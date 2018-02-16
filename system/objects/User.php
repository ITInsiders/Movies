<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 16.02.2018
 * Time: 13:18
 */

class User extends Object
{
    protected function getObject($login = null)
    {
        if (empty($login)) $login = $_COOKIE["user"];
        if (empty($login)) return null;

        $this->DB->select("*")->from("users")->where("login = '$login'");
        return $this->DB->getObject();
    }
}