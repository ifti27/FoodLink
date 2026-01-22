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

function insertClaim($name, $fname, $quantity, $date, $status)
{
    $conn = dbconnect();
    $sql = "INSERT INTO claimedfood (name, fname, quantity, date, status) VALUES ('$name', '$fname', '$quantity', '$date', '$status')";
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
    $sql = "SELECT * FROM claimedfood WHERE status='Claimed'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function cancelClaim($id)
{
    $conn = dbConnect();
    $sql = "DELETE FROM claimedfood WHERE id='$id'";
    return mysqli_query($conn, $sql);
}
function saveClaim($name, $fname, $qty, $date, $status) {
    $conn = dbConnect();
    $sql = "INSERT INTO claimed_food (name, fname, quantity, date, status) 
            VALUES ('$name', '$fname', '$qty', '$date', '$status')";
    
    return mysqli_query($conn, $sql);
}