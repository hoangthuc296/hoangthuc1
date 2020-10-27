
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

			

			if (empty($error)) {
				$sql = "SELECT * FROM thanhvien WHERE user = '$user' AND pass = '$pass'";

				$result = mysql_query($sql);

				if (mysql_numrows($result) > 0) {
					$_SESSION['customer_name'] = $user;
					// $_SESSION['customer_id'] = $result['id'];

					echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";
				}
				else {
					$_SESSION['error_login_customer'] = "Tài khoản hoặc mật khẩu không chính xác";

				}

			}
		}
		?>
		<div id="maincontent">
			<div class="container">
				<?php include 'layouts/sidebar.php'; ?>
				<div class="col-md-9 bor">

					<h4 class="title-main"><a href="">đăng nhập</a> </h4><br>
					<section class="box-main1">
						<div class="col-md-8">
							<?php if (isset($_SESSION['error_login_customer'])):?>
								<div class="text text-danger">
									<?php echo $_SESSION['error_login_customer']; session_unset();?>
								</div>
							<?php endif ?>
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

								<button type="submit" class="btn btn-primary">Đăng nhập</button><br><br>
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


