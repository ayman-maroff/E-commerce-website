<?php
session_start();
class carts extends Controller
{
    function index()
    {
        header("Location:" . URL);
    }

    function cartListA($id)
    {
        if (in_array('cartList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('CartModel');
            $cartinfo = $actionsModel->cartListA($id);
            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/admin-views/cart.php';
            // require_once 'application/templates/footer.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }
    }

    function cartListD($id)
    {
        if (in_array('cartList', $_SESSION['UserPermissions'])) {
            $actionsModel = $this->loadModel('CartModel');
            $cartinfo = $actionsModel->cartListD($id);
            require_once 'application/templates/header.php';
            require_once 'application/views/delivary-views/navbar.php';
            require_once 'application/views/delivary-views/sidebar.php';
            require_once 'application/views/delivary-views/cart.php';
            // require_once 'application/templates/footer.php';
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

    function CreateCart()
    {
        if (in_array('CreateCart', $_SESSION['UserPermissions'])) {

            $_SESSION['IsCart'] = 1;

            $_SESSION['Cart'] = array();

        
 
            $_SESSION['alert_text'] = "The Cart has been Created";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "carts/itemsListbuyer";
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/templates/scripts.php';
            // require_once 'application/templates/footer.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function DeleteCart()
    {
        if (in_array('DeleteCart', $_SESSION['UserPermissions'])) {

            $_SESSION['IsCart'] = 0;

            $_SESSION['Cart'] = array();

           
 
            $_SESSION['alert_text'] = "The Cart has been deleted";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "carts/itemsListbuyer";
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/templates/scripts.php';
            // require_once 'application/templates/footer.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }

    function RemoveProductFromCart($product_date)
    {
        if (in_array('RemoveProductFromCart', $_SESSION['UserPermissions'])) {
            $_SESSION['removeCart'] = 1;
         
            for ($i = 0; $i < count($_SESSION['Cart']); $i++) {

                if (unserialize($_SESSION['Cart'][$i])->date == $product_date) {

                    unset($_SESSION['Cart'][$i]);
                   break;
                }
            }

 
            $_SESSION['alert_text'] = "The Cart has been Edited";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "carts/itemsListbuyer";
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/templates/scripts.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function EditCart()
    {
        if (in_array('CreateCart', $_SESSION['UserPermissions'])) {
            $NewQuantity = array();
            for ($i = 0; $i < count($_SESSION['Cart']); $i++) {
                if (isset($_POST[$i + 1])) {
                    $NewQuantity[$i] = $_POST[$i + 1];
                } else {

                    $_SESSION['alert_text'] = "All field are required!";
                    $_SESSION['alert_code'] = "error";
                    $_SESSION['ref'] = "carts/itemsListbuyer";
                    require_once 'application/templates/header.php';
                    require_once 'application/views/buyer-views/navbar.php';
                    require_once 'application/views/buyer-views/sidebar.php';
                    require_once 'application/templates/scripts.php';

                }


            }
            $products = array();
            $products = $_SESSION['Cart'];
            $_SESSION['Cart'] = array();

            for ($i = 0; $i < count($products); $i++) {
                $pro = unserialize($products[$i]);
                $pro->quantity = $NewQuantity[$i];
                $_SESSION['Cart'][] = serialize($pro);
            }

            $_SESSION['alert_text'] = "The Cart has been Edited";
            $_SESSION['alert_code'] = "success";
            $_SESSION['ref'] = "carts/itemsListbuyer";
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/templates/scripts.php';
            // require_once 'application/templates/footer.php';
        } else {
            echo "<h1>YOU DO NOT HAVE PERMISSION FOR THAT!</h1>";
            echo "\r\n" . "Your Permissions are: ";
            print_r($_SESSION['UserPermissions']);
        }

    }
    function addProductToCart()
    {

        if (in_array('addProductToCart', $_SESSION['UserPermissions'])) {
            if (isset($_POST['id']) && isset($_POST['Quantity']) && isset($_POST['Price']) && isset($_POST['Description']) && isset($_POST['AvailableQuantity'])) {

                // Add the product to the array
                $product = new Product($_POST['id'], $_POST['Price'], $_POST['Description'], $_POST['Quantity'], $_POST['AvailableQuantity'],date('Y-m-d_H-i-s'));
                $_SESSION['Cart'][] = serialize($product);

                $_SESSION['alert_text'] = "The product has been added to the cart";
                $_SESSION['alert_code'] = "success";
                $_SESSION['ref'] = "carts/itemsListbuyer";
                require_once 'application/templates/header.php';
                require_once 'application/views/buyer-views/navbar.php';
                require_once 'application/views/buyer-views/sidebar.php';
                require_once 'application/templates/scripts.php';

            } else {
                $_SESSION['alert_text'] = "All field are required!";
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
