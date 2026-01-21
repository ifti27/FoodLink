<?php
require_once("../model/usermodel.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=$_POST["email"];
    $flag=deletecomplain($email);

    if($flag)
    {
        header("Location:../view/admin/dashboard.php");
        $_SESSION['msg'] = "Problem solved";
    }
    else
    {
        header("Location:../view/admin/dashboard.php");
        $_SESSION['msg'] = "Problem not solved";
    }


}

?>