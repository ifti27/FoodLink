<?php

require_once("dbConnect.php");


function searchFood($key)
{
    $conn = dbConnect();

   
    if ($key == "") {
        $query = "SELECT * FROM food";
    } 
    
    else {
        $query = "SELECT * FROM food WHERE fname LIKE '%$key%'";
    }

    $result = mysqli_query($conn, $query);
    return $result;
}

function insertClaim($name, $fname, $quantity, $date)
{
    $conn = dbconnect();
    $sql = "INSERT INTO claimedfood (name, fname, quantity, date) VALUES ('$name', '$fname', '$quantity', '$date')";
    return mysqli_query($conn, $sql);
}
function confirmPickup($id)
{
    $conn = dbConnect();
    $sql = "UPDATE claimedfood SET status='Picked Up' WHERE id='$id'";
    return mysqli_query($conn, $sql);
}
function getMyClaims($name)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM claimedfood WHERE name='$name'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("SQL Error: " . mysqli_error($conn));
    }

    $user = [];
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $user[] = $row;
        }
    }
    return $user;
}
function cancelClaim($id)
{
    $conn = dbConnect();
    $sql = "DELETE FROM claimedfood WHERE id='$id'";
    return mysqli_query($conn, $sql);
}
function saveClaim($name, $fname, $qty, $date) {
    $conn = dbConnect();
    $sql = "INSERT INTO claimedfood (name, fname, quantity, date) 
            VALUES ('$name', '$fname', '$qty', '$date')";
    
    return mysqli_query($conn, $sql);
}