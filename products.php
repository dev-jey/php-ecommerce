<?php
include("include/adminheader.php");
include("database/connect.php");
?>
<?php
if (isset($_POST['view-prods'])) {
    $category_id = $_POST['cat_id'];
    $category_name = $_POST['cat_name'];

    $sql = "SELECT * FROM item where Item_id='" . $category_id . "'";
    $res = mysqli_query($conn, $sql);
    $rowitem = mysqli_fetch_assoc($res);
    // echo $category_id, $category_name;
}
if (isset($_POST['update-changes'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $color = $_POST['updated_color'];
    $category = $_POST['updated_category'];
    $size = $_POST['updated_size'];
    $stone_type = $_POST['updated_stone_type'];
    $quantity = $_POST['updated_quantity'];
    $price = $_POST['updated_price'];



    $update_query = "UPDATE Item_data SET Color='$color', Quantity='$quantity', Item_id= '$category',price='$price', Size='$size',type='$stone_type' WHERE id = '$product_id'";
    // echo $update_query;
    try {
        // echo $update_query;
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("<p style='color: red;text-align: center'>Item updated Successfully !</p>");
            } else {
                echo ("<p style='color: red;text-align: center'>Item updated Successfully !</p>");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in update !" . $ex->getMessage());
    }
    // echo '<script>window.location="update.php"</script>';
}
if (isset($_POST['update'])) {
    echo '<script>window.location="update.php"</script>';
} elseif (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $delete_query = "DELETE FROM Item_data WHERE id = '$product_id'";
    try {
        $delete_result = mysqli_query($conn, $delete_query);
        if ($delete_result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo ("<p style='color: red;text-align: center'>Item been deleted Successfully !</p>");
            } else {
                echo ("<p style='color: red;text-align: center'>There is an error to delete an item</p>");
            }
        }
    } catch (Exception $ex) {
        echo ("Error in delete !" . $ex->getMessage());
    }
}
?>
<div class="col-md-12 d-block w-100 bg-info d-flex" style="place-items: center">
    <div class="col-md-12 mx-auto" style="margin: auto; place-items: center ">
        <br>
        <h2><?php echo $category_name ?></h2>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <form action="" method="POST">

        <?php
                    $query1 = "SELECT * FROM Item_data where Item_id='" . $category_id . "'";
                    $results = mysqli_query($conn, $query1);
                    while ($rows = mysqli_fetch_assoc($results)) {
                    ?>
            <table id="example" class="display" style="width:100%;">
                <thead>
                    <tr>
                        <th>Item Category</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><input type="text" name="Item_category" disabled value="<?php echo $category_name ?>"></td>
                            <td><input type="text" name="Item_price" disabled value="<?php echo $rows['price'] ?>"></td>
                            <td><input type="text" name="Item_size" disabled value="<?php echo $rows['Size'] ?>"></td>
                            <td><input type="text" name="Item_color" disabled value="<?php echo $rows['Color'] ?>"></td>
                            <td><input type="text" name="Category_type" disabled value="<?php echo $rows['type'] ?>"></td>
                            <td><input type="text" name="Quantity" disabled value="<?php echo $rows['Quantity'] ?>"></td>

                            <input type="text" hidden value="<?php echo $rows['id'] ?>" name="product_id">
                            <input type="text" hidden name="category_id" value="<?php echo $category_id ?>">
                            <input type="text" hidden name="category_name" value="<?php echo $category_name ?>">

                            <td>
                                <button type="button" class="btn btn-primary modale" id="modale" data-toggle="modal" data-target="#exampleModalCenter">
                                    Update
                                </button>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-sm btn-danger" name="delete" value="delete">
                            </td>
                        </tr>
                    </tfoot>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update product details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="ide"></div>
                            <h1> <input value="<?php echo $category_name ?>" name="category_name" disabled></h1>
                            <div class="form-group col-md-6">
                                <label for="Item_category" class="text-black">Category <span class="text-danger">*</span></label>
                                <select id="Item_category" class="form-control" name="updated_category">
                                    <option <?php if ($rows['Item_id'] == 1) echo 'selected'; ?> value="1" disabled>Select a category</option>
                                    <option <?php if ($rows['Item_id'] == 2902254) echo 'selected'; ?> value="2902254">Rings</option>
                                    <option <?php if ($rows['Item_id'] == 23052434) echo 'selected'; ?> value="23052434">Bracelet</option>
                                    <option <?php if ($rows['Item_id'] == 5498966) echo 'selected'; ?> value="5498966">Necklace</option>
                                    <option <?php if ($rows['Item_id'] == 5464833) echo 'selected'; ?> value="5464833">Earring</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Item_color" class="text-black">Color <span class="text-danger">*</span></label>
                                <select id="Item_color" class="form-control" name="updated_color">
                                    <option <?php if ($rows['Color'] == 1) echo 'selected'; ?> value="1" disabled>Select a Color</option>
                                    <option <?php if ($rows['Color'] == 'Gold') echo 'selected'; ?> value="Gold">Gold</option>
                                    <option <?php if ($rows['Color'] == 'Silver') echo 'selected'; ?> value="Silver">Silver</option>
                                    <option <?php if ($rows['Color'] == 'Rose Gold') echo 'selected'; ?> value="Rose Gold">Rose gold</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Item_size" class="text-black">Size <span class="text-danger">*</span></label>
                                <select id="Item_size" class="form-control" name="updated_size">
                                    <option <?php if ($rows['Size'] == '1') echo 'selected'; ?> value="1" disabled>Select a size</option>
                                    <option <?php if ($rows['Size'] == 'XS') echo 'selected'; ?> value="XS">XS</option>
                                    <option <?php if ($rows['Size'] == 'S') echo 'selected'; ?> value="S">S</option>
                                    <option <?php if ($rows['Size'] == 'M') echo 'selected'; ?> value="M">M</option>
                                    <option <?php if ($rows['Size'] == 'L') echo 'selected'; ?> value="L">L</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Stone_type" class="text-black">Stone type <span class="text-danger">*</span></label>
                                <select id="Stone_type" class="form-control" name="updated_stone_type">
                                    <option <?php if ($rows['type'] == 'L') echo 'selected'; ?> value="0" disabled>Select a stone type</option>
                                    <option <?php if ($rows['type'] == 1) echo 'selected'; ?> value="1">Sapphire blue</option>
                                    <option <?php if ($rows['type'] == 2) echo 'selected'; ?> value="2">Black diamond</option>
                                    <option <?php if ($rows['type'] == 3) echo 'selected'; ?> value="3">Emerald</option>
                                    <option <?php if ($rows['type'] == 4) echo 'selected'; ?> value="4">Transparent gemstones</option>
                                    <option <?php if ($rows['type'] == 5) echo 'selected'; ?> value="5">Tourmaline and spinel stones</option>
                                    <option <?php if ($rows['type'] == 6) echo 'selected'; ?> value="6">Amber (kahraman)</option>
                                </select>
                            </div>
                            <label>Quantity</label>
                            <input type="number" name="updated_quantity" class="form-control" placeholder="Updated Quantity" value="<?php echo $rows['Quantity'] ?>" required><br><br>
                            <label>Price</label>
                            <input type="number" name="updated_price" class="form-control" placeholder="New Price" value="<?php echo $rows['price'] ?>" required><br><br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update-changes">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
        </form>

        <br>

    </div>

</div>

<?php
include("include/footer.php");

?>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [3, "desc"]
            ]
        });
    });
</script>