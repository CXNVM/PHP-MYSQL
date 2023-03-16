<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Cart details</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 50px;
        }
    </style>
</head>
<body>
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->

    <?php
    cart();
    ?>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <img src="./images/CART_ICON.jpg" class = "logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo  "<li class='nav-item' >
                                    <a class='nav-link' href = 'users_area/profile.php' > Profile</a >
                                </li >";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!--second child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome guest</a>
                    </li>
                     <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                    </li>";
            } else {
                echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                    </li>";
            }
            ?>
        </ul>
    </nav>
    <!--third child-->
    <div class="bg-light">
        <h3 class="text-center">
            Hidden store
        </h3>
        <p class="text-center">Ecommerce marketplace</p>
    </div>

    <!-- fourth child - table    -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                <?php
                global $con;
                $ip = getIPAddress();
                $total_price = 0;
                $cart_query = "select * from cart_details where ip_address = '$ip'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                    echo "                <thead>
                    <tr>
                            <th>Product title</th>
                            <th>Product image</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                    <tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_products = "select * from products where product_id = '$product_id'";
                        $result_products = mysqli_query($con, $select_products);
                        while ($row = mysqli_fetch_array($result_products)) {
                            $product_price = array($row['product_price']);
                            $price_table = $row['product_price'];
                            $product_title = $row['product_title'];
                            $product_image = $row['product_image1'];
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;
                            echo "<tr>
                                        <td>$product_title</td>
                                        <td><img src='./admin_area/product_images/$product_image' class='cart_img'></td>
                                        <td><input type='text' class='form-input' name='qty'></td>";
                            if (isset($_POST['update_cart'])) {
                                $quantities = $_POST['qty'];
                                $update_cart = "update cart_details set quantity=$quantities where product_id=$product_id";
                                $result_products_quantity = mysqli_query($con, $update_cart);
                                $total_price *= $quantities;
                            }
                            echo "<td>$price_table/-</td>
                                        <td><input type='checkbox' name='removeitem[]' value='$product_id'></td>
                                        <td>
                                        <!--<button class='btn btn-primary'>Update</button>-->
                                        <input type='submit' value='Update Cart' class='btn btn-primary' name='update_cart'>
                                        <input type='submit' value='Remove Cart' class='btn btn-primary' name='remove_cart'>
                                        </td>
                                    </tr>";
                        }
                    }
                } else {
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-3">
                <?php
                    $cart_query = "select * from cart_details where ip_address = '$ip'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3'>Subtotal: <strong>$total_price/-</strong></h4>
                            <input type='submit' value='Continue shopping' class='btn btn-primary px-3 py-2 mx-3' name='continue_shopping'>
                            <button class='btn btn-secondary px-3 py-2 mx-3'><a href='./users_area/checkout.php' class='text-light' style='text-decoration: none'>Checkout</a></button>";
                    } else {
                        echo "<input type='submit' value='Continue shopping' class='btn btn-primary px-3 py-2 mx-3' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                ?>
            </div>
            </form>
        </div>
    </div>

    <!--function-->
    <?php
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach ($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query = "delete from cart_details where product_id=$remove_id ";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>

    <!-- last child -->

    <!--include footer-->
    <div class="footerWrap">
        <div class="footer">
            <div class="footerContent">
                <p>All right reserved by CXMV</p>
            </div>
        </div>
    </div>
</div>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<html/>