<?php
session_start();
include 'connect.php';
$name = $_SESSION['customer_name'];
$now=date("Y-m-d H:i:s");

foreach ($_SESSION['cart'] as $key => $value) {

	$qty =  $value['qty'];

	$pro_id = $key;

	$sql = "INSERT INTO giohang(id, user, soluong, tinhtrang, ngaydat) VALUES('$pro_id','$name',$qty,'dathang', '$now')";
	$result = mysql_query($sql);

	if ($result) {
		echo "<script>alert('Quý khách đã đặt hàng thành công!');window.location='index.php'</script>";
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
	}

}
?>