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
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <?php
                    $query1 = 'SELECT * FROM item';
                    $results = mysqli_query($conn, $query1);
                    while ($rows = mysqli_fetch_assoc($results)) {
                    ?>
                        <tr>
                            <td><?php echo $rows['Item_id'] ?></td>
                            <td><img src="<?php echo $rows['image'] ?>" alt="No image" width="100"></td>
                            <td><?php echo $rows['Item_category'] ?></td>
                            <td><?php echo $rows['Item_price'] ?></td>
                            <td><?php echo $rows['Item_size'] ?></td>
                            <td><?php echo $rows['Description'] ?></td>
                        </tr>
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