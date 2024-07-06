<?php

error_reporting(E_ERROR | E_PARSE);
//session_start();
// $_SESSION['login_state'] = true;
/**
 * 
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if ($_SESSION['roleid'] == 1) {
            // echo "I am admin";
            // echo  $_SESSION['username'];
            //echo $_SESSION['rolename'];

            require_once 'application/templates/header.php';
            require_once 'application/views/admin-views/navbar.php';
            require_once 'application/views/admin-views/sidebar.php';
            require_once 'application/views/users/admin.php';
         //admin page
          
        } else if ($_SESSION['roleid'] == 2) {
            require_once 'application/templates/header.php';
            require_once 'application/views/seller-views/navbar.php';
            require_once 'application/views/seller-views/sidebar.php';
            require_once 'application/views/users/seller.php';
   //Seller page
           
        } else if ($_SESSION['roleid'] == 3) {
           $_SESSION['IsCart']=0; 
            require_once 'application/templates/header.php';
            require_once 'application/views/buyer-views/navbar.php';
            require_once 'application/views/buyer-views/sidebar.php';
            require_once 'application/views/users/buyer.php';
   //buyerpage
           
        } else if ($_SESSION['roleid'] ==4) {
  
            require_once 'application/templates/header.php';
            require_once 'application/views/store-worker-views/navbar.php';
            require_once 'application/views/store-worker-views/sidebar.php';
            require_once 'application/views/users/StoreWorker.php';
   //storeworker page
          
        }else if ($_SESSION['roleid'] ==5) {
  
            require_once 'application/templates/header.php';
            require_once 'application/views/delivary-views/navbar.php';
            require_once 'application/views/delivary-views/sidebar.php';
   //delivaryworker page
            
        }else {
            // echo "I am a Visiter";
            require_once 'application/views/home/index.php';
        }
    }
}
