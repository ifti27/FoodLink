<?php
require_once("../model/checkemail.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (checkEmailExists($email)) {
        echo "taken";
    } else {
        echo "available";
    }
}
?>