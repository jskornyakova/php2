<?

use app\models\{Product, User, Basket};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product();
$product->insert([long, opis, 10]);

