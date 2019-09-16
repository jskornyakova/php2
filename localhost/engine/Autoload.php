<?php

class Autoload
{

    public function loadClass($className)
    {
        //выбираем app и убираем его из пути
        $className = preg_replace('/^\w*\\\\/mi', '', $className);
        $fileName = "../" . $className . ".php";

        //меняем \ на /
        $fileName = preg_replace('/\\\\/mi', "/", $fileName);

        //проверяем наличие fileName и выводим
        if (file_exists($fileName)) {
            include $fileName;

        }

    }
}
