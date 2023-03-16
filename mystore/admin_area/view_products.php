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
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product title</th>
            <th>Product image</th>
            <th>Product price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody class="bg-secondary text-light">
        <?php
        $get_order_details = "select * from products";
        $result_orders = mysqli_query($con,$get_order_details);
        $number = 1;
        while ($row = mysqli_fetch_assoc($result_orders)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;
        ?>
            <tr class='text-center'>
                        <td><?php echo $number;?></td>
                        <td><?php echo $product_title;?></td>
                        <td><img src='./product_images/<?php echo $product_image;?>' class='cart_img'></td>
                        <td><?php echo $product_price;?>/-</td>
                        <td><?php
                            $get_count = "select * from orders_pending where product_id=$product_id";
                            $result_count = mysqli_query($con,$get_count);
                            $rows_count = mysqli_num_rows($result_count);
                            echo $rows_count;
                            ?>
                        </td>
                        <td><?php echo $status;?></td>
                        <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>;
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>