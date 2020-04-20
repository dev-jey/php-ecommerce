<?php
include("include/adminheader.php");
include("database/connect.php");
?>



<div>

    <?php if (isset($_SESSION['admin'])) { ?>
        <style>
            .custab {
                border: 1px solid #ccc;
                padding: 5px;
                margin: 5% 0;
                box-shadow: 3px 3px 2px #ccc;
                transition: 0.5s;
            }

            .custab:hover {
                box-shadow: 3px 3px 0px transparent;
                transition: 0.5s;
            }
        </style>
        <div class="container">
            <div class="row col-md-8 col-md-offset-2 custyle">
                <table class="table table-striped custab">
                    <thead>
                        <a href="add_product.php" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new product</a>

                        <h2>Categories</h2>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Warranty</th>
                            <th>Material</th>
                            <th>Description</th>
                            <th>View Products</th>
                        </tr>
                    </thead>

                    <?php
                    $query1 = 'SELECT * FROM item';
                    $results = mysqli_query($conn, $query1);
                    while ($rows = mysqli_fetch_assoc($results)) {
                    ?>
                        <form action="products.php" method="post">
                            <tr>
                                <input type="text" value="<?php echo $rows['Item_id'] ?>" name="cat_id" hidden>
                                <input type="text" value="<?php echo $rows['Item_category'] ?>" name="cat_name" hidden>
                                <td><?php echo $rows['Item_id'] ?></td>
                                <td><img src="<?php echo $rows['image'] ?>" alt="No image" width="100"></td>
                                <td><?php echo $rows['Item_category'] ?></td>
                                <td><?php echo $rows['warranty'] ?> Year(s)</td>
                                <td><?php echo $rows['Material'] ?></td>
                                <td><?php echo $rows['Description'] ?></td>
                                <td><button type="submit" class="btn btn-info btn-sm" name="view-prods">View</button></td>
                            </tr>
                        </form>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    <?php } ?>
</div>

<?php
include("include/footer.php");

?>