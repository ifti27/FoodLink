<?php
session_start();
require_once("../model/usermodel.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $hasErr = false;
    $oldemail = $_SESSION['email'];

    // Capture Inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $namereg = "/^[a-zA-Z' -]+$/";
    if(!empty($name) && !preg_match($namereg, $name)) {
        $hasErr = true;
        $_SESSION['nameErr'] = "Name cannot contain numbers";
    }
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hasErr = true;
        $_SESSION['emailErr'] = "Invalid email";
    }
    if(!empty($phone) && (!is_numeric($phone) || strlen($phone) != 11)) {
        $hasErr = true;
        $_SESSION['phoneErr'] = "Phone must be 11 digits";
    }
    if(!empty($addr) && strlen($addr) > 300) {
        $hasErr = true;
        $_SESSION['addrErr'] = "Address is too long";
    }

    if($hasErr) {
        header("Location: ../view/admin/settings.php");
        exit();
    }
    else 
    {
        if(!empty($name)) {
            updatename($oldemail, $name);
            $_SESSION['name'] = $name; 
        }
        if(!empty($email)) {
            $status = updateemail($oldemail, $email);
            if($status) {
                $oldemail = $email; 
                $_SESSION['email'] = $email; 
            }
        }
        if(!empty($phone)) {
            updatephone($oldemail, $phone);
        }
        if(!empty($addr)) {
            updateaddr($oldemail,  $addr);
        }

        $_SESSION['message'] = "Profile updated successfully";
        header("Location: ../view/admin/settings.php");
        exit();
    }
}
?>