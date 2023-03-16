<?php

    $con = mysqli_connect('localhost', 'root', 'cemka2020', 'mystore');
    if($con) {
        echo "connected";
    } else {
        die(mysqli_error($con));
    }


?>