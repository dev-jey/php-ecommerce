<?php
include("database/connect.php");
include("include/header.php");
?>
<style type="text/css">
	.hh {
		float: left
	}

	h1 {
		color: burlywood;
		font-family: cursive;
		text-align: center
	}

	img:hover {
		box-shadow: 0 0 2px 1px burlywood;
	}

	figure figcaption {
		font-family: fantasy;
		color: darkgoldenrod
	}

	.button {
		background: none;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}

	[type=button1] {
		background: none;
		border: 2px solid darkgoldenrod;
		;
		box-shadow: 0 0 2px 1px burlywood;
		color: black;
		padding: 15px 15px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}

	[type=radio] {
		position: absolute;
		opacity: 0;
		width: 0;
		height: 0;
	}

	/* IMAGE STYLES */
	[type=radio]+img {
		cursor: pointer;
		margin: 20px;
	}

	/* CHECKED STYLES */
	[type=radio]:checked+img {
		outline: 2px solid darkgoldenrod;
		box-shadow: 0 0 2px 1px burlywood;
	}

	input[type="radio"]:checked+label {
		background-color: #FFFF00;
		outline: 2px solid darkgoldenrod;
		box-shadow: 0 0 2px 1px burlywood;
	}
</style>


<!-- Start Maram sectin-->

<hr>
<?php
if (isset($_POST['selecteditem'])) {
	$selected = $_POST['id'];
	$sql = "SELECT * FROM item where Item_id='" . $selected . "'";
	$res = mysqli_query($conn, $sql);
	$rowitem = mysqli_fetch_assoc($res);
}
$quantity = 1;
if (isset($_POST['addcart'])) {
	$color = $_POST['color'];
	$stone_type = $_POST['s2'];
	$size = $_POST['s3'];
	$product_id = $_POST['my_id'];
	$quantity = $_POST['quantity'];

	// $_SESSION['cart'] = $
	$sql = "SELECT * FROM item where Item_id='" . $product_id . "'";
	$res = mysqli_query($conn, $sql);
	$rowitem = mysqli_fetch_assoc($res);

	$error = false;
	$sql5 = "SELECT * FROM Item_data where Color='" . $color . "' and  Item_id='" . $product_id . "'";
	$res5 = mysqli_query($conn, $sql5);
	$rowitem5 = mysqli_fetch_row($res5);
	if ($res5->num_rows === 0) {
		$error = true;
		echo "<p style='color: red; font-style: all;padding: 0.3rem; font-size: 1.5rem;text-align:center;'>The color ", $color, " is out of stock. Kindly select another color.</p>";
	}


	$sql2 = "SELECT * FROM Item_data where type='" . $stone_type . "' and  Item_id='" . $product_id . "'";
	$res2 = mysqli_query($conn, $sql2);
	$rowitem2 = mysqli_fetch_row($res2);
	if ($res2->num_rows === 0) {
		$error = true;
		echo "<p style='color: red; font-style: all;padding: 0.3rem; font-size: 1.5rem;text-align:center;'>The stone type you selected is out of stock. Kindly select another stone type.</p>";
	}

	$sql3 = "SELECT * FROM Item_data where Size='" . $size . "' and  Item_id='" . $product_id . "'";
	$res3 = mysqli_query($conn, $sql3);
	$rowitem3 = mysqli_fetch_row($res3);
	if ($res3->num_rows === 0) {
		$error = true;
		echo "<p style='color: red; font-style: all;padding: 0.3rem; font-size: 1.5rem;text-align:center;'>Size ", $size, " is out of stock. Kindly select another size.</p>";
	}

	$sql4 = "SELECT *  FROM Item_data where Item_id='" . $product_id . "' and  Size='" . $size . "' and type='" . $stone_type . "' and Color='" . $color . "'" ;
	$res4 = mysqli_query($conn, $sql4);
	$rowitem4 = mysqli_fetch_assoc($res4);
	// echo $rowitem3['total'];
	if ($res4->num_rows > 0 && $rowitem4['Quantity'] === 0) {
		$error = true;
		echo "<p style='color: red; font-style: all;padding: 0.3rem; font-size: 1.5rem;text-align:center;'>",$quantity ," ",  $rowitem['Item_category'],"(s) not available. There are ", $rowitem4['Quantity'] , " item(s) remaining in stock</p>";
	}

	if ($error == false) {
		if (isset($_SESSION["cart"])) {
			$item_array_id = array_column($_SESSION["cart"], "product_id");
			if (!in_array($product_id, $item_array_id)) {
				$count = count($_SESSION["cart"]);
				$item_array = array(
					'product_id' => $product_id,
					'image' => $rowitem['image'],
					'size' => $size,
					'color' => $color,
					'stone_type' => $stone_type,
					'price' => $rowitem["Item_price"],
					'name' => $rowitem['Item_category'],
					'quantity' => $quantity,
				);
				$_SESSION["cart"][$count] = $item_array;
				echo '<script>window.location="cart1.php"</script>';
			} else {
				echo '<script>alert("Product is already Added to Cart")</script>';
				echo '<script>window.location="cart1.php"</script>';
			}
		} else {
			$item_array = array(
				'product_id' => $product_id,
				'image' => $rowitem['image'],
				'size' =>  $size,
				'color' => $color,
				'stone_type' => $stone_type,
				'price' => $rowitem["Item_price"],
				'name' => $rowitem['Item_category'],
				'quantity' => $quantity,
			);
			$_SESSION["cart"][0] = $item_array;
			echo '<script>window.location="cart1.php"</script>';
		}
	}
}
?>
<div class="row" style="display: block; width: 100%;">

	<h1><?php echo $rowitem['Item_category'] ?></h1>
	<br>
	<div class="column" style="width: 50%; float: left;">
		<figure>
			<center>
				<a target="_blank" href="<?php echo $rowitem['image'] ?>">
					<img src="<?php echo $rowitem['image'] ?>" width="50%">
				</a>
				<figcaption><?php echo $rowitem['Item_category'] ?><br></figcaption>
			</center>
		</figure>
	</div>
	<form class="selections" action="item_desc.php" method="POST" style="padding: 2rem;">
		<div class="column" style="padding: 3rem; width: 50%; float: right;">
			<!-- End Maram sectin-->
			<h4 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Available colors</h4>
			<label><input type="radio" required name="color" value="Gold"><img src="Stone/gold.png" width="100"></label>
			<label><input type="radio" required name="color" value="Silver"> <img src="Stone/silver.PNG" width="100"></label>
			<label><input type="radio" required name="color" value="Rose Gold" checked><img src="Stone/rose gold.PNG" width="100"></label>
