<?php

require_once(__DIR__ . "/../model/FoodModel.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['claim_id'];
    
    if(isset($_POST['confirm_btn']))
        {
            confirmPickup($id);
            $_SESSION['message'] = "Pick up successful!";
            header("Location: ../view/Receiver/dashboard/myclaims.php");
            exit();
        }
        elseif(isset($_POST['cancel_btn']))
        {
            cancelClaim($id);
            $_SESSION['message'] = "Claim cancelled successfully.";
            header("Location: ../view/Receiver/dashboard/myclaims.php");
            exit();
        }
}
?>