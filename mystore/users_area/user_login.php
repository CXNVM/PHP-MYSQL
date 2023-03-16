<?php
include('../includes/connect.php');
//убрал conn из common-function
include('../functions/common_function.php');
@session_start();
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
    <h2 class="text-center">User login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-4">
            <form action="" method="post">
                <!--  username field-->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_username"
                           placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>

                <!--  password field-->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user_password"
                           placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>

                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="btn btn-info btn-outline-light py-2 px-3" name="user_login">
                    <p class="small fw-bold mt-4 pt-1 mb-0">Don't have an account?  <a href="user_registration.php" style="text-decoration: none" class="text-danger" >Register</a></p>
                </div>


            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
global $con;
if (isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();

    $select_query = "select * from user_table where user_name='$user_username'";
    $result = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);


    // cart item
    $select_query1 = "select * from cart_details where ip_address='$user_ip'";
    $select_cart = mysqli_query($con,$select_query1);
    $cart_row_count = mysqli_num_rows($select_cart);

    if ($num_rows > 0){
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])){
            /*        echo "<script>alert('You have logged in')</script>";
        echo "<script>window.open('../index.php?user_name=$user_username','_self')</script>";*/
            if ($num_rows == 1 and $cart_row_count == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}

?>
