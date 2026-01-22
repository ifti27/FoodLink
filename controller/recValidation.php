<?php
session_start();
require_once("../model/recieverModel.php");

if(isset($_POST['saveChnage']))
    {
        $name = $_POST['orgName'];
        $email = $_POST['email'];
        $phone = $_POST['phnNo'];
        $address = $_POST['defaultAdd'];

        if(empty($name))
            {
                $_SESSION['orgNameErr'] = "Please enter a name!";
                header ("Location: ../view/Receiver/dashboard/settings.php");
            }
        elseif(empty($email))
            {
                $_SESSION['emailErr'] = "Email is required!";
                header ("Location: ../view/Receiver/dashboard/settings.php");

            }    
            else
                {
                    $status = updateProfile($email, $name, $phone, $address);
                    if($status)
                        {
                            $_SESSION['email']= $email;
                            header("Location: ../view/Receiver/dashboard/settings.php");
                        }
                        else
                            {
                                echo "Error updating profile.";
                            
                                }
                } 
    }
    else {
        header ("Location: ../view/Receiver/dashboard/settings.php");
    }

    if (isset($_POST['updatePassword'])) {
    $currentPass = $_POST['currentPass'];
    $newPass = $_POST['newPass'];
    $email = $_SESSION['email'];

    $user = getReceiverByEmail($email);
    
    if ($user['password'] === $currentPass) {
        if (changePassword($email, $newPass)) {
            header('location: ../view/settings.php?msg=pass_changed');
        }
    } else {
        echo "Current password does not match!";
    }
}
?>
    