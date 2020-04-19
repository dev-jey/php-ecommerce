<?php 
include("database/connect.php");
include("include/header.php");
 ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(goldent.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>About Us</h1>
							<h2>Our website for a jewelry store, which Facilitates to You to design jewelry as you want also you can buy from the existing designs from the website. Also, our site provides for you knowledge about the types of stones and characteristics. we will put in our website some features that will help you like search and filter. our major goal is to serve the users who are interested in jewelry and who are looking to design their jewelry.</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Products.</h2>
					<p>Our site contains bracelets, earrings, knots, rings, all of which are distinguished by the presence of stones gems.</p>
				</div>
			</div>
 <!--Alhanouf sectin-->

			<div class="row">
				<?php
				$query1 = 'SELECT * FROM item';
				$results = mysqli_query($conn,$query1);
				while ($rows = mysqli_fetch_assoc($results)){ 
					?>
					<div class="col-md-4 text-center animate-box">
					<div class="product">

					<form class='selecteditem' action="item_desc.php" method="POST">
						<div class="product-grid" style="background-image:url(<?php echo $rows['image']; ?> );">
						<input type="text" name="id" hidden value="<?php echo $rows['Item_id'];?>">
							<div class="inner">
								<p>
									<button type="submit" name="selecteditem" class="icon"><i class="icon-shopping-cart"></i></button>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><button type="submit" name="selecteditem" style="outline: none; background: #fff; border: none;"><?php echo $rows['Item_category']; ?> </a></h3>

						</div>
					</form>
					</div>
				</div>
				   <?php
				}
				?>
<?php 
include("include/footer.php");
 ?>
