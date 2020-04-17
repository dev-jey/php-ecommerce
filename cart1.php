<?php
include("database/connect.php");
include("include/header.php");
?>
<?php
if (isset($_POST['subm'])) {
	if (isset($_SESSION['email'])) {
		echo '<script>window.location="checkout.php"</script>';
	} else {
		echo '<script>alert("Login to continue with purchase")</script>';
		echo '<script>window.location="account.php"</script>';
	}
}


if (isset($_POST['del'])) {
	$item_id = $_POST["product_id"];
	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if ($val["product_id"] == $item_id) {
				unset($_SESSION["cart"][$select]);
			}
		}
	}
}
if (isset($_POST['minus'])) {
	$item_id = $_POST["product_id"];
	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if ($val["product_id"] == $item_id) {
				if ($_SESSION["cart"][$select]["quantity"] > 1) {
					$_SESSION["cart"][$select]["quantity"] -= 1;
				}
			}
		}
	}
}
if (isset($_POST['add'])) {
	$item_id = $_POST["product_id"];
	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if ($val["product_id"] == $item_id) {
				$q = $val["quantity"];
				$sql3 = "SELECT * FROM item where In_stock > '" . $q . "' and  Item_id='" . $item_id . "'";
				$res3 = mysqli_query($conn, $sql3);
				$rowitem3 = mysqli_fetch_row($res3);
				if ($res3->num_rows === 0) {
					$error = true;
					echo "<p style='color: red; font-style: all;padding: 0.3rem; font-size: 1.5rem;text-align:center;'>Items out of stock</p>";
				} else {
					$_SESSION["cart"][$select]["quantity"] += 1;
				}
			}
		}
	}
}

?>
<div class="site-wrap">
	<div class="site-section">
		<div class="container">
			<div class="row mb-5">
				<form class="col-md-12" method="post">
					<div class="site-blocks-table">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="product-thumbnail">Image</th>
									<th class="product-name">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
									<th class="product-remove">Remove</th>
								</tr>
							</thead>
							<tbody>


								<?php
								if (!empty($_SESSION["cart"])) {
									$total = 0;
									foreach ($_SESSION["cart"] as $key => $value) {
								?>
										<tr>
											<td class="product-thumbnail">
												<img src="<?php echo $value["image"]; ?>" alt="Image" width="160" height="140">
											</td>

											<td class="product-name">
												<h2 class="h4 text-black" style="text-align: center;"><?php echo $value["name"]; ?></h2>
											</td>
											<td>$ <?php echo $value["price"]; ?></td>

											<td>
												<div class="input-group mb-3" style="max-width: 80px;">
													<div class="input-group-prepend">
														<button class="btn btn-outline-primary js-btn-minus" type="submit" name="minus">&minus;</button>
													</div>
													<input type="number" min="1" class="form-control text-center" value="<?php echo $value["quantity"] ?>">
													<div class="input-group-append">
														<button class="btn btn-outline-primary js-btn-plus" type="submit" name="add">&plus;</button>
													</div>
												</div>
											</td>

											<td><?php echo number_format($value["quantity"] * $value["price"], 2); ?></td>
											<input name="product_id" value="<?php echo $value['product_id'] ?>" hidden>
											<td><button type="submit" name="del" class="btn btn-primary height-auto btn-sm">X</button></td>
										</tr>
									<?php
										$total = $total + ($value["quantity"] * $value["price"]);
									}
									?>
									<tr>
										<td></td>
										<td colspan="3" align="right">Total</td>
										<th align="right">$ <?php echo number_format($total, 2); ?></th>
										<td></td>
									</tr>
								<?php
								} else {
								?>
									<tr>
										<td>
											<h5 style="color: red;">Cart is Empty</h5>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>
				</form>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="row mb-5">
						<div class="col-md-6">


							<div class="form-group">
								<p><a href="index.php" class="btn btn-sm height-auto px-4 py-3 btn-primary">Continue Shopping</a></p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 pl-5">
					<div class="row justify-content-end">
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-12 text-left border-bottom mb-5">
									<h3 class="text-black h4 text-uppercase">Cart Totals</h3>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4">
									<span class="text-black">Subtotal</span>
								</div>
								<div class="col-md-6 text-right">
									$
									<strong class="text-black"> <?php
																if (!empty($_SESSION["cart"])) {
																	echo number_format($total, 2);
																} else {
																?>0<?php
																} ?>
									</strong>
								</div>
							</div>
							<div class="row mb-5">
								<div class="col-md-4">
									<span class="text-black">Total</span>
								</div>
								<div class="col-md-6 text-right">
									<strong class="text-black"><?php
																if (!empty($_SESSION["cart"])) {
																	echo number_format($total, 2);
																} else {
																?>0<?php
																} ?></strong>
								</div>
							</div>
<br>
							<div class="row">
								<form action="cart1.php" method="POST">
									<div class="col-md-12">
										<button type="submit" name="subm" class="btn btn-primary btn-lg btn-block">Proceed To Checkout</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php
include("include/footer.php");
?>