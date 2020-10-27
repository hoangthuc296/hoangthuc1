<?php
session_start();
require_once "connect.php";

    // if (!isset($_SESSION['customer_name'])) {
    //     echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này');location.href='index.php'</script>";

    // } else {
$id = $_GET['id'];
$product = mysql_fetch_array(mysql_query("SELECT * FROM sanpham WHERE id = $id"));
if (!isset($_SESSION['cart'][$id])) {
//        tao moi gio hang
  $_SESSION['cart'][$id]['tensp'] = $product['tensp'];
  $_SESSION['cart'][$id]['id'] = $id;
  $_SESSION['cart'][$id]['gia'] = $product['gia'];
  $_SESSION['cart'][$id]['qty'] = 1;
} else{
  $_SESSION['cart'][$id]['qty'] +=1;
}
echo "<script>alert('Thêm giỏ hàng thành công');location.href='gio-hang.php'</script>";

    // }
die();

?>
