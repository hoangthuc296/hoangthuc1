
<?php include 'layouts/head.php'; ?>

<body>
	<div id="wrapper">
		<!---->
		<!--HEADER-->
		<?php include 'layouts/header.php'; ?>

		<?php include 'layouts/menu.php'; ?>
		<!--ENDMENUNAV-->
		<?php
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$error = array();
		
			
			if ($_POST['hoten'] == null) {
				$error['hoten'] = 'Họ tên không được trống';
			}  else {
				$hoten = $_POST['hoten'];
			}

			if ($_POST['email'] == null) {
				$error['email'] = 'email không được trống';
			}  else {
				$email = $_POST['email'];
			}

			if ($_POST['dienthoai'] == null) {
				$error['dienthoai'] = 'Điện thoại không được trống';
			}  else {
				$dienthoai = $_POST['dienthoai'];
			}

			if ($_POST['diachi'] == null) {
				$error['diachi'] = 'Địa chỉ không được trống';
			}  else {
				$diachi = $_POST['diachi'];
			}

			if ($_POST['noidung'] == null) {
				$error['noidung'] = 'Nội dung không được trống';
			}  else {
				$noidung = $_POST['noidung'];
			}

			if (empty($error)) {
				$sql="insert into lienhe(hoten,email,dienthoai,diachi,noidung) values('$hoten','$email','$dienthoai','$diachi','$noidung')";
				$kq=mysql_query($sql);
				if(!$kq)
				{
					echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
				}
				else 
				{
					echo "<script>alert('cảm ơn bạn đã đóng góp ý kiến! ');window.location='index.php';</script>";
				}	
			}
		}
		?>
		<div id="maincontent">
			<div class="container">
				<?php include 'layouts/sidebar.php'; ?>
				<div class="col-md-9 bor">

					<h4 class="title-main"><a href="">Liên hệ</a> </h4><br>
					<section class="box-main1">
						<div class="col-md-8">
							<form action="" method="post">

								<div class="form-group">
									<label for="">Họ tên:</label>
									<input type="text" name="hoten" class="form-control"
									value="<?= old('hoten') ?>">
									<?php
									if (isset($error['hoten'])) echo "<p class='text-danger'>" . $error['hoten'];

									?>
								</div>

								<div class="form-group">
									<label for="">Email:</label>
									<input type="text" name="email" class="form-control"
									value="<?= old('email') ?>">
									<?php
									if (isset($error['email'])) echo "<p class='text-danger'>" . $error['email'];

									?>
								</div>


								<div class="form-group">
									<label for="">Số điện thoại:</label>
									<input type="text" name="dienthoai" class="form-control" value="<?= old('dienthoai') ?>">
									<?php
									if (isset($error['dienthoai'])) echo "<p class='text-danger'>" . $error['dienthoai'];

									?>
								</div>


								<div class="form-group">
									<label for="">Địa chỉ:</label>
									<input rows="6" type="text" name="diachi" class="form-control">
										<?= old('diachi') ?> 
									
									<?php
									if (isset($error['diachi'])) echo "<p class='text-danger'>" . $error['diachi'];

									?>
								</div>

								<div class="form-group">
									<label for="">Nội dung:</label>
									<textarea rows="6" type="text" name="noidung" class="form-control">
										<?= old('noidung') ?> 
									</textarea>
									<?php
									if (isset($error['noidung'])) echo "<p class='text-danger'>" . $error['noidung'];

									?>
								</div>

								<button type="submit" class="btn btn-primary">Gửi </button><br><br>
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


