<?php


namespace app\models;

use app\models\Product;

class Cart extends Product
{
    public $count;
    public $cost;

    public function getTableName()
    {
        return 'cart';
    }

    public function getCost($id)
    {
        /** вычислить стоимость по одному товару
         * из БД взять товар по id, его стоимость и умножить на количество
         **/
        $tableName = $this->getTableName();
        $cost = "SELECT cost FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($cost);
    }

    public function addToCart($id, $count = 1)
    {
        //добавить в корзину товар
    }

    public function delFromCart($id, $count = 1)
    {
        //удалить из корзины товар
    }

    public function clearCart()
    {
        //очистить всю корзину
        $tableName = $this->getTableName();
        $sql = "DELETE * FROM {$tableName} WHERE 1";
        return "Все товары удалены ({$sql}) из {$tableName}<br>";
    }
}