<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images

    $product_image1 = $_FILES['product_image1']['name'];

    // accessing image tmp name

    $temp_image1 = $_FILES['product_image1']['tmp_name'];

    move_uploaded_file($temp_image1, "./product_images/$product_image1");

    // insert query
    $insert_products = "insert into products(product_title, product_description, product_keywords, category_id,
                     brand_id, product_image1, product_price, date, status) values ('$product_title','$description','$product_keyword',
                                                                                    '$product_category', '$product_brands', '$product_image1', '$product_price', NOW(), '$product_status' )";
    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "<script>alert('Successfully inserted the products')</script>";
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert products - Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert products</h1>
        
        <!-- form -->
        <form action="" method = "post" enctype = "multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto mt-5">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name = "product_title"
                       id = "product_title" class = "form-control"
                       placeholder="Enter product title" autocomplete="off" required = "required">
            </div>
            <!--      description      -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name = "description"
                       id = "description" class = "form-control"
                       placeholder="Enter product description" autocomplete="off" required = "required">
            </div>
            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product keywords</label>
                <input type="text" name = "product_keyword"
                       id = "product_keyword" class = "form-control"
                       placeholder="Enter product keywords" autocomplete="off" required = "required">
            </div>

            <!-- categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class = "form-select">
                    <option value="">Select category</option>
                    <?php
                    $select_query = "select * from categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo  "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!--   brands     -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class = "form-select">
                    <option value="">Select brand</option>
                    <?php
                    $select_query = "select * from brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo  "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name = "product_image1"
                       id = "product_image1" class = "form-control"
                       required = "required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name = "product_price"
                       id = "product_price" class = "form-control"
                       placeholder="Enter product price" autocomplete="off" required = "required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto mt-5">
                <input type="submit" name = "insert_product" class = "btn btn-info mb-3 px-3" value = "Insert products">

            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>