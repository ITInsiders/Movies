<?php
/**
 * Created by PhpStorm.
 * User: CEH4TOP
 * Date: 16.02.2018
 * Time: 14:11
 */

class Object
{
    protected $DB = null;

    protected function __construct() {
        $this->DB = System::getDataBase();

        foreach ($this->getObject() as $key => $value)
            $this->{$key} = $value;
    }

    protected function

    public abstract function getObject($key = null);
    public abstract function getObjects();
    public abstract function Update();
    public abstract function Delete();
    public abstract function Insert();
}