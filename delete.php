<?php include('inc/header.php'); ?>




<?php
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {

    header('location:index.php');

}

$id = $_GET['id'];
$sql = "SELECT * FROM `users` WHERE `user_id`='$id' LIMIT 1";
$result = mysqli_query($connection, $sql);
$check = mysqli_num_rows($result);


if (!$check) {

    header('location:index.php');

}
$sql2 = "DELETE FROM `users` WHERE `user_id`=$id";
$result = mysqli_query($connection, $sql2);

?>
<h1 class="text-center col-12 bg-danger py-3 text-white my-2">User Have Been Deleted</h1>
<?php header("refresh:2;url=index.php") ?>


<?php include('inc/footer.php'); ?>