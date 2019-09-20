<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;
use http\Params;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    //добавить запись
    public function insert($params = []){
        $tableName = $this->getTableName();
        $array = (array) $this;
        unset($array[current(array_keys($array))]);
        $array = array_splice($array, 0, -1);
        $sql_key ='';
        $sql_value ='';
        foreach ($params as $value1) {
            $sql_value = $sql_value . "," . "`" . $value1. "`";
        }
        foreach ($array as $key => $value) {
            $sql_key = $sql_key . "," . "`" . $key. "`";
        }
        $sql_key = substr($sql_key, 1);
        $sql_value = substr($sql_value, 1);
        $sql = "INSERT INTO `$tableName` ($sql_key) VALUES($sql_value)";
        echo $sql;
        return $this->db->execute($sql);

    }

}