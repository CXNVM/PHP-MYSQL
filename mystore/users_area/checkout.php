<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Ecommmerce website - Checkout page</title>
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
                        <a class="nav-link" href="user_registration.php">Register</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo  "<li class='nav-item' >
                                    <a class='nav-link' href = 'profile.php' > Profile</a >
                                </li >";
                    }
                    ?>
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
    <!-- fourth child-->
    <div class="row px-1">
        <div class="col-md-12">
            <!-- products-->
            <div class="row">
                <?php
                    if (!isset($_SESSION['username'])) {
                        include('user_login.php');
                    } else {
                        include('payment.php');
                    }
                ?>
            </div>
        </div>
    </div>
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