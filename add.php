<?php include('inc/header.php');

include('inc/validations.php');

if (isset($_POST["submit"])) {

    $name = sanitizeInputString($_POST["name"]);
    $email = sanitizeInputEmail($_POST["email"]);
    $password = sanitizeInputString($_POST["password"]);


    if (requiredInput($name) && requiredInput($email) && requiredInput($password)) {


        if (minValue($name, 3) && maxValue($password, 20)) {
            if (validEmail($email)) {

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sqlQuery = "INSERT INTO `users`(`user_name`,`user_email`,`user_password`) 
                VALUES ('$name','$email','$hashed_password')
                ";

                $result = mysqli_query($connection, $sqlQuery);
                if ($result) {
                    $success = "user added successful";
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

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<?php
if ($errors):

    ?>

    <div class="danger ">
        <h5 class="alert alert-danger text-center">

            <?php

            echo $errors;
            ?>

        </h5>


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
<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>