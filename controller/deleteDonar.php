<?php
session_start();
require_once("../model/donarModel.php");

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    
    $flag = deleteDonarAccount($name);

    if ($flag) {
    
        session_unset();
        session_destroy();
        header("Location: ../view/login/signUp.php");
        exit();
    }

    else {
        
        header("Location: ../view/Donar/setting.php");
        exit();
    }
}
?>