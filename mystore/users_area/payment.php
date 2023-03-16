<?php
include('../includes/connect.php');
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
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    img{
        width:50%;
    }
</style>
<body>
    <!-- php code to access user id-->
    <?php
        global $con;
        $username = $_SESSION['username'];
        $user_ip = getIPAddress();
        $get_user = "select * from user_table where user_name = '$username'";
        $result = mysqli_query($con,$get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];

    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://qiwi.com"><img src="../images/pay.png" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>
