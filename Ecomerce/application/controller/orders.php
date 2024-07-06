<?php
class orders extends Controller
{
    function index()
    {
        header("Location:" . URL);
    }

    function ordersList()
    {
        if (in_array('ordersList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orders = $actionsModel->orderList();
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/orders.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function BuyerOrderList($user_id)
    {
        if (in_array('BuyerOrderList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orders = $actionsModel->BuyerOrderList($user_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/views/buyer-views/myorders.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function SellersReceivablesList()
    {
        if (in_array('SellersReceivablesList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $SellersReceivables = $actionsModel->SellersReceivablesList();
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/SellersReceivables.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function SellerReceivablesList($User_id)
    {
        if (in_array('SellerReceivablesList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $SellerReceivables = $actionsModel->SellerReceivablesList($User_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/seller-views/navbar.php';
            require_once 'application/views/seller-views/sidebar.php';
            require_once 'application/views/seller-views/SellerReceivables.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function OrderToDeliverList()
    {
        if (in_array('OrderToDeliverList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orders = $actionsModel->OrderToDeliverList();
            require_once 'application/templates/header.php';
            require_once 'application/views/delivary-views/navbar.php';
            require_once 'application/views/delivary-views/sidebar.php';
            require_once 'application/views/delivary-views/orders.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function MyOrderList()
    {
        if (in_array('MyOrderList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orders = $actionsModel->MyOrderList($_SESSION['userid']);
            require_once 'application/templates/header.php';
            require_once 'application/views/delivary-views/navbar.php';
            require_once 'application/views/delivary-views/sidebar.php';
            require_once 'application/views/delivary-views/Myorders.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function AcceptOrder($order_id, $Cart_id)
    {
        if (in_array('AcceptOrder', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $reutrn_value = $actionsModel->AcceptOrder($order_id, $_SESSION['userid'], $Cart_id);
            if ($reutrn_value == "1") {
                $_SESSION['alert_text'] = "Accept Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "orders/MyOrderList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } elseif ($reutrn_value == "2") {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "orders/OrderToDeliverList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function Idelivered($order_id, $Cart_id)
    {
        if (in_array('Idelivered', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $reutrn_value = $actionsModel->Idelivered($order_id, $Cart_id);
            if ($reutrn_value == "1") {
                $_SESSION['alert_text'] = "delivere order Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "orders/MyOrderList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } elseif ($reutrn_value == "2") {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "orders/OrderToDeliverList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function deliveredMoney($order_id, $Cart_id)
    {
        if (in_array('deliveredMoney', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $reutrn_value = $actionsModel->deliveredMoney($order_id, $Cart_id);
            if ($reutrn_value == "1") {
                $_SESSION['alert_text'] = "deliver Money Completed!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "orders/MyOrderList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } elseif ($reutrn_value == "2") {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "orders/OrderToDeliverList";
                require_once 'application/templates/header.php';
                require_once 'application/views/delivary-views/navbar.php';
                require_once 'application/views/delivary-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function CreateOrder()
    {
        if (in_array('CreateOrder', $_SESSION['UserPermissions'])) {
          $address=  $_POST['address'];
          $phone= $_POST['phone'];
            $actionsModel = $this->loadModel('OrderModel');
            $reutrn_value = $actionsModel->CreateOrder($_SESSION['userid'],$address,$phone);
            if ($reutrn_value == "1") {
                $_SESSION['IsCart'] = 0;
                $_SESSION['Cart'] = array();
                $_SESSION['alert_text'] = "The order has been created. You can track it in the order list!";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "carts/itemsListbuyer";
                require_once 'application/templates/header.php';
                require_once 'application/views/buyer-views/navbar.php';
                require_once 'application/views/buyer-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            } elseif ($reutrn_value == "2") {
                $_SESSION['alert_text'] = "An error occured!";
                $_SESSION['alert_code'] = "error";
                $_SESSION['ref'] = "carts/itemsListbuyer";
                require_once 'application/templates/header.php';
                require_once 'application/views/buyer-views/navbar.php';
                require_once 'application/views/buyer-views/sidebar.php';
                require_once 'application/templates/scripts.php';
            }

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function orderDetails($order_id)
    {
        if (in_array('orderDetails', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orderDetails = $actionsModel->orderDetails($order_id);
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/views/buyer-views/OrderDetails.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }
    function orderContains($cartid,$orderid)
    {
        if (in_array('orderContains', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('OrderModel');
            $orderContains = $actionsModel->orderContains($cartid);
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/views/buyer-views/OrderContains.php';

        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

}
