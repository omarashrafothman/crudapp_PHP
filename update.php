<?php include('inc/header.php');
include('inc/validations.php');

if (isset($_POST["submit"])) {

    $name = sanitizeInputString($_POST["name"]);
    $email = sanitizeInputEmail($_POST["email"]);



    if (requiredInput($name) && requiredInput($email)) {


        if (minValue($name, 3)) {
            if (validEmail($email)) {
                $id = $_POST["id"];
                if ($password) {

                    $password = sanitizeInputString($_POST["password"]);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "UPDATE `users` SET `user_name`='$name',`user_email`='$email',`user_password`='$hashed_password' WHERE `user_id`='$id'";
                } else {

                    $sql = "UPDATE `users` SET `user_name`='$name',`user_email`='$email' WHERE `user_id`='$id'";

                }




                $result = mysqli_query($connection, $sql);
                if ($result) {
                    $success = "user updated successful";
                    header("refresh:3;url=index.php");
                }
            } else {


                $errors = "email must be valid";
            }

        } else {


            $errors = "name must be greater than 3 char / password mast be less than 20 char";
        }



    } else {

        $errors = "pleas fill all fields !";

    }

}

?>

<h1 class="text-center col-12 bg-warning py-3 text-white my-2">update User</h1>


<?php
if ($errors):

    ?>

    <div class="danger ">
        <h5 class="alert alert-danger text-center">

            <?php

            echo $errors;
            ?>

        </h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">GO BACK << /a>


    </div>
    <?php

endif;

?>
<?php
if ($success):

    ?>

    <div class="danger ">
        <h5 class="alert alert-success text-center">

            <?php

            echo $success;
            ?>

        </h5>


    </div>
    <?php

endif;

?>

<?php include('inc/footer.php'); ?>