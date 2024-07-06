<?php
session_start();
require_once 'BaseModel.php';
class OrderModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "order");
    }
    function orderList()
    {

        $Select = "SELECT `id`, `state`, `price`, `delivary_user_id`, `Cart_id` FROM `order`";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }
    function BuyerOrderList($user_id)
    {

        $Select = "SELECT `id`, `state`, `price`, `delivary_user_id`, `Cart_id` FROM `order` where Buyer_id = $user_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }
    function SellersReceivablesList()
    {



        $Select = "SELECT `Items_id` ,`state`, `count` FROM `forsell`  where ( `state` = 6 OR `state` = -1)";
        $query = $this->db->prepare($Select);
        $query->execute();
        $ItemsIds = $query->fetchAll();

        if (count($ItemsIds) == 0) {
            return $ItemsIds;
        } else {
            foreach ($ItemsIds as $object) {
                $Select = "SELECT `User_id`  FROM `items`  where (id = $object->Items_id )";
                $query = $this->db->prepare($Select);
                $query->execute();
                $User_id = $query->fetchColumn();
                $Select = "SELECT  `price`  FROM `items`  where (id = $object->Items_id )";
                $query = $this->db->prepare($Select);
                $query->execute();
                $price = $query->fetchColumn();

                $object->User_id = $User_id;
                $object->price = $price;
            }
            $userCosts = [];

            foreach ($ItemsIds as $item) {
                $key = $item->User_id . '-' . $item->state;
                if (!isset($userCosts[$key])) {
                    $userCosts[$key] = (object) [
                        'User_id' => $item->User_id,
                        'total_price' => 0,
                        'state' => $item->state
                    ];
                }
                $userCosts[$key]->total_price += $item->price * $item->count;
            }
            
            // Convert the associative array back to a regular array of objects
            $userCosts = array_values($userCosts);
            
          return $userCosts;

        }
    }
    function SellerReceivablesList($User_id)
    {

        $Select = "SELECT forsell.count, forsell.Items_id,forsell.Cart_id  , items.price , forsell.state, forsell.AddDate FROM items INNER JOIN forsell on forsell. Items_id= items.id where (items.User_id =$User_id and (forsell.state=6 OR forsell.state = -1) )";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }
    function OrderToDeliverList()
    {

        $Select = "SELECT `id`, `state`, `price`, `delivary_user_id`, `Cart_id`, `buyer_address`, `buyer_number` FROM `order` WHERE state=2";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }


    function MyOrderList($user_id)
    {

        $Select = "SELECT `id`, `state`, `price`, `delivary_user_id`, `Cart_id`, `buyer_address`, `buyer_number` FROM `order` WHERE delivary_user_id=$user_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }

    public function AcceptOrder($order_id, $user_id, $Cart_id)
    {

        $update = "UPDATE `order` SET `delivary_user_id` = $user_id ,`state`=3 WHERE `id` = :order_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $update = "UPDATE `cart` SET `state`=3 WHERE `id` = :Cart_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        $stmt->execute();
        $update = "UPDATE `forsell` SET `state`=3 WHERE `Cart_id` = :Cart_id and `state`=2 ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            return "1";
        } else {
            // Print the error info
            print_r($stmt->errorInfo());
            return "2";
        }


    }

    public function Idelivered($order_id, $Cart_id)
    {

        $update = "UPDATE `order` SET `state`=4 WHERE `id` = :order_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $update = "UPDATE `cart` SET `state`=4 WHERE `id` = :Cart_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        $stmt->execute();
        $update = "UPDATE `forsell` SET `state`=4 WHERE `Cart_id` = :Cart_id and `state`=3 ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            return "1";
        } else {
            // Print the error info
            print_r($stmt->errorInfo());
            return "2";
        }


    }

    public function deliveredMoney($order_id, $Cart_id)
    {

        $update = "UPDATE `order` SET `state`=6 WHERE `id` = :order_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();
        $update = "UPDATE `cart` SET `state`=6 WHERE `id` = :Cart_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        $stmt->execute();
        $update = "UPDATE `forsell` SET `state`=6 WHERE `Cart_id` = :Cart_id and `state`=4 ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':Cart_id', $Cart_id);
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            return "1";
        } else {
            // Print the error info
            print_r($stmt->errorInfo());
            return "2";
        }


    }
    public function CreateOrder($user_id,$address,$number)
    {
    
        $totalPrice=0;
       
        for ($i = 0; $i < count($_SESSION['Cart']); $i++) {
         
            $totalPrice = $totalPrice + unserialize($_SESSION['Cart'][$i])->price*unserialize($_SESSION['Cart'][$i])->quantity;
        }
      
        $Insert = " INSERT INTO `cart`( `buyer_id`, `total_price`, `state`) 
        VALUES ($user_id,' $totalPrice','1')";  
                    
        $stmt = $this->db->prepare($Insert);
        $stmt->execute();

        $select ="SELECT `id` FROM `cart` WHERE total_price = $totalPrice";
        $stmt = $this->db->prepare($select);
        $stmt->execute();
        $cartid = $stmt->fetchColumn();
       

        $Insert = "INSERT INTO `order` (`state`, `price`, `Cart_id`, `buyer_address`, `buyer_number`, `Buyer_id`) VALUES 
        ('1', '$totalPrice', '$cartid', '$address', '$number', '$user_id')";
        $stmt = $this->db->prepare($Insert);
        $stmt->execute();
        $temp=1;
        for ($i = 0; $i < count($_SESSION['Cart']); $i++) {
            $item_id=unserialize($_SESSION['Cart'][$i])->id;
            $select ="SELECT `Store_id` FROM `items` WHERE id = $item_id ";
            $stmt = $this->db->prepare($select);
            $stmt->execute();
            $store_id = $stmt->fetchColumn();
            
            $count=unserialize($_SESSION['Cart'][$i])->quantity;
            $date=unserialize($_SESSION['Cart'][$i])->date;

            $Insert = " INSERT INTO `forsell`(`count`, `store_id`, `Items_id`, `Cart_id`, `state`, `AddDate`) 

            VALUES ('$count','$store_id',' $item_id','$cartid','1','$date')";  
                        
            $stmt = $this->db->prepare($Insert);
            if ($stmt->execute()) {
                $temp=1;;
            } else {  
              $temp=0;
              break;
            }
   
        }
        return $temp;

    }
    function orderContains($cart_id)
    {

        $Select = "SELECT forsell.count, forsell.Items_id, forsell.Cart_id, items.price,items.description, forsell.state, forsell.AddDate
        FROM items INNER JOIN forsell ON forsell.Items_id = items.id WHERE forsell.Cart_id = $cart_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }
    function orderDetails($order_id)
    {
        $Select = "SELECT `id`, `state`, `price`, `delivary_user_id`, `Cart_id` FROM `order` where id = $order_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;
    }
}
class Product
{
    public $id;
    public $price;
    public $description;
    public $quantity;

    public $AvailableQuantity;

    public $date;
    public function __construct($id, $price, $description, $quantity, $AvailableQuantity, $date)
    {
        $this->id = $id;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->AvailableQuantity = $AvailableQuantity;
        $this->date = $date;
    }

}