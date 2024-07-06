<?php
// session_start();

class Items extends Controller
{
    function index()
    {
        header("Location:" . URL);
    }

    function itemsList($store_id)
    {
        if (in_array('itemsList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('ItemsModel');
            $array = $actionsModel->ItemsList($store_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/Items.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function ItemsListWorker($store_id)
    {

        if (in_array('itemsListWorker', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('ItemsModel');
            $array = $actionsModel->ItemsListWorker($store_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/store-worker-views/navbar.php';
            require_once 'application/views/store-worker-views/sidebar.php';
            require_once 'application/views/store-worker-views/Items.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function itemsListSeller($id)
    {
        if (in_array('itemsListSeller', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('ItemsModel');
            $array = $actionsModel->itemsListSeller($id);
            require_once 'application/templates/header.php';
            require_once 'application/views/seller-views/navbar.php';
            require_once 'application/views/seller-views/sidebar.php';
            require_once 'application/views/seller-views/Items.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function itemsListbuyer()
    {
        if (in_array('itemsListbuyer', $_SESSION['UserPermissions'])) {

            $actionsModel = $this->loadModel('ItemsModel');
            $array = $actionsModel->itemsListbuyer();
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/views/buyer-views/Items.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function PrepareToAddItem($storeId, $SellerId)
    {

        if (in_array('PrepareToAddItem', $_SESSION['UserPermissions'])) {
            require_once 'application/views/seller-views/addItem.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function AddItem($storeId, $SellerId)
    {
        if (in_array('AddItem', $_SESSION['UserPermissions'])) {
            if (
                isset($_FILES["ItemImage"]) && isset($_POST['price']) && isset($_POST['quantity']) &&
                isset($_POST['description'])
            ) {

                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $imagname = $_FILES["ItemImage"]["name"];
                $target_dir = "public/img/";
                $currentDateTime = date('Y-m-d_H-i-s');
                // Create a unique file name using the current date and time
                $fileName = "image_" . $currentDateTime;
                $target_file = $target_dir . $fileName . "." . strtolower(pathinfo($_FILES["ItemImage"]["name"], PATHINFO_EXTENSION));

                if (move_uploaded_file($_FILES["ItemImage"]["tmp_name"], $target_file)) {
                    $actionsModel = $this->loadModel('ItemsModel');
                    $_return_value = $actionsModel->AddItem($description, $price, $quantity, $target_file, $storeId, $SellerId);
                    if ($_return_value == "1") {
                        $_SESSION['alert_text'] = "Add Completed! wait while store worker accept them please";
                        $_SESSION['alert_code'] = "success";
                        $_SESSION['ref'] = "Items/itemsListSeller/" . $SellerId;

                        require_once 'application/templates/header.php';
                        require_once 'application/views/seller-views/navbar.php';
                        require_once 'application/views/seller-views/sidebar.php';
                        require_once 'application/templates/scripts.php';
                    } elseif ($_return_value == "2") {
                        $_SESSION['alert_text'] = "An error occured!";
                        $_SESSION['alert_code'] = "error";
                        $_SESSION['ref'] = "Items/PrepareToAddItem/" . $storeId . '/' . $SellerId;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/seller-views/navbar.php';
                        require_once 'application/views/seller-views/sidebar.php';
                        require_once 'application/templates/scripts.php';
                    }
                }

            } else {
                echo "All field are required.";
                die();
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function prepareToUpdateItem($Item_id, $User_id)
    {
        if (in_array('prepareToUpdateItem', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('ItemsModel');

            $item = $model_name->preparetoupdateItem($Item_id);

            if (empty($item)) {
                $_SESSION['alert_text'] = "Invalid parameter!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "user/index";
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/views/seller-views/UpdateItem.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateItem($item_id, $count, $SellerId)
    {

        if (in_array('updateItem', $_SESSION['UserPermissions'])) {
            if (
                isset($_FILES["ItemImage"]) && isset($_POST['price']) && isset($_POST['quantity']) &&
                isset($_POST['description'])
            ) {

                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $imagname = $_FILES["ItemImage"]["name"];
                $target_dir = "public/img/";
                $currentDateTime = date('Y-m-d_H-i-s');
                // Create a unique file name using the current date and time
                $fileName = "image_" . $currentDateTime;
                $target_file = $target_dir . $fileName . "." . strtolower(pathinfo($_FILES["ItemImage"]["name"], PATHINFO_EXTENSION));

                if (move_uploaded_file($_FILES["ItemImage"]["tmp_name"], $target_file)) {
                    $actionsModel = $this->loadModel('ItemsModel');
                    if ($count == $quantity) {
                        $state = -1;
                        $_return_value = $actionsModel->updateItem($description, $price, $quantity, $target_file, $item_id, $state);
                    } else {

                        $state = 0;
                        $_return_value = $actionsModel->updateItem($description, $price, $quantity, $target_file, $item_id, $state);
                    }

                    if ($_return_value == "1") {
                        $_SESSION['alert_text'] = "Add Completed! wait while store worker accept them please";
                        $_SESSION['alert_code'] = "success";
                        $_SESSION['ref'] = "Items/itemsListSeller/" . $SellerId;

                        require_once 'application/templates/header.php';
                        require_once 'application/views/seller-views/navbar.php';
                        require_once 'application/views/seller-views/sidebar.php';
                        require_once 'application/templates/scripts.php';
                    } elseif ($_return_value == "2") {
                        $_SESSION['alert_text'] = "An error occured!";
                        $_SESSION['alert_code'] = "error";
                        $_SESSION['ref'] = "Items/itemsListSeller/" . $SellerId;
                        require_once 'application/templates/header.php';
                        require_once 'application/views/seller-views/navbar.php';
                        require_once 'application/views/seller-views/sidebar.php';
                        require_once 'application/templates/scripts.php';
                    }
                }

            } else {
                echo "All field are required.";
                die();
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    public function prepareToDeleteItem($Item_id, $seller_id)
    {
        if (in_array('prepareToDeleteItem', $_SESSION['UserPermissions'])) {
            $_SESSION['delete_path'] = "Items/deleteItem/" . $Item_id . '/' . $seller_id;
            $_SESSION['canceled_path'] = "Items/itemsListSeller/" . $seller_id;
            require_once 'application/templates/header.php';
            require_once 'application/views/seller-views/navbar.php';
            require_once 'application/views/seller-views/sidebar.php';
            require_once 'application/templates/delete_script.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    public function deleteItem($Item_id, $seller_id)
    {
        if (in_array('deleteItem', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('ItemsModel');
            $retrn = $model_name->deleteItem($Item_id);
            if ($retrn == "1") {
                $_SESSION['alert_text'] = "Delete Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "Items/itemsListSeller/" . $seller_id;
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Delete Failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "Items/itemsListSeller/" . $seller_id;
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function ReceivedMoney($item_id, $temp, $Cart_id)
    {

        if (in_array('updateItem', $_SESSION['UserPermissions'])) {

            $actionsModel = $this->loadModel('ItemsModel');

            $_return_value = $actionsModel->ReceivedMoney($item_id, $temp, $Cart_id);
            if ($_return_value == "1") {
                $_SESSION['alert_text'] = "Transaction Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "orders/SellerReceivablesList/" . $_SESSION['userid'];
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Transaction Failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "orders/SellerReceivablesList/" . $_SESSION['userid'];
                require_once 'application/templates/header.php';
                require_once 'application/views/seller-views/navbar.php';
                require_once 'application/views/seller-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }


        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function StoreWorkerAccept($item_id, $Store_id)
    {

        if (in_array('AcceptItem', $_SESSION['UserPermissions'])) {

            $actionsModel = $this->loadModel('ItemsModel');

            $_return_value = $actionsModel->StoreWorkerAccept($item_id);

            if ($_return_value == "1") {
                $_SESSION['alert_text'] = "It has been accepted!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "Items/ItemsListWorker/" . $Store_id;
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Acceptance failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "Items/ItemsListWorker/" . $Store_id;
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }


        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function PrepareItemsList()
    {

        if (in_array('PrepareItemsList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('ItemsModel');
            $array = $actionsModel->PrepareItemsList($_SESSION['userid']);
            require_once 'application/templates/header.php';
            require_once 'application/views/store-worker-views/navbar.php';
            require_once 'application/views/store-worker-views/sidebar.php';
            require_once 'application/views/store-worker-views/PrepareSelles.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function PrepareItem($itemID, $newCount, $date)
    {


        if (in_array('PrepareItem', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('ItemsModel');
            $_return_value = $actionsModel->PrepareItem($itemID, $newCount, $date);
            if ($_return_value == "1") {
                $_SESSION['alert_text'] = "The item is prepared, ready for delivery!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "Items/PrepareItemsList";
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Acceptance failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "Items/PrepareItemsList";
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function RemoveItemFromCart($itemID, $orginalcount, $date)
    {
        if (in_array('RemoveItemFromCart', $_SESSION['UserPermissions'])) {
            $parts = explode("z", $itemID);

            $beforeZ = (int)$parts[0]; // This will contain everything before 'z'
            $afterZ =  (int)$parts[1]; // This will contain everything after 'z'
            $actionsModel = $this->loadModel('ItemsModel');
            $_return_value = $actionsModel->RemoveItemFromCart($beforeZ, $orginalcount, $date,$afterZ);
            if ($_return_value == "1") {
                $_SESSION['alert_text'] = "It has been removed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "Items/PrepareItemsList";
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                $_SESSION['alert_text'] = "Removed failed!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "Items/PrepareItemsList";
                require_once 'application/templates/header.php';
                require_once 'application/views/store-worker-views/navbar.php';
                require_once 'application/views/store-worker-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
}
