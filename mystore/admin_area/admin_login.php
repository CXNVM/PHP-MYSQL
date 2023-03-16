<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid m-3">
    <h2 class="text-center">Admin login</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/login.jpg" alt="Admin registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Enter your username" required="required" class="form-control w-60">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" name="user_password" placeholder="Enter your password" required="required" class="form-control w-60">
                </div>
                <div>
                    <input type="submit" class="btn btn-info text-light py-2 px-3" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">You don't have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
