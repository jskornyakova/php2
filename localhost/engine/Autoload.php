<?php

class Autoload
{

    public function loadClass($className)
    {
        //выбираем app и убираем его из пути, \ меняем на /
        $fileName = str_replace(['app', '\\'], [ROOT_DIR, DIRECTORY_SEPARATOR], $className) . ".php";

        //проверяем наличие fileName и выводим
        if (file_exists($fileName)) {
            include $fileName;
        }

    }
}
