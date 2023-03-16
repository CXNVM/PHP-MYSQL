<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=egde">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Admin dashboard</title>
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
    <!-- navbar-->
    <div class="container-fluid p-0">
        <!-- first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/CART_ICON.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div>
        <!-- third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/ananas.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center mx-2">
                    <button class="btn btn-info my-3"><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Insert products</a></button>
                    <button class="btn btn-info"><a href="index.php?view_products" class="nav-link text-light btn-info my-1">View products</a></button>
                    <button class="btn btn-info"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                    <button class="btn btn-info"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories</a></button>
                    <button class="btn btn-info"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brands</a></button>
                    <button class="btn btn-info"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View brands</a></button>
                    <button class="btn btn-info"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button class="btn btn-info"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button class="btn btn-info"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button class="btn btn-info"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- forth child-->
        <div class="container my-3">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_product'])){
                    include('insert_product.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['delete_user'])){
                    include('delete_user.php');
                }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>