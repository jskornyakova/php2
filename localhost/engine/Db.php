<?php

namespace app\engine;

class Db
{
    //получить одну запись из БД
    public function queryOne($sql, $params = [])
    {
        return $sql . "<br>";
    }

    //получить все записи из БД
    public function queryAll($sql, $params = [])
    {
        return $sql . "<br>";
    }

}