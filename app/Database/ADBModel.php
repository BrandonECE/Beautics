<?php

abstract class ADBModel {

    public abstract function insert();
    public abstract function save();
    public abstract function delete();
    public abstract function getId();
    static function __getAllRows($atributes, $conditions, $tablename){
        return DatabaseConn::getInstance()->runQuery("SELECT ". $atributes ." FROM ". $tablename ." " . $conditions);
    }

}