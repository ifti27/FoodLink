<?php
session_start();
require_once(__DIR__ . "/../model/donarModel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasErr = false;

    //organization name validation

    if (empty($_POST['orgName'])) {

        $hasErr = true;
        $_SESSION['orgNameErr'] = "Please enter the organization name!";

    }

    else {

        if (!preg_match("/^[a-z A-Z-']*$/", $_POST['orgName'])) {

            $hasErr = true;
            $_SESSION['orgNameErr'] = "Only Letters and Spaces are allowed!";


        }
    }

    //email validation 

  if (empty($_POST['email'])) {

        $_SESSION['emailErr'] = "Email is required!";
        $hasErr = true;

    } 
    
    else {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $_SESSION['emailErr'] = "Please enter a valid email!";
            $hasErr = true;

        }
    }

    //Phone No validation
        if(empty($_POST['phnNo'])){
        $_SESSION['phnNoErr'] = "Please enter your phone number!";
        $hasErr=true;
    }

    else{
        $phnNo =$_POST['phnNo'];
        if(!is_numeric($phnNo) || strlen($phnNo) != 11){
            $_SESSION['phnNoErr'] = "Enter a valid Phone Number!";
            $hasErr=true;
        }
    }


//default address error

if(empty($_POST['defaultAdd'])){

    $hasErr=true;
    $_SESSION['defAddErr'] ="Please Enter the address!";

}
else {
    $defAdd = $_POST['defaultAdd'];

    if(str_word_count($defAdd) <= 2){
        $hasErr = true;
        $_SESSION['defAddErr'] = "Address is short! Please use more than one words."; 

    }
}

//About error 
// if(empty($_POST['about'])){

//     $hasErr=true;
//     $_SESSION['aboutErr'] ="Please write something about the purpose of donating the food!";

// }
// else {
//     $about = $_POST['about'];

//     if(str_word_count($about) < 10){
//         $hasErr = true;
//         $_SESSION['aboutErr'] = "Description is short! Please write more than 10 words."; 

//     }
// }





if ($hasErr) {

        header("Location: ../view/donor/setting.php");
        exit();
        
    } 
    
    else {

    $oldName = $_SESSION['name'];
    $newName = $_POST['orgName'];
    $email   = $_POST['email'];
    $phone   = $_POST['phnNo'];
    $address = $_POST['defaultAdd'];

    $flag = updateDonarDetails($oldName, $newName, $email, $phone, $address);

    if($flag) 
    {
        $_SESSION['name'] = $newName; 


    } else {

    }
    
    header("Location:../view/donor/setting.php");
    exit();
    }

}


