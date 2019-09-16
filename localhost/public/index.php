<?

use app\models\Product;
use app\models\User;
use app\interfaces\IModel;
use app\models\Cart;
use app\engine\Db;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

$cart = new Cart(new Db());
echo $cart->getCost(2);
echo $cart->clearCart();

var_dump($product);

function foo(IModel $model)
{

}