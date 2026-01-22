<?php
session_start();

require_once("../model/postFoodModel.php");
$name = $_SESSION['name'];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    $hasErr=false;
 
    

    $fname =$_POST['foodName'];
    $quantity=$_POST['quantity'];
    $location = $_POST['address'];
    $time =$_POST['foodTime'];



    //Food name validation

    if(empty($_POST['foodName'])){
        $hasErr=true;
        $_SESSION['foodNameErr'] = "Please enter the food name!";

    }
    else{
        if(!preg_match("/^[a-z A-Z-']*$/",$_POST['foodName'])){
              $hasErr=true;
              $_SESSION['foodNameErr']="Only Letters and Spaces are allowed!";
        }
    }

    //quantity validation

    if(empty($_POST['quantity'])){
        $_SESSION['quanErr'] = "Please enter the quantity!";
        $hasErr=true;
    }

    else{
        
        if($quantity < 0){
            $_SESSION['quanErr'] = "The quantity should be valid!";
            $hasErr=true;
            

        }
    }
    //category validation

    if(empty($_POST['dept'])){
        $_SESSION['catErr'] = "Please choose an option!";
        $hasErr=true;

    }

   // description validation

// if(empty($_POST['descrip'])){

//     $hasErr=true;
//     $_SESSION['descripErr'] ="Please Enter something about the food!";

// }
// else {
//     $description = $_POST['descrip'];

//     if(str_word_count($description) < 5){
//         $hasErr = true;
//         $_SESSION['descripErr'] = "Description is short! Please use more than 5 words."; 

//     }
// }



// picture validation

if($_FILES['file']['error'] == 4) {

    $_SESSION['fileErr'] = "File is required";
    $hasErr = true;

}

else {

    $allowedTypes = ['image/jpeg', 'image/png', 'image/heic', 'image/jpg'];

    if(!in_array($_FILES['file']['type'], $allowedTypes)) {

        $_SESSION['fileErr'] = "Only JPG, PNG, JPEG and HEIC files are allowed";
        $hasErr = true;
    }

    $maxSize = 6 * 1024 * 1024;

    if($_FILES['file']['size'] > $maxSize) {

        $_SESSION['fileErr'] = "File size must be less than 6MB"; 
        $hasErr = true;
    }   
}



//time error
    if(empty($_POST['foodTime'])){
        $_SESSION['timeErr'] = "Please enter the time for remaining the food refresh!";
        $hasErr=true;
    }

    else{
        
        if(is_nan($time) || $time <= 0){
            $_SESSION['timeErr'] = "Time should be valid!";
            $hasErr=true;
        }
    }


//address error 
   
if(empty($_POST['address'])){

    $hasErr=true;
    $_SESSION['addErr'] ="Please Enter the address!";

}
else {
    $location = $_POST['address'];

    if(str_word_count($location) <= 2){
        $hasErr = true;
        $_SESSION['addErr'] = "Address is short! Please use more than one words."; 

    }
}




    if($hasErr){

        header("Location: ../view/donor/postFood.php");
        exit();
        echo "Form submitted successfully!";
    }
    else{
        $filename = basename($_FILES['file']['name']); 
        $dir = "../view/resource/";
        if(!is_dir($dir)){
            mkdir($dir);
        }
        $target_path = $dir . $filename; 
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
        {
            echo "File uploaded successfully: " . $filename . "<br>";
            $status = "Active"; 
            $result = insertFood($name, $fname, $quantity, $location, $time, $status, $filename);
        }
        else
        {
            $fileErr = "File upload failed";
        }
        
            if($result) {
            header("Location: ../view/donor/dashboard.php");
            exit();

            } 
            else {
            echo "Database insertion failed.";
            }
    }

          }
      

    







?>