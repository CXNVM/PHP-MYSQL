<?php
    if(isset($_GET['edit_account'])) {
        $user_session_name = $_SESSION['username'];
        $select_query = "select * from user_table where user_name='$user_session_name'";
        $result_query = mysqli_query($con, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $user_name = $row_fetch['user_name'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_contact = $row_fetch['user_contact'];
    }
    if (isset($_POST['user_update'])){
        $update_id = $user_id;
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        //update query
        $update_data = "update user_table set user_name='$user_name',user_email='$user_email',user_image='$user_image',
                  user_address='$user_address',user_contact='$user_contact' where user_id='$user_id'";
        $result_query_update =  mysqli_query($con,$update_data);
        if ($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
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
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" required="required" class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" required="required" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" required="required" value="C:\Users\cxmv\PhpstormProjects\film_rec_system\users_area\user_images\EbfyFWAWpr4.jpg" class="form-control" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" required="required" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" required="required" class="form-control w-50 m-auto" value="<?php echo $user_contact ?>" name="user_contact">
        </div>

        <input type="submit" value="Update" class="btn btn-info py-2 px-3 text-light" name="user_update">
    </form>
</body>
</html>