<?php
include("database/connect.php");
include("include/header.php");
?>
<div class="site-wrap">


    <div class="site-navbar bg-white py-2">

    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <p style="text-align: center">Order List</p>
                <hr>
                <?php
                foreach ($_COOKIE as $key => $val) {
                    if (substr($key, 0, 11) == "USER_PRODOC") {
                    }
                }
                $e = $_SESSION['email'];
                $query1 = "SELECT * FROM orders WHERE username='" . $e . "'";
                $results = mysqli_query($conn, $query1);
                if ($results->num_rows == 0) {
                    echo "<p>You dont have any previous purchase history.</p>";
                }
                while ($rows = mysqli_fetch_assoc($results)) {
                ?>
                    <style>
                        .lis {
                            width: 60%;
                            margin: 10px;
                            margin: auto;
                            background: linear-gradient(to right, white, rgba(200, 220, 220, .2));
                            padding: .5em;
                        }

                        ol {
                            color: #ccc;
                            list-style-type: none;
                        }

                        ol li {
                            position: relative;
                            font: bold italic 45px/1.5 Helvetica, Verdana, sans-serif;
                            margin-bottom: 20px;
                        }

                        li p {
                            font: 12px/1.5 Helvetica, sans-serif;
                            padding-left: 300px;
                            color: #555;
                        }

                        span {
                            position: absolute;
                        }
                    </style>
                    <div class="lis">
                        <ol>
                            <li><span><?php echo $rows["Item_id"] ?></span>
                                <p>You ordered for: <?php echo $rows['Item_category'] ?> <i>Size: <?php echo $rows['Item_size'] ?></i><br>
                                    <span>OrderId:<?php echo $rows['Order_id'] ?></span><br>
                                    <span>Full name: <?php echo $rows['firstname'] ?> - <?php echo $rows['lastname'] ?></span><br>
                                    <span>Email: <?php echo $rows['email'] ?></span><br>
                                    <span>Phone number: <?php echo $rows['phone'] ?></span><br>
                                    <span>Address: <?php echo $rows['address'] ?></span><br>
                                    <span>Country: <?php echo $rows['country'] ?></span><br>
                                    <span><b>Total Cost: <?php echo $rows['total'] ?></b></span><br>
                                </p>
                                <hr>
                            </li>
                        </ol>
                    </div>

                <?php
                } ?>
            </div>
        </div>
    </div>

</div>


<?php
include("include/footer.php");
?>