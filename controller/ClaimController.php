<?php
require_once("../model/FoodModel.php");

if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['fname']))
    {
        $name = $_SESSION['name']? $_SESSION['name'] : "Ayon";
        $fname = $_POST['fname'];
        $quantity = $_POST['quantity'];
        $date = date('Y-m-d');
        $status = "Claimed";

        $result = insertClaim($name, $fname, $quantity, $date, $status);
        if ($result) {
          echo "Claim inserted successfully.";
        } else {
            echo "Error inserting claim.";
        }
    }
?>
