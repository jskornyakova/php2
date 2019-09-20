<?php

namespace app\engine;
use app\traits\Tsingletone;

class Db
{

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];


    use Tsingletone;

    private $connection = null;

    private function getConnection() {
        if(is_null($this->connection)) {
            $this->connection = new \PDO($this->prepareDSNstring(), 
                $this->config['login'],
                $this->config['password']);

                $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function prepareDSNstring(){
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
        $this->config['driver'],
        $this->config['host'],
        $this->config['database'],
        $this->config['charset']
        );
        //return 'mysql:host=localhost;dbname=test';
    }

    private function query($sql, $params){
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params = []){
        $this->query($sql, $params);
        return true;
    }

    //получить одну запись из БД
    public function queryOne($sql, $params = [])
    {
        return $sql . "<br>";
    }

    //получить все записи из БД
    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }


}