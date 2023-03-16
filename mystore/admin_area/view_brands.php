<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>Brand ID</th>
        <th>Brand title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $get_brand = "select * from brands";
    $result_brand = mysqli_query($con,$get_brand);
    while ($row = mysqli_fetch_assoc($result_brand)) {
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        ?>
        <tr class='text-center'>
            <td><?php echo $brand_id;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>;
        <?php
    }
    ?>
    </tbody>
</table>