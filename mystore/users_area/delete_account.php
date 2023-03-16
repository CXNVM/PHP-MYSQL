<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 class="text-success mb-4">Delete account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't delete account">
        </div>
    </form>
    <?php
        $username_session = $_SESSION['username'];
        if (isset($_POST['delete'])){
            $delete_query = "delete from user_table where user_name='$username_session'";
            $result_delete = mysqli_query($con,$delete_query);
            if($result_delete){
                session_destroy();
                echo "<script>alert('Account deleted')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
        if (isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";
        }
    ?>
</body>
</html>