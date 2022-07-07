<!doctype html>
<html lang="en">

<?php
session_start();
?>

<head>

	<!-- Basic Page Needs
		================================================== -->
	<meta charset="utf-8">
	<title>SO EASY | Amstirdam Coffee</title>

	<!-- Mobile Specific Metas
		================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Construction Html5 Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Constra HTML Template v1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<!-- Themefisher Icon font -->
	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

	<!-- Animate css -->
	<link rel="stylesheet" href="plugins/animate/animate.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="plugins/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

	<!-- Start Top Header Bar -->
	<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- Site Logo -->
					<div class="logo text-left">
						<a href="index.php">
							<!-- replace logo here -->
							<svg width="500px" height="30px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40" font-family="AustinBold, Austin" font-weight="bold">
									<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
										<text id="a">
											<tspan x="-50" y="325">AMSTIRDAM COFFEE</tspan>
										</text>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- Cart -->
					<ul class="top-menu text-right list-inline">
						<li class="dropdown cart-nav dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="tf-ion-android-cart"></i>Cart</a>
							<div class="dropdown-menu cart-dropdown">
								<?php
								include("controlMenu.php");
								include("controlPesanan.php");
								$menuModel = new controlMenu();
								$pesananModel = new kontrolPesanan();
								$totalBeli = 0;
								if ($pesananModel->checkPesananIsNotEmpty()) {
								?>
									<table>
										<?php
										foreach ($_SESSION["pesanan"] as $idMenu => $jumlahItem) :

											if ($jumlahItem > 0) {

												$ambil = $menuModel->getOneMenu($idMenu);
												$subharga = $ambil[0][5] * $jumlahItem;
										?>
												<tr>
													<td style="width: 30px;"><?php echo $jumlahItem . "x"; ?> </td>
													<td style="width: 100px;"><?php echo $ambil[0][1]; ?> </td>
													<td><?php echo $subharga ?> </td>
												</tr>
											<?php } ?>
										<?php endforeach;
										?>
									</table>
									<br>
									<ul class="text-center">
										<li><a href="detailOrder.php" class="btn btn-small">Detail Order</a></li>
									</ul>
								<?php
								} else {
									echo "Tidak ada item dalam keranjang";
								} ?>
							</div>
						</li>
						<?php
						if (empty($_SESSION["user"])) {
						?>
							<li class="dropdown dropdown-slide">
								<a href="login.php" class="dropdown-toggle" data-hover="dropdown"><i></i>Login</a>
							</li>
						<?php
						} else {
						?>
							<li class="dropdown dropdown-slide">
								<a href="logout.php" class="dropdown-toggle" data-hover="dropdown"><i></i>Logout</a>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</section><!-- End Top Header Bar -->

	<div class="hero-slider">
		<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider2.png);">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-center">
						<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">KETERSEDIAAN MEJA</p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5"></h1>
						<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="detailMeja.php">LIHAT</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="products section bg-gray">
		<div class="container">
			<div class="row">
				<div class="title text-center">
					<h2>Our Products</h2>
				</div>
			</div>
			<div class="row">

				<?php
				$menu = $menuModel->checkMenuIsNotEmpty();

				?>

				<?php foreach ($menu as $menu) : ?>

					<div class="col-md-4">
						<div class="product-item">
							<div class="product-thumb">
								<!-- <span class="bage">Sale</span> -->
								<img class="img-responsive" src="upload/<?php echo $menu[4] ?>" class="product" alt="...." />
								<div class="preview-meta">
									<p style="color: white;"><?php echo $menu[2];?></p>
									<ul>
										<li>
											<a href="atc.php?idMenu=<?php echo $menu[0]; ?>" class="tf-ion-android-cart"></a>
										</li>
										<?php 
									if($menu[3] == 1){
										echo '<span class="label label-label-success"> Avalailable </span>';
									}if($menu[3] == 0){
										echo '<span class="label label-label-danger">Not Avalailable </span>';
									}
									?>
									
									</ul>
								</div>
							</div>
							<div class=nama>
								<h5 class="card-title font-weight-bold"><?php echo $menu[1] ?></h5>
								<label class="cart-text harga"><strong>Rp.</strong> <?php echo number_format($menu[5]); ?></label><br>
							</div>

							<div class="product-content">

							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<!-- Modal -->
				<div class="modal product-modal fade" id="product-modal">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="tf-ion-close"></i>
					</button>
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-body">
								<div class="row">
									<div class="col-md-8 col-sm-6 col-xs-12">
										<div class="modal-image">
											<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	<footer class="footer section text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="social-media">
						<li>
							<a href="https://instagram.com/amstirdamcoffee?utm_medium=copy_link">
								<i class="tf-ion-social-instagram"> @amstirdamcoffee</i>
							</a>
						</li>

					<p class="copyright-text">Amstirdam Coffe Malang </p>
				</div>
			</div>
		</div>
	</footer>


	<!-- 
			Essential Scripts
			=====================================-->

	<!-- Main jQuery -->
	<script src="plugins/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.1 -->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- Bootstrap Touchpin -->
	<script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
	<!-- Instagram Feed Js -->
	<script src="plugins/instafeed/instafeed.min.js"></script>
	<!-- Video Lightbox Plugin -->
	<script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
	<!-- Count Down Js -->
	<script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

	<!-- slick Carousel -->
	<script src="plugins/slick/slick.min.js"></script>
	<script src="plugins/slick/slick-animation.min.js"></script>

	<!-- Google Mapl -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
	<script type="text/javascript" src="plugins/google-map/gmap.js"></script>

	<!-- Main Js File -->
	<script src="js/script.js"></script>
</body>

</html>