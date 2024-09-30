<?php include('inc/header.php'); ?>
<?php

$sql = "SELECT * FROM `users`";
$result = mysqli_query($connection, $sql);
$index = 1;




?>

<h1 class="text-center col-12 bg-primary py-3 text-white my-2">Home Page</h1>
<div class="row">
    <div class="col-sm-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($rows = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th><?php echo $index++; // Print the index and increment it ?></th>
                            <th><?php echo $rows['user_name']; ?></th>
                            <th><?php echo $rows['user_email']; ?></th>

                            <td>
                                <a class="btn btn-info" href="edit.php?id=<?php echo $rows['user_id']; ?>"> <i
                                        class="fa fa-edit"></i> </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $rows['user_id']; ?>"> <i
                                        class="fa fa-close"></i> </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>


                <?php endif; ?>


            </tbody>
        </table>
    </div>
</div>

<?php include('inc/footer.php'); ?>