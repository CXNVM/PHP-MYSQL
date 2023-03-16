<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>№</th>
        <th>Amount due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $get_order_details = "select * from user_orders";
    $result_orders = mysqli_query($con,$get_order_details);
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
                        <td>$order_id</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>";
    }
    ?>
    </tbody>
</table>