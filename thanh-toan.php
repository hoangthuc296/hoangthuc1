
<?php include 'layouts/head.php'; ?>
<?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
	echo "<script>alert('Không có sản phẩm trong giỏ hàng');location.href='index.php'</script>";
} ?>
<style type="text/css">

</style>
<body>
	<div id="wrapper">

		<?php include 'layouts/header.php'; ?>

		<?php include 'layouts/menu.php'; ?>
		<!--ENDMENUNAV-->
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$hoten=$_POST["hoten"];
			$diachi=$_POST["diachi"];
			$email=$_POST["email"];
			$dt=$_POST["dienthoai"];
			$fax=$_POST["fax"];
			$cty=$_POST["congty"];
			$now=date("Y-m-d H:i:s");

			$sum = 0;
			$total = 0;
			foreach ($_SESSION['cart'] as $key => $value) {
				$sum += $value['gia'] * $value['qty'];
				$total = $sum;
				$qty =  $value['qty'];
				$pro_id = $key;
				$sql = "INSERT INTO hoadon(hoten, diachi, email, dienthoai, fax, cty, id, soluong, tongtien, ngaydat, tinhtrang) VALUES('$hoten', '$diachi', '$email', '$dt', '$fax', '$cty', '$pro_id', $qty, $total, '$now', 'dathang')";
				$result = mysql_query($sql);

				if ($result) {
					echo "<script>alert('Quý khách đã gửi đơn hàng thành công!');window.location='index.php'</script>";
					unset($_SESSION['cart']);
					unset($_SESSION['total']);
				}
				
			}

		}
		// unset($_SESSION['cart']);
		// unset($_SESSION['total']);
		// $_SESSION['success'] = "Lưu thông tin đơn hàng thành công";
		// header("Location:thong-bao.php");

		?>


		<div id="maincontent">
			<div class="container">
				<?php include 'layouts/sidebar.php'; ?>
				<div class="col-md-9 bor">

					<h4 class="title-main"><a href="">Thông tin thanh toán</a> </h4><br>
					<section class="box-main1">
						<div class="col-md-8">
							<form action="" method="post">
								<div class="form-group">
									<label for="">Họ tên:</label>

									<input type="text" name="hoten" class="form-control"
									value=""><span style="color:red" class="icon_require">*</span>
								</div>

								<div class="form-group">
									<label for="">Địa chỉ email:</label>
									<input type="text" name="email" class="form-control"
									value="">
									<span style="color:red" class="icon_require">*</span>
								</div>

								<div class="form-group">
									<label for="">Số điện thoại:</label>
									<input type="text" name="dienthoai" class="form-control">
									<span style="color:red" class="icon_require">*</span>
								</div>


								<div class="form-group">
									<label for="">Địa chỉ:</label>
									<textarea rows="6" type="text" name="diachi" class="form-control"></textarea>
									<span style="color:red" class="icon_require">*</span>
								</div>


								<div class="form-group">
									<label for="">Fax:</label>
									<input type="text" name="fax" class="form-control"
									value="">
								</div>


								<div class="form-group">
									<label for="">Công ty:</label>
									<input type="text" name="congty" class="form-control"
									value="">
								</div>
								<button class="btn btn-primary">Đặt hàng</button><br><br>
							</form>
						</div>
						
					</section>
				</div>
			</div>
			<script  src="<?= base_url()  ?>public/frontend/js/slick.min.js"></script>
			<div class="container-pluid">
				<section id="footer">
					<div class="container">


						<p class="text-center" style="color: #fff">Copyright © 2018 . Design by  ... !!! </p>

					</div>
				</section>


			</div>
		</body>


		</html>


