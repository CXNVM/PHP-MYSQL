<?php
    if(isset($_GET['edit_products'])) {
        $edit_id = $_GET['edit_products'];
        $get_data = "select * from products where product_id='$edit_id'";
        $result = mysqli_query($con,$get_data);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_category = $row['category_id'];
        $product_brand = $row['brand_id'];
        $product_image = $row['product_image1'];
        $product_price = $row['product_price'];


        $select_category = "select * from categories where category_id='$product_category'";
        $result_category = mysqli_query($con,$select_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $category_title = $row_category['category_title'];

        $select_brand = "select * from brands where brand_id='$product_brand'";
        $result_brand = mysqli_query($con,$select_brand);
        $row_brand = mysqli_fetch_assoc($result_brand);
        $brand_title = $row_brand['brand_title'];
    }
?>


<div class="container mt-5">
    <h1 class="text-center">Edit</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" class="form-control" id="product_title" value="<?php echo $product_title ?>"
                       placeholder="Enter product title" autocomplete="off" required="required" name="product_title">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" class="form-control" id="product_description" value="<?php echo $product_description ?>"
                       placeholder="Enter product description" autocomplete="off" required="required" name="product_description">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" class="form-control" id="product_keywords" value="<?php echo $product_keywords ?>"
                       placeholder="Enter your username" autocomplete="off" required="required" name="product_keywords">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label">Product category</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo $product_category?>"><?php echo $category_title?></option>
                    <?php
                        $select_category_all = "select * from categories where category_id!='$product_category'";
                        $result_category_all = mysqli_query($con,$select_category_all);
                        while ($row_category_all = mysqli_fetch_assoc($result_category_all)){
                            $category_title_all = $row_category_all['category_title'];
                            $category_id = $row_category_all['category_id'];
                            echo "<option value='$category_id'>$category_title_all</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Product brand</label>
                <select name="product_brand" class="form-select">
                    <option value="<?php echo $product_brand?>"><?php echo $brand_title?></option>
                    <?php
                    $select_brand_all = "select * from brands where brand_id!='$product_brand'";
                    $result_brand_all = mysqli_query($con,$select_brand_all);
                    while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                        $brand_title_all = $row_brand_all['brand_title'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo "<option value='$brand_id'>$brand_title_all</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image</label>
                <div class="d-flex">
                    <input type="file" class="form-control w-90 m-auto" id="product_image1"
                           placeholder="Enter your username" autocomplete="off" required="required" name="product_image1">
                    <img src="product_images/<?php echo $product_image ?>" alt="" class="edit_image">
                </div>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" class="form-control" id="product_price" value="<?php echo $product_price ?>"
                       placeholder="Enter your username" autocomplete="off" required="required" name="product_price">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_products" value="Update product" class="btn btn-info px-3 mb-3 text-light">
            </div>
    </form>
</div>