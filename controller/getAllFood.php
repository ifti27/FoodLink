<?php
require_once(__DIR__ . "/../model/postFoodModel.php");


function getAllFoodDetails($name)
{
    $food=getAllFoodDetailsFromDB($name);

    return $food;
    
}

?>

