<?php
include("database/connect.php");

?>

<?php
if (isset($_POST['checkout'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $country = $_POST['country'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $postal_zip = $_POST['postal_zip'];
  $apartment =  $_POST['apartment'];
  $addr = $_POST['address'];
  $address = $postal_zip;
  $total = $_POST['total'];
  $quantity = $_POST['quantity'];
  $product_id = $_POST['product_id'];
  $payment_method = $_POST['payment_method'];

  $cookie_name = "USER_PRODOC" . rand(0, 9999);
  setcookie($cookie_name, $product_id, time() + 30 * 24 * 60 * 60);
  if (!$quantity && !$product_id) {
    echo '<script>window.location="cart1.php"</script>';
  }
}
?>
<?php
include("include/header.php");

if (isset($_POST['checkout'])) {
  foreach ($_SESSION["cart"] as $key => $value) {
    $q = $value['quantity'];
    $c = $value['name'];
    $s = $value['size'];
    $t = $value['stone_type'];
    $color = $value['color'];
    $user = $_SESSION['email'];
    $sql = "INSERT INTO orders (username, firstname, Item_id, lastname, country, phone, email, address, quantity, total, payment_method, Item_category, Item_size)
            VALUES ('$user','$firstname', '$product_id', '$lastname', '$country','$phone','$email', '$address', '$q', '$total', '$payment_method', '$c', '$s')";
    $result = mysqli_query($conn, $sql);


    $sqlselect = "SELECT *  FROM Item_data where Item_id='" . $product_id. "' and  Size='" . $s . "' and type='" . $t . "' and Color='" . $color . "'";
    $roe = mysqli_query($conn, $sqlselect);
    $rowitem3 = mysqli_fetch_assoc($roe);
    // echo $sqlselect;

    $new = $rowitem3['Quantity'] - $q;
    $sr = "UPDATE Item_data SET Quantity='$new' where Item_id='" . $product_id. "' and  Size='" . $s . "' and type='" . $t . "' and Color='" . $color . "'";
    // echo $sr;
    $sq = mysqli_query($conn, $sr);
    $_SESSION['cart'] = [];
    echo '<script>window.location="thankyou.php"</script>';
  }
}
?>
<div class="site-wrap">
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post" action="checkout.php">
          <div class="site-blocks-table">

            <div class="site-wrap">

              <div class="site-section">
                <div class="container">

                  <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                      <h2 class="h3 mb-3 text-black">Checkout</h2>
                      <div class="p-3 p-lg-5 border">

                        <div class="form-group row">

                          <div class="col-md-6">
                            <label> <strong>First name:</strong></label><br>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Your First name" required><br>

                          </div>
                          <div class="col-md-6">
                            <label><strong>Last name:</strong></label><br>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Meshal" required><br>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="country" class="text-black">Country <span class="text-danger">*</span></label>
                            <select id="country" class="form-control" name="country">
                              <option value="1" disabled>Select a country</option>
                              <option value="KSA">Saudi Arabia 🇸🇦</option>
                              <option value="BH">Bahrain 🇧🇭</option>
                              <option value="KWT">Kuwait 🇰🇼</option>
                              <option value="UAE">Emirates 🇦🇪</option>
                              <option value="USA">United States 🇺🇸</option>
                              <option value="UK">United Kingdom 🇬🇧</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label> <strong>Enter a phone number:</strong></label><br>
                            <input type="tel" id="phone" name="phone" placeholder="572-144-0334" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <label>Email</label>
                            <input type="email" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z0-9.-]{1,}[.]{1}[a-zA-Z0-9]{2,}" class="form-control" id="email" placeholder="name@email.something" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="postal_zip" name="postal_zip">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
                          </div>
                        </div>

                        <div class="form-group">
                          <input type="text" name="apartment" id="apartment" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                      </div>
                    </div>


                    <div class="col-md-5">

                      <div class="row mb-5">
                        <div class="col-md-12">
                          <h2 class="h3 mb-3 text-black">Your Order</h2>
                          <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                              <thead>
                                <th>Product</th>
                                <th>Total</th>
                              </thead>
                              <tbody>

                                <?php
                                if (!empty($_SESSION["cart"])) {
                                  $total = 0;
                                  foreach ($_SESSION["cart"] as $key => $value) { ?>
                                    <tr>
                                      <input hidden name="product_id" name="product_id" value="<?php echo $value['product_id'] ?>">
                                      <td><?php echo $value['name'] ?> <strong class="mx-2">x</strong> <?php echo $value['quantity'] ?></td>
                                      <input name="quantity" hidden value="<?php echo  $value['quantity'] ?>" />
                                      <td><?php echo ($value["quantity"] * $value["price"]) ?></td>
                                    </tr>
                                <?php
                                    $total = $total + ($value["quantity"] * $value["price"]);
                                  }
                                } ?>

                                <tr>
                                  <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                  <td class="text-black">$
                                    <?php
                                    if (!empty($_SESSION["cart"])) { ?> <?php echo $total ?>
                                    <?php } else { ?> 0<?php } ?>


                                  </td>
                                  <input name="total" hidden value="
                                  <?php
                                  if (!empty($_SESSION["cart"])) { ?> <?php echo $total ?>
									                  <?php } else { ?> 0<?php } ?>
                                  ">
                                </tr>
                                <tr>
                                  <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                  <td class="text-black font-weight-bold"><strong>$


                                      <?php
                                      if (!empty($_SESSION["cart"])) { ?> <?php echo $total ?>
                                      <?php } else { ?> 0<?php } ?>

                                    </strong></td>
                                </tr>
                              </tbody>
                            </table>


                            <div class="border p-3 mb-3">
                              <h3 class="h4 mb-0">
                                <label> <input type="radio" value="Visa" name="payment_method" required />
                                  <a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">
                                    Visa</a></h3>
                              </label>

                              <div class="collapse" id="collapsecheque">
                                <div class="py-2">
                                  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div>
                              </div>
                            </div>

                            <div class="border p-3 mb-5">
                              <h3 class="h4 mb-0">
                                <label> <input type="radio" value="Paypal" name="payment_method" required />
                                  <a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">
                                    Paypal</a></h3>
                              </label>

                              <div class="collapse" id="collapsepaypal">
                                <div class="py-2">
                                  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <p>
                                <button class="btn btn-dark btn-sm height-auto px-4 py-3 " style="border: 1px solid silver" type="reset">Clear</button><button type="submit" class="btn btn-sm height-auto px-4 py-3 btn-primary" name="checkout">Place Order</button></p>
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript">
    $().ready(function() {
      <?php foreach ($_POST as $fieldName => $fieldValue) : ?>
        $("#<?php echo $fieldName; ?>").val("<?php echo htmlspecialchars($fieldValue); ?>");
      <?php endforeach; ?>
    });
  </script>

  <?php
  include("include/footer.php");
  ?>