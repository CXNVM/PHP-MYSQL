<?php
    include('../includes/connect.php');
    //убрал conn из common-function
    include('../functions/common_function.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New user registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--  username field-->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_username"
                               placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- email field-->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email"
                               placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- image field-->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="user_image"
                               required="required" name="user_image">
                    </div>
                    <!--  password field-->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password"
                               placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confirm password field-->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="conf_user_password"
                               placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!--  address field-->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="user_address"
                               placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!--  contact field-->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="user_contact"
                               placeholder="Enter your phone number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="btn btn-info btn-outline-light py-2 px-3" name="user_register">
                        <p class="small fw-bold mt-4 pt-1 mb-0">Already have an account?  <a href="user_login.php" style="text-decoration: none" class="text-danger" >Login</a></p>
                    </div>


                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    global $con;
    if (isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $conf_user_password = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();

        //select
        $select_query = "select * from user_table where user_name='$user_username' or user_email='$user_email'";
        $result = mysqli_query($con,$select_query);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count == 1){
            echo "<script>alert('Username or email already exists!')</script>";
        } else if ($user_password != $conf_user_password){
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            //insert
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
            $insert_query = "insert into user_table(user_name, user_email, user_password, user_address, user_contact, user_image, user_ip)
                        values ('$user_username', '$user_email', '$hash_password', '$user_address', '$user_contact', '$user_image', '$user_ip')";
            $sql_execute = mysqli_query($con, $insert_query);
            if ($sql_execute) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
        }

        //selecting cart items
        $select_cart_items = "select * from cart_details where ip_address = '$user_ip'";
        $result_cart =  mysqli_query($con, $select_cart_items);
        $num_of_rows = mysqli_num_rows($result_cart);
        if ($num_of_rows > 0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }

?>
