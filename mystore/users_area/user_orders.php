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
    <?php
        $username = $_SESSION['username'];
        $get_user = "select * from user_table where user_name='$username'";
        $result = mysqli_query($con,$get_user);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
    ?>
     <h3 class="text-success">All my orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>№</th>
                <th>Amount due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
        <?php
            $get_order_details = "select * from user_orders where user_id='$user_id'";
            $result_orders = mysqli_query($con,$get_order_details);
            $number = 1;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $invoice_number = $row_orders['invoice_number'];
                $total_products = $row_orders['total_products'];
                $order_date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                    if ($order_status == 'pending') {
                        $order_status = 'incomplete';
                    } else {
                        $order_status = 'complete';
                    }
                echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='confirm_payment.php' class='text-light'>Confirm</a></td>
                    </tr>";
                $number++;
            }
        ?>
        </tbody>
    </table>
</body>
</html>