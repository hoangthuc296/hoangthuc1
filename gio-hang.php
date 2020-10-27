
<?php include 'layouts/head.php'; ?>
<?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
	echo "<script>alert('Không có sản phẩm trong giỏ hàng');location.href='index.php'</script>";
} ?>
<body>
	<div id="wrapper">
		<!---->
		<!--HEADER-->

		<?php include 'layouts/header.php'; ?>
		<!--END HEADER-->


		<!--MENUNAV-->
		<?php include 'layouts/menu.php'; ?>
		<!--ENDMENUNAV-->
		
		<div id="maincontent">
			<div class="container">
				<?php include 'layouts/sidebar.php'; ?>
				<div class="col-md-9 bor">

					<h3 class="title-main"><a href="">giỏ hàng</a> </h3>
					<section class="box-main1">
						
						<table class="table" >
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Số lượng</th>
									<th>Giá</th>
									<th>Tổng tiền</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$stt = 1;
								$sum = 0;
								$total = 0;
								foreach ($_SESSION['cart'] as $key => $value) :
									?>
									<tr>
										<td><?= $stt ?></td>
										
										<td><?= $value['tensp'] ?></td>
										<td >

											<input min="1" type="number" value="<?= $value['qty'] ?>" class="form-control qty" style="width: 50px">

										</td>
										<td><?= number_format($value['gia'], 0, ",", "."); ?> đ</td>
										<td><?= number_format($value['gia'] * $value['qty'], 0, ",", "."); ?> đ</td>
										<td>
											<a href="" class="btn btn-info update-cart" data-key = <?= $key ?>><i class="fa fa-refresh"></i> update</a>
											<a href="remove_cart.php?key=<?= $key ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i> remove</a>
										</td>
									</tr>
									<?php
									$sum += $value['gia'] * $value['qty'];
									$_SESSION['total'] = $sum;
									?>
									<?php
									$stt++;
								endforeach;
								?>

							</tbody>

						</table>   
						<h4 class="col-md-offset-9" style="font-weight: 700;">Tổng cộng: <?= number_format($_SESSION['total'], 0, ",", "."); ?> đ </h4>
						<br>
						<div class="col-md-2 col-md-offset-6" style="padding-bottom: 20px; ">
							<?php if(!isset($_SESSION['customer_name'])): ?>
								<a href="thanh-toan.php" class="btn btn-success">Thanh toán
								</a>
								<?php else :?>
									<a href="dat-hang.php" class="btn btn-success">Đặt hàng
									</a>
								<?php endif ?>
							</div>

							<div class="col-md-4" style="padding-bottom: 20px">
								<a href="index.php" class="btn btn-success">Tiếp tục mua hàng
								</a>

							</div>
						</div>
					</div>      
				</div>
				<script  src="<?= base_url()  ?>public/frontend/js/slick.min.js"></script>

			</body>

			</html>

			<script>
				$(document).ready(function () {

					$('.update-cart').click(function (e) {

						event.preventDefault();
						var qty = $(this).parents("tr").find('.qty').val();

						var key = $(this).attr('data-key');
						$.ajax({
							url: 'update-cart.php',
							type: 'GET',
							data: {'qty': qty, 'key': key},
							success: function (data) {
								if (data == 1) {
									alert('Cập nhật giỏ hàng thành công');
									location.href = "gio-hang.php";
								}
								if (data == 0) {
									alert('Số lượng lớn hơn số lượng sản phẩm hiện có');
									location.href = "gio-hang.php";
								}
							}
						});
					});
				});
			</script>

			<div class="container-pluid">
				<section id="footer">
					<div class="container">


						<p class="text-center" style="color: #fff">Copyright © 2018 . Design by  ... !!! </p>

					</div>
				</section>


			</div>