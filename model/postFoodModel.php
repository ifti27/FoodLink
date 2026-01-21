<?php
require_once("dbConnect.php");
$name = $_SESSION['name'];

function insertFood($name, $fname, $quantity, $location, $time, $status, $imgpath)
{
    $conn = dbConnect();
   
    $query = "INSERT INTO food (name, fname, quantity, location, time, status, imgpath) 
              VALUES ('$name', '$fname', '$quantity', '$location', '$time', '$status', '$imgpath')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}



function getAllFoodDetailsFromDB($name)
{
    $conn = dbConnect();
    $query = "SELECT * FROM food WHERE name='$name'";
    $data = mysqli_query($conn, $query);

    $food = [];

    if (mysqli_num_rows($data) > 0) {
        while ($rows = mysqli_fetch_assoc($data)) {
            $food[]= $rows;
        }
    }

    return $food;
}


function deleteFood($fname)
{
    $conn = dbConnect();
    $query = "DELETE FROM food WHERE fname = '$fname'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}



?>
