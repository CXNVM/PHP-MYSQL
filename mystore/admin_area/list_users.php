<h3 class="text-center text-success">All users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>№</th>
        <th>User name</th>
        <th>User email</th>
        <th>User image</th>
        <th>User address</th>
        <th>User phone</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $get_order_details = "select * from user_table";
    $result_orders = mysqli_query($con,$get_order_details);
    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
        $user_id = $row_orders['user_id'];
        $user_name = $row_orders['user_name'];
        $user_email = $row_orders['user_email'];
        $user_image = $row_orders['user_image'];
        $user_address = $row_orders['user_address'];
        $user_contact = $row_orders['user_contact'];
        echo "
        <tr>
            <td>$user_id</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td>$user_image</td>
            <td>$user_address</td>
            <td>$user_contact</td>
            <td><a href='index.php?delete_user=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>