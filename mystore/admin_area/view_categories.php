<h3 class="text-center text-success">All categories</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>Category ID</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody class="bg-secondary text-light">
        <?php
        $get_cat = "select * from categories";
        $result_cat = mysqli_query($con,$get_cat);
        $number = 1;
        while ($row = mysqli_fetch_assoc($result_cat)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        ?>
            <tr class='text-center'>
                        <td><?php echo $category_id;?></td>
                        <td><?php echo $category_title;?></td>
                        <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>;
        <?php
        }
        ?>
        </tbody>
    </table>