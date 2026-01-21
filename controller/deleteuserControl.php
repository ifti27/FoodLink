<?php
require_once("../model/usermodel.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=$_POST["email"];
    $flag=deleteuser($email);

    if($flag)
    {
        header("Location:../view/admin/dashboard.php");
        $_SESSION['msg'] = "Successfully Deleted";
    }
    else
    {
        header("Location:../view/admin/dashboard.php");
        $_SESSION['msg'] = "Delete operation failed";
    }


}

?>