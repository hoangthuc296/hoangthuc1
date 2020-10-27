
<?php include 'layouts/head.php'; ?>
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

					<?php
					$id = $_GET['id'];
					$sql = mysql_query("SELECT * FROM sanpham WHERE id = $id");
					$product = mysql_fetch_array($sql);

					?>
					<section class="box-main1">
						<div class="col-md-6 text-center">
							<img src="<?php echo base_url() ?>sanpham/small/<?= $product['hinh'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">

						</div>
						<div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
							<ul id="right">
								<li><h3><?= $product['tensp'] ?> </h3></li>
								
								<li><p> <b class="price"><?php echo number_format($product['gia'],0,',','.') ?> đ
								</b>
							</p>

							
						</li>
						<li>
							<b class="price"><a href="<?= base_url() ?>addcart.php?id=<?= $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></b></li><b class="price">
							</b></ul><b class="price">
							</b></div><b class="price">

							</b></section><b class="price">
								<div class="col-md-12" id="tabdetail">
									<div class="row">

										<ul class="nav nav-tabs">
											<li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>

										</ul>
										<div class="tab-content">
											<div id="home" class="tab-pane fade in active">

												<p><?= $product['mota'] ?></p>
											</div>

										</div>
									</div>
								</div>

							</b></div>
						</div>

						<div class="container">
							<div class="col-md-4 bottom-content">
								<a href=""><img src="<?= base_url() ?>public/frontend/images/free-shipping.png"></a>
							</div>
							<div class="col-md-4 bottom-content">
								<a href=""><img src="<?= base_url() ?>public/frontend/images/guaranteed.png"></a>
							</div>
							<div class="col-md-4 bottom-content">
								<a href=""><img src="<?= base_url() ?>public/frontend/images/deal.png"></a>
							</div>
						</div>
						<div class="container-pluid">
							<section id="footer">
								<div class="container">


									<p class="text-center" style="color: #fff">Copyright © 2018 . Design by  ... !!! </p>

								</div>
							</section>


						</div>
					</div>      
				</div>
			</div>      
		</div>
		<script  src="<?= base_url()  ?>public/frontend/js/slick.min.js"></script>

	</body>

	</html>