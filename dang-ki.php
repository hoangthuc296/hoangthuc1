
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
			if ($_POST['user'] == null) {
				$error['user'] = 'Tên đăng nhập không được trống';
			}  else {
				$user = $_POST['user'];
			}

			if ($_POST['pass'] == null) {
				$error['pass'] = 'Mật khẩu không được trống';
			}  else {
				$pass = md5($_POST['pass']);
			}

			if ($_POST['passwordconfirm'] == null) {
				$error['passwordconfirm'] = 'Bạn hãy nhập lại mật khẩu';
			}  
			if ($_POST['passwordconfirm'] != $_POST['pass']) {
				$error['passwordsame'] = 'mật khẩu không khớp';
			}

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

			if (empty($error)) {
				$sql="insert into thanhvien(hoten,diachi,email,dienthoai,user,pass,hieuluc,capquyen) values('$hoten','$diachi','$email','$dienthoai','$user','$pass',1,3)";
				$kq=mysql_query($sql);
				if(!$kq)
				{
					echo "<script>alert('Có lỗi SQL! Nhập lại!');</script>";		
				}
				else 
				{
					echo "<script>alert('Chúc mừng $user! Quý khách đã đăng ký thành công! ');window.location='index.php';</script>";
				}	
			}
		}
		?>
		<div id="maincontent">
			<div class="container">
				<?php include 'layouts/sidebar.php'; ?>
				<div class="col-md-9 bor">

					<h4 class="title-main"><a href="">đăng kí thành viên</a> </h4><br>
					<section class="box-main1">
						<div class="col-md-8">
							<form action="" method="post">
								<div class="form-group">
									<label for="">Tên đăng nhập:</label>
									<input type="text" name="user" class="form-control"
									value="<?= old('user') ?>">
									<?php
									if (isset($error['user'])) echo "<p class='text-danger'>" . $error['user'];
									?>
								</div>

								<div class="form-group">
									<label for="">Mật khẩu:</label>
									<input type="password" name="pass" class="form-control"
									value="<?= old('pass') ?>">
									<?php
									if (isset($error['pass'])) echo "<p class='text-danger'>" . $error['pass'];
									?>
								</div>

								<div class="form-group">
									<label for="">Nhập lại mật khẩu:</label>
									<input type="password" name="passwordconfirm" class="form-control"
									value="<?= old('passwordconfirm') ?>">
									<?php
									if (isset($error['passwordconfirm'])) echo "<p class='text-danger'>" . $error['passwordconfirm'];

									?>
									<?php
									if (isset($error['passwordsame'])) echo "<p class='text-danger'>" . $error['passwordsame'];

									?>

								</div>

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
									<textarea rows="6" type="text" name="diachi" class="form-control">
										<?= old('diachi') ?> 
									</textarea>
									<?php
									if (isset($error['diachi'])) echo "<p class='text-danger'>" . $error['diachi'];

									?>
								</div>
								<button type="submit" class="btn btn-primary">Đăng kí</button><br><br>
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


