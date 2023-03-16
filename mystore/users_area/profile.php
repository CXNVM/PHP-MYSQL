<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Ecommmerce website using PHP and MySql</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
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
            <img src="../images/CART_ICON.jpg" class = "logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">My account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:
                            <?php
                            total_cart_price();
                            ?>/-
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name = "search_data">
                    <!--                        <button class="btn btn-outline-light" type="submit">Search</button>-->
                    <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product">
                </form>
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
                    <a class='nav-link' href='../users_area/user_login.php'>Login</a>
                    </li>";
            } else {
                echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='../users_area/logout.php'>Logout</a>
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

<!--    fourth child-->
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center" style="height: 100vh">
                <li class="nav-item bg-info text-light">
                    <a class="nav-link" href="#"><h4>Your profile</h4></a>
                </li>
                <?php
                    $username =  $_SESSION['username'];
                    $user_image_query = "select * from user_table where user_name='$username'";
                    $result_query = mysqli_query($con,$user_image_query);
                    $row_image = mysqli_fetch_array($result_query);
                    $user_image = $row_image['user_image'];
                    echo "<li class='nav-item text-light'>
                    <img src='user_images/$user_image' class='profile_img my-3' alt=''>
                        </li>"
                ?>
                <li class="nav-item text-light">
                    <a class="nav-link" href="profile.php">Pending orders</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="profile.php?edit_account">Edit account</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="profile.php?my_orders">My orders</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="profile.php?delete_account">Delete account</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
            ?>
        </div>
    </div>

    <!-- last child -->

    <!--include footer-->
    <?php
        include('../includes/footer.php');
    ?>
</div>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<html/>