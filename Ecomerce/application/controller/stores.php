<?php
class stores extends Controller
{
    function index()
    {
        header("Location:" . URL);
    }
    function StoresList()
    {
        if (in_array('StoreList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('StoreModel');
            $stores = $actionsModel->StoresList();
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/stores.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function addstore()
    {
        if (in_array('addstore', $_SESSION['UserPermissions'])) {
            if (
                isset($_POST['address']) && isset($_POST['workerId'])
            ) {
                $address = trim($_POST['address']);
                $address = strip_tags($address);
                $workerId = $_POST['workerId'];

                $model_name = $this->loadModel('StoreModel');
                if ($address == "") {
                    $_SESSION['alert_text'] = "Some feilds are empty!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "stores/StoresList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once 'application/templates/scripts.php';
                } else {
                    $_return_value = $model_name->add($address, $workerId);
                }
            } else {
                $_SESSION['alert_text'] = "Some feilds are empty!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == "1") {
                // $this->CentersList();
                $_SESSION['alert_text'] = "Add completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == '2') {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == '3') {
                $_SESSION['alert_text'] = "Some Store already has the same address!";
                $_SESSION['alert_code'] = "warning";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function prepareToUpdateStore($id)
    {
        if (in_array('StoreList', $_SESSION['UserPermissions'])) {
            $model_name = $this->loadModel('StoreModel');

            $array = $model_name->preparetoupdate($id);
            if (empty($array)) {
                $_SESSION['alert_text'] = "Invalid parameter!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } else {
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/views/admin-views/updatestore.php';
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function updateStore($id, $PreworkerId)
    {
   
        if (in_array('updatestore', $_SESSION['UserPermissions'])) {
            if (
                isset($_POST['addresss'])
            ) {
                $addresss = trim($_POST['addresss']);
                $addresss = strip_tags($addresss);
                if (isset($_POST['workerId']))
              {      
                $workerId = $_POST['workerId'];
                }else{
                    $workerId=$PreworkerId;
                }
                   

                $model_name = $this->loadModel('StoreModel');
                if ($addresss == "") {
                    $_SESSION['alert_text'] = "Some feilds are empty!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "stores/StoresList";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/admin-views/navbar.php';
                    require_once 'application/views/admin-views/sidebar.php';
                    require_once 'application/templates/scripts.php';
                } else {
                    $_return_value = $model_name->storeupdate($id, $addresss, $workerId);
                }
            } else {
                $_SESSION['alert_text'] = "Some feilds are empty!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == "1") {
                // $this->CentersList();
                $_SESSION['alert_text'] = "update completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == '2') {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
            if ($_return_value == '3') {
                $_SESSION['alert_text'] = "Some Store already has the same address!";
                $_SESSION['alert_code'] = "warning";
                $_SESSION['ref'] = "stores/StoresList";
                require_once 'application/templates/header.php';
                require_once 'application/views/admin-views/navbar.php';
                require_once 'application/views/admin-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function StoresListSeller($sellerId)
    {
        if (in_array('StoreListSeller', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('StoreModel');
            $stores = $actionsModel->StoresListSeller();
            require_once 'application/templates/header.php';
            require_once 'application/views/seller-views/navbar.php';
            require_once 'application/views/seller-views/sidebar.php';
            require_once 'application/views/seller-views/Stores.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function GetStore($workerId)
    {
        if (in_array('GetStore', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('StoreModel');
            $myStore = $actionsModel->GetStore($workerId);
            require_once 'application/templates/header.php';
            require_once 'application/views/store-worker-views/navbar.php';
            require_once 'application/views/store-worker-views/sidebar.php';
            require_once 'application/views/store-worker-views/mystore.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
}
