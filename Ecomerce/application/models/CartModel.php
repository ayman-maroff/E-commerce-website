<?php
require_once 'BaseModel.php';
class CartModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "cart");
    }
    function cartListA($id)
    {

        $Select = "SELECT id,buyer_id,total_price,state FROM cart where (id = $id);";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();

        $Select = "SELECT forsell.Items_id ,forsell.count, forsell.store_id,forsell.Cart_id,items.price FROM forsell INNER JOIN items on items.id = forsell.Items_id where Cart_id  = $id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $items = $query->fetchAll();

        return array($array, $items);
    }

    function cartListD($id)
    {

        $Select = "SELECT `count`, `store_id`, `Items_id`, `Cart_id`, `state`, `AddDate`,`address` FROM `forsell` INNER JOIN store on forsell.store_id=store.id WHERE Cart_id =$id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $items = $query->fetchAll();

        return  $items;
    }
   
   
}
