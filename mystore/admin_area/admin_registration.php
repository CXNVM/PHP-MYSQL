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
    <title>Admin registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">Admin registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/registr.jpg" alt="Admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" id="user_name" name="user_name" placeholder="Enter your username" required="required" class="form-control w-60">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" name="user_email" placeholder="Enter your email" required="required" class="form-control w-60">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" name="user_password" placeholder="Enter your password" required="required" class="form-control w-60">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required="required" class="form-control w-60">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info text-light py-2 px-3" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
global $con;
if (isset($_POST['admin_registration'])){
    $user_username = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['confirm_password'];
    $user_ip = getIPAddress();

    //select
    $select_query = "select * from admin_table where admin_name='$user_username' or admin_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count == 1){
        echo "<script>alert('Username or email already exists!')</script>";
    } else if ($user_password != $conf_user_password){
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        $insert_query = "insert into user_table(user_name, user_email, user_password, user_address, user_contact, user_image, user_ip)
                        values ('$user_username', '$user_email', '$hash_password', '$user_address', '$user_contact', '$user_image', '$user_ip')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_error($con));
        }
    }

}

?>