<hr>
			<h4 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Type of stone</h4>

			<label><input type="radio" required name="s2" value="1"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/blue.png" width="50"></label>
			<label><input type="radio" required name="s2" value="2"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/black_spinel.png" width="50"></label>
			<label><input type="radio" required name="s2" value="4"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033391/storo/white.png" width="50"></label>
			<label><input type="radio" required name="s2" value="5"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/pink.png" width="50"></label>
			<label><input type="radio" required name="s2" value="6"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/orange.png" width="50"></label>
			<label><input type="radio" required name="s2" value="3"><img src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/green_beryl.png" width="50"></label>
<hr>
			<h4 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Size</h4>
			<label><input class="rad" type="radio" required name="s3" value="XS"><img style="border: solid 1px black;" src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587072504/storo/Screen_Shot_2020-04-17_at_12.27.40_AM.png" width="60"></label>
			<label><input class="rad" type="radio" required name="s3" value="S"><img style="border: solid 1px black;" src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587072504/storo/Screen_Shot_2020-04-17_at_12.27.46_AM.png" width="80"></label>
			<label><input class="rad" type="radio" required name="s3" value="M"><img style="border: solid 1px black;" src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587072504/storo/Screen_Shot_2020-04-17_at_12.27.51_AM.png" width="60"></label>
			<label><input class="rad" type="radio" required name="s3" value="L"><img style="border: solid 1px black;" src="https://res.cloudinary.com/dw675k0f5/image/upload/v1587072504/storo/Screen_Shot_2020-04-17_at_12.27.57_AM.png" width="60"></label>
<hr>
			<h4 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Quantity</h4>
			<div class="input-group mb-3" style="max-width: 80px;">
				<input type="number" class="form-control text-center" value="<?php echo $quantity ?>" min="1" name="quantity">
			</div>

			<hr>
			<details>
				<summary> Description </summary>
				<p>
					<?php echo $rowitem['Description'] ?></p>
			</details>

			<h3>Design details: </h3>
			<ul>
				<li>Color: <?php echo $rowitem['Item_color'] ?></li>
				<li>Accessory Type: <?php echo $rowitem['Item_category'] ?></li>
				<li>Proudct No. <?php echo $rowitem['Item_id'] ?></li>
				<li>Product Material: <?php echo $rowitem['Material'] ?></li>
				<li>WARRANTY: <?php echo $rowitem['warranty'] ?> Years</li>
			</ul>
			<input hidden name="my_id" value="<?php echo $rowitem['Item_id'] ?>">

			<div class="form-group">
				<button name="addcart" type="submit" value="Add to cart" class="btn btn-primary"> Add to cart </button>
			</div>
		</div>
	</form>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Help
	</button>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Help</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					To make a purchase successfully, ensure you enter the right details when making the payments.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include("include/footer.php");
?>