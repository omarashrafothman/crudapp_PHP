<?php
$errors = "";
$success = "";
function requiredInput($value)
{
    $str = trim($value);
    if (strlen($str) > 0) {
        return true;

    } else {
        return false;
    }
}




//  function to sanitize input


function sanitizeInputString($value)
{

    $str = trim($value);
    $str = filter_var($str, FILTER_SANITIZE_STRING);

    return $str;
}
function sanitizeInputEmail($email)
{

    $str = trim($email);
    $str = filter_var($str, FILTER_SANITIZE_EMAIL);

    return $str;
}



function minValue($value, $min)
{

    if (strlen($value) < $min) {
        return false;

    } else {
        return true;
    }

}
function maxValue($value, $max)
{

    if (strlen($value) > $max) {
        return false;

    } else {
        return true;
    }

}
function validEmail($email)
{

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;

    } else {
        return false;
    }

}


?>