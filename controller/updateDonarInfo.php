<?php
session_start();
require_once('../model/donarModel.php');

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $oldName = $_SESSION['name'];
        $newName = $_POST['orgName'];
        $email   = $_POST['email'];
        $phone   = $_POST['phnNo'];
        $address = $_POST['defaultAdd'];


    $flag=updateDonarDetails($oldName, $newName, $email, $phone, $address);


    if($flag) 
    {
        $_SESSION['name'] = $newName;
        header("location: ../view/donor/setting.php");
    } 
    
    else {
        echo "Update failed.";
    }
}
?>

