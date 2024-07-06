<?php
require_once 'BaseModel.php';
class ItemsModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "items");
    }
    function ItemsList($Store_id)
    {

        $Select = "SELECT  id , description ,price , count, User_id , Store_id  FROM items where Store_id = $Store_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }
    function ItemsListWorker($Store_id)
    {

        $Select = "SELECT  id , description ,price , count,state,image, User_id , Store_id  FROM items where Store_id = $Store_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }
    function itemsListSeller($Seller_id)
    {

        $Select = "SELECT  id , description ,price , state,count,image, User_id , Store_id  FROM items where User_id = $Seller_id";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }


    function itemsListbuyer()
    {

        $Select = "SELECT  id , description ,price , state,count,image, User_id , Store_id  FROM items where state=1";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }
    public function AddItem($descrition, $price, $quantity, $imagename, $storeId, $SellerId)
    {
        $Insert = "INSERT INTO `items`( `description`, `price`, `state`, `count`, `image`, `User_id`, `Store_id`) 
        VALUES ('$descrition','$price','0','$quantity','$imagename','$SellerId','$storeId')";
        $stmt = $this->db->prepare($Insert);

        if ($stmt->execute()) {
            return "1";
        } else {
            return "2";
        }
    }
    public function preparetoupdateItem($Item_id)
    {

        $Select = "SELECT `id`, `description`, `price`, `state`, `count`, `image`, `User_id`, `Store_id` FROM `items` WHERE (id = :Item_id)";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(':Item_id' => $Item_id));
        $Item = $stmt->fetchAll();
        return $Item;
    }


    public function updateItem($description, $price, $quantity, $target_file, $item_id, $state)
    {

        if ($state != -1) {

            $update = "UPDATE `items` SET `description`='$description',`price`='$price',`state`='$state',`count`='$quantity',`image`='$target_file' WHERE (id = $item_id)";
            $stmt = $this->db->prepare($update);
            if ($stmt->execute()) {
                return "1";
            } else {
                return "2";
            }
        } else {

            $update = "UPDATE `items` SET `description`='$description',`price`='$price',`count`='$quantity',`image`='$target_file' WHERE (id = $item_id)";
            $stmt = $this->db->prepare($update);
            if ($stmt->execute()) {
                return "1";
            } else {
                return "2";
            }
        }

    }
    public function deleteItem($Item_id)
    {
        $this->deleteById($Item_id);
        return "1";
    }

    public function ReceivedMoney($item_id, $date, $Cart_id)
    {
        $update = "UPDATE `forsell` SET `state` = -1 WHERE `Items_id` = :item_id AND `AddDate` = :date";
        $stmt = $this->db->prepare($update);
        // Bind the parameters
        $stmt->bindParam(':item_id', $item_id);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        $Select = "SELECT `count`, `store_id`, `Items_id`, `Cart_id`, `state`, `AddDate` FROM `forsell` WHERE (`Cart_id` = :Cart_id)";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(':Cart_id' => $Cart_id));
        $Item = $stmt->fetchAll();
        $temp = 1;
        foreach ($Item as $item) {
            if ($item->state == -1) {
                $temp = 1;
            } else {
                $temp = 0;
                break;
            }
        }

        if ($temp == 1) {

            $update = "UPDATE `order` SET `state`=-1 WHERE `Cart_id` = :Cart_id ";
            $stmt = $this->db->prepare($update);

            // Bind the parameters
            $stmt->bindParam(':Cart_id', $Cart_id);
            $stmt->execute();

            $update = "UPDATE `cart` SET `state`=-1 WHERE `id` = :Cart_id ";
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
        } else {
            return "1";
        }

    }
    public function StoreWorkerAccept($item_id)
    {

        $update = "UPDATE `items` SET `state` = 1 WHERE `id` = :item_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':item_id', $item_id);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            return "1";
        } else {
            // Print the error info
            print_r($stmt->errorInfo());
            return "2";
        }


    }
    public function PrepareItemsList($userId)
    {
        $Select = "SELECT id  FROM store where User_id= $userId";
        $query = $this->db->prepare($Select);
        $query->execute();
        $storeId = $query->fetchColumn();


        $Select = "SELECT forsell.count as requiredCount, items.count as orginalCount ,forsell.AddDate, forsell.Items_id,forsell.Cart_id,forsell.state , items.price ,items.description,items.image
              FROM items INNER JOIN forsell on forsell. Items_id= items.id where (items.Store_id =$storeId and (forsell.state=1 OR forsell.state=2))";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();
        return $array;

    }
    public function PrepareItem($item_id, $newcount, $Adate)
    {

        $update = "UPDATE `items` SET `count` = $newcount WHERE `id` = :item_id ";
        $stmt = $this->db->prepare($update);

        // Bind the parameters
        $stmt->bindParam(':item_id', $item_id);
        $stmt->execute();

        $Select = "SELECT `count`  FROM `items`  WHERE `id` = :item_id";
        $query1 = $this->db->prepare($Select);
        $query1->bindParam(':item_id', $item_id);
        $query1->execute();
        $itemCount = $query1->fetchColumn();
if ($itemCount == 0) {
    $update = "UPDATE `items` SET `state` = -1 WHERE `id` = :item_id ";
    $stmt = $this->db->prepare($update);

    // Bind the parameters
    $stmt->bindParam(':item_id', $item_id);
    $stmt->execute();
}

        $update2 = "UPDATE `forsell` SET `state` = 2 WHERE `Items_id` = :item_id and `AddDate`=:Adate";
        $stmt2 = $this->db->prepare($update2);

        // Bind the parameters
        $stmt2->bindParam(':item_id', $item_id);
        $stmt2->bindParam(':Adate', $Adate);
        $stmt2->execute();

        $Select = "SELECT `Cart_id`  FROM `forsell` where `AddDate`=:Adate";
        $query1 = $this->db->prepare($Select);
        $query1->bindParam(':Adate', $Adate);
        $query1->execute();
        $cartId = $query1->fetchColumn();

        $Select = "SELECT `id`  FROM `order` where `Cart_id`= :cartId";
        $query = $this->db->prepare($Select);
        $query->bindParam(':cartId', $cartId);
        $query->execute();
        $orderId = $query->fetchColumn();


        $Select = "SELECT AddDate, state FROM forsell where Cart_id= $cartId";
        $query2 = $this->db->prepare($Select);
        $query2->execute();
        $itemsStates = $query2->fetchAll();

        $temp = 1;
        foreach ($itemsStates as $obj) {
            if ($obj->state == 2) {
                $temp = 1;

            } else {
                $temp = 0;
                break;
            }
        }


        if ($temp == 1) {

            $update = "UPDATE `cart` SET `state` = 2  WHERE `id` = :cartId ";
            $stmt = $this->db->prepare($update);

            // Bind the parameters
            $stmt->bindParam(':cartId', $cartId);
            $stmt->execute();

            $update = "UPDATE `order` SET `state` = 2 WHERE `id` = :orderId ";
            $stmt = $this->db->prepare($update);

            // Bind the parameters
            $stmt->bindParam(':orderId', $orderId);
            $stmt->execute();

        }




        if ($stmt->execute()) {
            return "1";
        } else {
            // Print the error info
            print_r($stmt->errorInfo());
            return "2";
        }


    }
    public function RemoveItemFromCart($item_id, $orginalcount, $Adate,$cart_id)
    {
        if ($orginalcount == 0) {
            $update = "UPDATE `items` SET `state` = -1 WHERE `id` = :item_id ";
            $stmt = $this->db->prepare($update);

            // Bind the parameters
            $stmt->bindParam(':item_id', $item_id);
            $stmt->execute();

            $update2 = "UPDATE `forsell` SET `state` = 5 WHERE `Items_id` = :item_id and `AddDate`=:Adate ";
            $stmt2 = $this->db->prepare($update2);



            // Bind the parameters
            $stmt2->bindParam(':item_id', $item_id);
            $stmt2->bindParam(':Adate', $Adate);
            $stmt2->execute();

            $Select = "SELECT forsell.count, items.price
            FROM items INNER JOIN forsell ON forsell.Items_id = items.id WHERE forsell.Items_id = $item_id and forsell.state=5 and forsell.AddDate=$Adate ";
            $query = $this->db->prepare($Select);
            $query->execute();
            $array = $query->fetchAll();
            print_r($array);

        } else {


            $update3 = "UPDATE `forsell` SET `state` = 5 WHERE `Items_id` = :item_id and `AddDate`=:Adate";
            $stmt3 = $this->db->prepare($update3);

            // Bind the parameters
            $stmt3->bindParam(':item_id', $item_id);
            $stmt3->bindParam(':Adate', $Adate);
            $stmt3->execute();
            // Execute the statement and check for errors
            $Select = "SELECT forsell.count, items.price
            FROM items INNER JOIN forsell ON forsell.Items_id = items.id 
            WHERE forsell.Items_id = :item_id and forsell.state=5 and forsell.AddDate = :Adate";

            $query = $this->db->prepare($Select);

            // Bind parameters
            $query->bindParam(':item_id', $item_id);
            $query->bindParam(':Adate', $Adate);

            // Execute the query and handle errors

            $query->execute();
            $array = $query->fetchAll();
            $Removeprice = $array[0]->count* $array[0]->price;
            
            $Select = "SELECT price FROM `order` where Cart_id= $cart_id ";
            $query2 = $this->db->prepare($Select);
            $query2->execute();
            $correntPrice = $query2->fetchColumn();
            $newPrice= $correntPrice - $Removeprice;
            
            if(  $newPrice==0)
            {

                $update = "UPDATE `cart` SET `state` = 5 ,`price`=$newPrice WHERE `id` = :cart_id ";
                $stmt = $this->db->prepare($update);
    
                // Bind the parameters
                $stmt->bindParam(':cart_id', $cart_id);
                $stmt->execute();
    
                $update = "UPDATE `order` SET `state` = 5,`price`=$newPrice WHERE `Cart_id` = :cart_id ";
                $stmt = $this->db->prepare($update);
    
                // Bind the parameters
                $stmt->bindParam(':cart_id', $cart_id);
                $stmt->execute();
            }
            else{
                $update = "UPDATE `order` SET `price`=$newPrice WHERE `Cart_id` = :cart_id ";
                $stmt = $this->db->prepare($update);
                // Bind the parameters
                $stmt->bindParam(':cart_id', $cart_id);
                $stmt->execute();

                $update = "UPDATE `cart` SET `price`=$newPrice WHERE `id` = :cart_id ";
                $stmt = $this->db->prepare($update);
    
                // Bind the parameters
                $stmt->bindParam(':cart_id', $cart_id);
                $stmt->execute();
            }

        }


    }
}

