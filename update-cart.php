<?php
session_start();
require_once "connect.php";

$key = $_GET['key'];
$qty = $_GET['qty'];
//    $qty_pro = $_SESSION['cart'][$key];
//    $result_qty = $db->fetchID("products", $qty_pro);
//    $qty_pro1 = $result_qty['qty'];
//    if ($qty > $qty_pro1) {
//        echo 0;
//    } else {
$_SESSION['cart'][$key]['qty'] = $qty;
echo 1;
//    }


?>