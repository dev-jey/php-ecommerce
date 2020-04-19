<?php
include("include/adminheader.php");
include("database/connect.php");


//tasks to do once all the details are entered

if (isset($_POST['addthisprod'])) {
    $Item_category = $_POST['Item_category'];
    $Item_color = $_POST['Item_color'];
    $Stone_type = $_POST['Stone_type'];
    $Item_size = $_POST['Item_size'];

    $sqlinsert = "INSERT INTO Item_data(Item_id,Color,Size,type) VALUES('$Item_category','$Item_color','$Item_size','$Stone_type')";
    // echo $sqlinsert;
    mysqli_query($conn, $sqlinsert);
    echo '<script>window.location="adminhome.php"</script>';
}
?>

<?php if (isset($_SESSION['admin'])) { ?>
    <div class="row" style="width: 100%;
                    margin: auto;">
        <form action="add_product.php" method="POST" style="
                     width: 50%;
                    padding: 60px 100px;
                    margin: auto;
                    background-color: white;" class="mx-auto">
            <?php echo "Enter the product's details below<br><hr>"; ?>
            <div class="form-group col-md-6">
                <label for="Item_category" class="text-black">Category <span class="text-danger">*</span></label>
                <select id="Item_category" class="form-control" name="Item_category">
                    <option value="1" disabled>Select a category</option>
                    <option value="2902254">Rings</option>
                    <option value="23052434">Bracelet</option>
                    <option value="5498966">Necklace</option>
                    <option value="5464833">Earring</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Item_color" class="text-black">Color <span class="text-danger">*</span></label>
                <select id="Item_color" class="form-control" name="Item_color">
                    <option value="1" disabled>Select a color</option>
                    <option value="Gold">Gold</option>
                    <option value="Silver">Silver</option>
                    <option value="Rose Gold">Rose gold</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="Item_size" class="text-black">Size <span class="text-danger">*</span></label>
                <select id="Item_size" class="form-control" name="Item_size">
                    <option value="1" disabled>Select a size</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="Stone_type" class="text-black">Stone type <span class="text-danger">*</span></label>
                <select id="Stone_type" class="form-control" name="Stone_type">
                    <option value="0" disabled>Select a stone type</option>
                    <option value="1">Sapphire blue</option>
                    <option value="2">Black diamond</option>
                    <option value="3">Emerald</option>
                    <option value="4">Transparent gemstones</option>
                    <option value="5">Tourmaline and spinel stones</option>
                    <option value="6">Amber (kahraman)</option>
                </select>
            </div>
            <a href="admin_product.php" class="btn btn-dark" style="padding: 7px 40px; margin-bottom: 20px;border: solid 1px green;">Back</a>
            <input type="submit" class="btn btn-primary" required name="addthisprod" value="Add this Product" style="padding: 7px 40px; margin-bottom: 20px;">
        </form>

    </div>
<?php } ?>
<?php
include("include/footer.php");
?>