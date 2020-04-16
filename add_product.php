<?php
include("include/adminheader.php");
include("database/connect.php");


//tasks to do once all the details are entered

if (isset($_POST['addthisprod'])) {

    $image = $_POST['image'];
    $Item_category = $_POST['Item_category'];
    $Item_color = $_POST['Item_color'];
    $Stone_type = $_POST['Stone_type'];
    $Material = $_POST['Material'];
    $warranty = $_POST['warranty'];
    $Item_size = $_POST['Item_size'];
    $Description = $_POST['Description'];
    $Item_price = $_POST['Item_price'];

    $sqlinsert = "INSERT INTO item(image,Item_category,Item_color,Stone_type,Material,warranty,Item_size,Description, Item_price) VALUES('$image','$Item_category','$Item_color','$Stone_type','$Material', '$warranty', '$Item_size', '$Description', '$Item_price')";
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
            <input type="text" required name="image" placeholder="Enter the item image" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <input type="text" required name="Item_category" placeholder="Rings, Bracelet, Necklace, Earring" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <input type="text" required name="Item_color" placeholder="Gold, Silver, Rose Gold" size=50 style="padding: 10px; margin-bottom: 20px;">

            <br>
            <input type="number" required name="Item_price" placeholder="Price" size=50 style="padding: 10px; margin-bottom: 20px;">

            <br>
            <input type="number" required name="Stone_type" placeholder="Stone type id" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <input type="text" required name="Material" placeholder="Material" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <input type="number" required name="warranty" placeholder="Warranty" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <input type="text" required name="Item_size" placeholder="XS, S, M, L" size=50 style="padding: 10px; margin-bottom: 20px;">
            <br>
            <textarea required name="Description" placeholder="Description" style="padding: 10px; margin-bottom: 20px;"></textarea>
            <br>
            <a href="admin_product.php" class="btn btn-dark" style="padding: 7px 40px; margin-bottom: 20px;border: solid 1px green;">Back</a>
            <input type="submit" class="btn btn-primary" required name="addthisprod" value="Add this Product" style="padding: 7px 40px; margin-bottom: 20px;">
        </form>

    </div>
<?php } ?>
<?php
include("include/footer.php");
?>