<?php
// including connect
//include ('./includes/connect.php');


/*   СЛЕДУЮЩИЕ ТРИ ФУНКЦИИ ИМЕЮТ ОДИН СИНТАКСИС И ОТЛИЧАЮТСЯ ТОЛЬКО IF-УСЛОВИЯМИ И УСЛОВИЯМИ В ЗАПРОСАХ */
// getting products
function get_products(){
    global $con;

    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {


            $select_query = "select * from products order by rand() LIMIT 0,8";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                </div>
                            </div>";
            }
        }
    }

}

// getting unique categories

function get_unique_categories(){
    global $con;

    // condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from products where category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows != 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
                           <div class='col-md-4 mb-2'>
                               <div class='card' style='width: 18rem;'>
                               <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                   <div class='card-body'>
                                       <h5 class='card-title'>$product_title</h5>
                                       <p class='card-text'>$product_description</p>
                                       <p class='card-text'>Price: $product_price/-</p>
                                       <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                   </div>
                               </div>
                           </div>";
            }
        } else {
            echo "<h4 class='text-center text-danger'>NO STOCK FOR THIS CATEGORY</h4>";
        }
    }

}

// getting unique brands

function get_unique_brands(){
    global $con;

    // condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from products where brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows != 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
                           <div class='col-md-4 mb-2'>
                               <div class='card' style='width: 18rem;'>
                               <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                   <div class='card-body'>
                                       <h5 class='card-title'>$product_title</h5>
                                       <p class='card-text'>$product_description</p>
                                       <p class='card-text'>Price: $product_price/-</p>
                                       <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                   </div>
                               </div>
                           </div>";
            }
        } else {
            echo "<h4 class='text-center text-danger'>THERE IS NO PRODUCTS OF THIS BRAND AVAILABLE</h4>";
        }
    }

}

////////////////////////////////////////

// displaying brand in sidenav

function getbrands(){
    global $con;
    $select_brands = "select * from brands";
    $result_brands = mysqli_query($con, $select_brands);
    while($row_data  = mysqli_fetch_assoc($result_brands)){
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item text-light'>
                        <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
                        </li>";
    }
}

// displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories = "select * from categories";
    $result_categories = mysqli_query($con, $select_categories);
    while($row_data  = mysqli_fetch_assoc($result_categories)){
        $cat_title = $row_data['category_title'];
        $cat_id = $row_data['category_id'];
        echo "<li class='nav-item text-light'>
                        <a href='index.php?category=$cat_id' class='nav-link'>$cat_title</a>
                        </li>";
    }
}

// searching products

function search_product(){
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from products where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $number_of_rows = mysqli_num_rows($result_query);
        if ($number_of_rows != 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                </div>
                            </div>";
            }
        } else {
            echo "<h4 class='text-center text-danger'>NO RESULTS MATCH.</h4>";
        }
    }
}

// getting all products
function get_all_products(){
    global $con;

    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {

            $select_query = "select * from products order by rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_description</p>
                                        <p class='card-text'>Price: $product_price/-</p>
                                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                    </div>
                                </div>
                            </div>";
            }
        }
    }

}

// view details function
function view_details(){
    global $con;

    // condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];

                $select_query = "select * from products where product_id = $product_id ";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id']; //МОЖНО УБРАТЬ
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "
                                <div class='col-md-4 mb-2'>
                                    <div class='card' style='width: 18rem;'>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_title</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>Price: $product_price/-</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info''>Add to cart</a>
                                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-8'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                        <h4 class='text-center text-info mb-5'>Related products</h4>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                        </div>
                                        </div>
                                </div>
                                ";
                }
            }
        }
    }
}

// get IP adress
function getIPAddress() {
    //whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
//whether ip is from the remote address
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
/*$ip = getIPAddress();
echo 'User Real IP Address - '.$ip;*/


// cart function
function cart(){
    global $con;
    if (isset($_GET['add_to_cart'])){
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from cart_details where ip_address = '$ip' and product_id = $get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('this item is already present inside cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into cart_details(product_id, ip_address, quantity) values ('$get_product_id', '$ip', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// cart number

function cart_item(){
    global $con;
    if (isset($_GET['add_to_cart'])) {
        $ip = getIPAddress();
        $select_query = "select * from cart_details where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

    }else {
        $ip = getIPAddress();
        $select_query = "select * from cart_details where ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

    }
    echo $count_cart_items;
}

// total price function
function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from cart_details where ip_address = '$ip'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_products = "select * from products where product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_details_query = "select * from user_table where user_name='$username'";
    $result_query = mysqli_query($con,$get_details_query);
    while ($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])){
            if (!isset($_GET['my_orders'])){
                if (!isset($_GET['delete_account'])){
  //                   $get_orders_query = "select * from user_orders where user_id='$user_id' and order_status='pending'";
                    $get_orders_query = "select mystore.count($user_id)";
                    $result_orders_query = mysqli_query($con,$get_orders_query);
  //                  $row_count = mysqli_num_rows($result_orders_query);
                    $row_count = mysqli_fetch_array($result_orders_query);
                    if($row_count[0] > 0) {
                        echo "<h3 class='text-center text-success mt-5 mb-4'>You have 
                                <span class='text-danger'>$row_count[0]</span> pending orders 
                                </h3>
                                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order detals</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5 mb-4'>You have <span class='text-danger'>0</span> pending orders 
                                </h3>
                                <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }
        }
    }
}
?>

