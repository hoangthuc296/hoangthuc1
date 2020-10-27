<?php
    session_start();
    $key = $_GET['key'];
    unset($_SESSION['cart'][$key]);

    $_SESSION['success'] = "Xoá sản phẩm trong giỏ hàng thành công";
    header("location:gio-hang.php");
?>