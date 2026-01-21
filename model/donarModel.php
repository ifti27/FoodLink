<?php

require_once("dbConnect.php"); 

function getDonorData($name) 
{
    $conn = dbConnect();
    $query = "SELECT * FROM donor WHERE name='$name'";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function updateDonarDetails($oldName, $newName, $email, $phone, $address) {
    $conn = dbConnect();
    $query1 = "UPDATE donor SET 
               name = '$newName', 
               email = '$email', 
               phone = '$phone', 
               address = '$address' 
               WHERE name = '$oldName'";

    $result1 = mysqli_query($conn, $query1);
    $query2 = "UPDATE food SET name = '$newName' WHERE name = '$oldName'";
    
    mysqli_query($conn, $query2);

    return $result1;
}

function deleteDonarAccount($name) 

{
    $conn = dbConnect();
    

    $query1 = "DELETE FROM food WHERE name = '$name'";
    mysqli_query($conn, $query1);

    $query2 = "DELETE FROM donor WHERE name = '$name'";
    $result = mysqli_query($conn, $query2);

    return $result;
}

function getTotalFoodPosts($name) 
{
    $conn = dbConnect();

    $query = "SELECT COUNT(*) as total FROM food WHERE name = '$name'";
    $result = mysqli_query($conn, $query);
    
    if ($result) 
        
    {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    return 0;
}


?>
