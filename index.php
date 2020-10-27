
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
					<section id="slide" class="text-center" >
						<img src="<?= base_url() ?>public/frontend/images/slide/sl3.jpg" class="img-thumbnail">
					</section>
					<?php 
					$sql = "SELECT * FROM loaisanpham";
					$cate = mysql_query($sql);

					?>
					<?php while($rows = mysql_fetch_array($cate)) { ?>
						<section class="box-main1">
							<h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> <?= $rows['tenloaisp'] ?> </a> </h3>
							<?php 
							$cate_id = $rows['id_loai'];
							$products = mysql_query("SELECT * FROM sanpham  WHERE id_loai = $cate_id LIMIT 4	");

							?>	

							<?php while($rows = mysql_fetch_array($products)) { ?>
								<div class="showitem">
									<div class="col-md-3 item-product bor">
										<a href="detail.php?id=<?= $rows['id'] ?>">

											<img class="img-responsive" src="<?php echo base_url() ?>sanpham/small/<?= $rows['hinh'] ?>" class="" width="100%" height="180">
										</a>
										<div class="info-item">
											<a href="detail.php?id=<?= $rows['id'] ?>"><?= $rows['tensp'] ?></a>
											<p> <b class="price"><?php echo number_format($rows['gia'],0,',','.') ?> đ</b></p>
										</div>

									</div>
								</div>
							<?php }?>
						</section>
						<div style="clear: both;"></div>
					<?php }?>
				</div>
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