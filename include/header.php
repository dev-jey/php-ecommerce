<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script src="sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<p> <img src="logoShine.png" width="70" height="70"></p>
						<div id="fh5co-logo"><a href="index.php">Shine Bright.</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li><a href="admin.php">Admin</a></li>
							<li class="has-dropdown">
								<a href="index.php">Home</a>

							</li>
							<li><a href="stone.php">Stones</a></li>
							<?php if (isset($_SESSION['email'])) { ?>
								<li><a href="pastorders.php">Past Orders</a></li>
							<?php
							} ?>
							<li><a href="contact.php">Contact Us</a></li>
							<li class="has-dropdown">
								<?php
								if (!isset($_SESSION['email'])) { ?>
								<a href="account.php">Account</a>
									<ul class="dropdown">
										<li><a href="account.php">Sign in</a></li>
										<li><a href="sign-up.php">Sign up</a></li>
									</ul>
								<?php } ?>
							</li>

						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
									<input type="text" placeholder="Search..">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
									</span>
								</div>
							</li>
							<li class="shopping-cart"><a href="cart1.php" class="cart"><span><small><?php
																									if (!empty($_SESSION["cart"])) {
																										echo count($_SESSION["cart"]);
																									} else {
																									?> 0
											<?php } ?>
										</small><i class="icon-shopping-cart"></i></span></a>
							</li>
						</ul>
					</div>

					<div class="text-right  hidden-xs menu-2">
						<?php if (isset($_SESSION['email'])) {
						?>
							Hello, <?php echo $_SESSION["email"] ?>
							<a href="logout.php" style="background: #000; color: #fff">Logout</a>
						<?php } ?>
					</div>
				</div>

			</div>
			<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
			<i class="fa fa-chevron-circle-left" onclick="window.history.back()" style="font-size: 3.75rem; margin: auto 1rem; cursor: pointer"></i>
		</nav>