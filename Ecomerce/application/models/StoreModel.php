<?php
require_once 'BaseModel.php';
class StoreModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "store");
    }
    function StoresList()
    {
        $Select = "SELECT id ,address, User_id FROM store";
        $query = $this->db->prepare($Select);
        $query->execute();
        $stores = $query->fetchAll();

        $Select = "SELECT id  FROM user where (Role_id = '4' and id NOT IN (SELECT User_id from store) )";
        $query = $this->db->prepare($Select);
        $query->execute();
        $workers = $query->fetchAll();

        return array($stores, $workers);
    }


    public function add($address, $workerId)
    {
        $Select = "SELECT address FROM store WHERE address = :address";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":address" => $address]);
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {

            $Insert = "INSERT INTO store (address,User_id) 
                                values( '$address', '$workerId')";
            $stmt = $this->db->prepare($Insert);

            if ($stmt->execute()) {
                return "1";
            } else {
                return "2";
            }

        } else {
            return "3";
        }
    }
    public function preparetoupdate($id)
    {
        $Select = "SELECT id ,address, User_id FROM store where id = '$id'";
        $query = $this->db->prepare($Select);
        $query->execute();
        $array = $query->fetchAll();

        $Select = "SELECT id  FROM user where (Role_id = '4' and id NOT IN (SELECT User_id from store) )";
        $query = $this->db->prepare($Select);
        $query->execute();
        $workers = $query->fetchAll();

        return array($array, $workers);


    }

    public function storeupdate($id, $address, $workerId)

    {
      
        $Select = "SELECT address FROM store WHERE (address = :address and store.id !=:id )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":address" => $address]);
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
          
            $update = "UPDATE store SET address= '$address' ,User_id ='$workerId'  WHERE (id='$id' )";

            $stmt = $this->db->prepare($update);

            if ($stmt->execute()) {
                return "1";
            } else {
                return "2";
            }

        } else {
            return "3";
        }
    }
    function StoresListSeller()
    {
        $Select = "SELECT id ,address, User_id FROM store";
        $query = $this->db->prepare($Select);
        $query->execute();
        $stores = $query->fetchAll();
        return $stores;
    }

    function GetStore($workerid)
    {
        $Select = "SELECT id ,address, User_id FROM store where User_id= $workerid";
        $query = $this->db->prepare($Select);
        $query->execute();
        $stores = $query->fetchAll();
        return $stores;
    }
}

