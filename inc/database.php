<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_php_mysql";



$connection = mysqli_connect($servername, $username, $password, $database);


// check connection

if (!$connection) {

    die("connection failed" . mysqli_connect_errno());


}
