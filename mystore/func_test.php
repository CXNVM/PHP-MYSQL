<?php
    include("./includes/connect.php");

    $is = 14;
    $sqll = "select mystore.count(15)";
    $query = $con->query($sqll);
    $rows = mysqli_fetch_array($query);
    echo $rows[0];
    ?>
