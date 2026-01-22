<?php
require_once("../Model/postFoodModel.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $foodname = $_POST["fname"]; 

    if(deleteFood($foodname)) {
        
        header("Location: ../view/donor/dashboard.php");
        exit();
    }
}
?>