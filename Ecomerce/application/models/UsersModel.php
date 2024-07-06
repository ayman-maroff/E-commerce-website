<?php
require_once 'BaseModel.php';
class UsersModel extends BaseModel
{
    public function __construct($db)
    {
        parent::__construct($db, "user");
    }

    /**
     * Get all songs from database
     */

    public function add($firstname, $lastname, $midlname, $phonenumber, $gender, $email, $hashedpass, $ROLE)
    {
        $Select = "SELECT email FROM user WHERE email = :email";
        $stmt = $this->db->prepare($Select);
        $stmt->execute([":email" => $email]);
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
            if ($ROLE == "Admin") {
                $ROl_ID = 1;
            }   elseif ($ROLE == "Seller") {

                $ROl_ID = 2;
            } elseif ($ROLE == "Buyer") {
                $ROl_ID = 3;
            }
         elseif ($ROLE == "StoreWorker") {
            $ROl_ID = 4;
        }
        elseif ($ROLE == "DelivaryWorker") {
            $ROl_ID = 5;
        }
            $hashed_ = md5($hashedpass);
            $Insert = " INSERT INTO user (`firstname`, `lastname`, `email`, `midlname`, `phonenumber`, `gender`, `hashedPasswd`, `Role_id`) 
            values( :firstname, :lastname,:email, :midlname, :phonenumber, :gender,  :hashed_, :ROl_ID)";  
                        
            $stmt = $this->db->prepare($Insert);
       
            if ($stmt->execute(array(
                ':firstname' => $firstname, ':lastname' => $lastname, ':midlname' => $midlname, ':phonenumber' => $phonenumber,
                ':gender' => $gender, ':email' => $email, ':hashed_' => $hashed_, ':ROl_ID' => $ROl_ID
            ))) {
                return "1";
            } else {
               return "2";
            }
        } else {
          return "3";
        }
    }


    public function confirm($name, $hashedpass)
    {
        $hashed = md5($hashedpass);
        $Role_id = 'Role_id';

        $Select = "SELECT firstname FROM user WHERE ( firstname = :name and hashedPasswd = :hashed )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(':name' => $name, ':hashed' => $hashed));
        $array = $stmt->fetchAll();
        $rnum = count($array);
        if ($rnum == 0) {
            // echo "<h1>Login Failed!</h1> ";
            return 0;
        } else {
            $Role_id = 'Role_id';
            $Select = "SELECT user.id as uid,Role_id,firstname,lastname FROM user WHERE ( firstname = :name and hashedPasswd = :hashed )";
            $stmt = $this->db->prepare($Select);
            $stmt->execute(array(':name' => $name, ':hashed' => $hashed));
            $array = $stmt->fetchAll();
            $rnum = count($array);

            return $array;
        }
    }
    function userslist()
    {
        $Select = "SELECT user.id as iid,firstname,midlname,lastname,email,phonenumber,gender,role.roleName FROM user INNER JOIN role on user.Role_id=role.id";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }
    function prfileUser($ID)
    {
        $Select = "SELECT * FROM user where( id = '$ID' )";
        $query = $this->db->prepare($Select);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteUser($user_id)
    {

        $this->deleteById($user_id);
    }
    public function preparetoupdate($user_id)
    {
        $Select = "SELECT user.id as iid,firstname,midlname,lastname,email,phonenumber,gender,role.roleName  FROM user INNER JOIN role on user.Role_id=role.id WHERE ( user.id = '$user_id' )";
        $stmt = $this->db->prepare($Select);
        $stmt->execute();
        $array = $stmt->fetchAll();
        $rnum = count($array);
        return $array;
    }

    public function userupdate($user_id, $firstname, $lastname, $midlname, $phonenumber, $email)
    { 
 
        
        $Select = "SELECT email FROM user WHERE (email = :email and not id=:iid)";
        $stmt = $this->db->prepare($Select);
        $stmt->execute(array(":email" => $email, ":iid" => $user_id));
        $rnum = $stmt->fetchColumn();
        if ($rnum == "") {
 
           
             $update =  " UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`midlname`='$midlname',`phonenumber`='$phonenumber' WHERE (user.id = '$user_id' )";
           
            $stmt = $this->db->prepare($update);
          
     if(  $stmt->execute())
     {
        return "1";

     }else{
        return "2";
     }
        } else {
            // echo "Someone already using this email.";
            return "3";
        }
    }
}
