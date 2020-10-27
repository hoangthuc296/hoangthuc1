
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
					$id = $_GET['id'];
					$sql = "SELECT * FROM loaisanpham WHERE id_loai = $id";
					$cate = mysql_fetch_array(mysql_query($sql));

					?>
					<section class="box-main1">
						<h3 class="title-main"><a href=""><?= $cate['tenloaisp']?></a> </h3>
						<?php 
						$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
						$limit = 8;
						$cate_id = $rows['id_loai'];
						$products = mysql_query("SELECT * FROM sanpham  WHERE id_loai = $id");
						$total_records	= mysql_num_rows($products);

						$total_page = ceil($total_records / $limit);
						// Giới hạn current_page trong khoảng 1 đến total_page

						if ($current_page > $total_page){
							$current_page = $total_page;
						}
						else if ($current_page < 1){
							$current_page = 1;
						}

						// Tìm Start
						$start = ($current_page - 1) * $limit;
						$result = mysql_query("SELECT * FROM sanpham  WHERE id_loai = $id LIMIT $start,$limit");
						?>
						<?php while($rows = mysql_fetch_array($result)) { ?>
							<div class="showitem">
								<div class="col-md-3 item-product bor">
									<a href="detail.php?id=<?= $rows['id'] ?>">

										<img class="img-responsive" src="<?php echo base_url() ?>sanpham/small/<?= $rows['hinh'] ?>" class="" width="100%" height="180">
									</a>
									<div class="info-item">
										<a href=""><?= $rows['tensp'] ?></a>
										<p> <b class="price"><?php echo number_format($rows['gia'],0,',','.') ?> đ</b></p>
									</div>

								</div>
							</div>
						<?php }?>
					</section>
					<div style="clear: both;"></div>
					<?php
//*******************************Xuất số trang*******************************************
					if($total_records==0)
						echo "<script>alert('Dòng sản phẩm này đang được cập nhật');window.location='index.php';</script>";
					else{
						echo "<br>";

						
						for($i=1;$i<=$total_page ;$i++)
						{
							if($current_page==$i)
								echo "<a href='?id=$id&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;";
							else
								echo "<a href='?id=$id&page=".$i."'>[".$i."]</a> &nbsp;";
						}

					}

					?>
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