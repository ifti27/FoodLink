<?php
require_once("dbConnect.php");

function authuser($email, $pass, $role)
{
    $conn = dbConnect();
    $tableName = "";
    if($role == 1) 
    {
        $tableName = "admin";
    } 
    elseif($role == 2) 
    {
        $tableName = "donor";
    } 
    elseif($role == 3) 
    {
        $tableName = "reciever";
    }
    $query = "SELECT * FROM $tableName WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);
        if(password_verify($pass, $user['password']))
        {

            return $user;
        }
        
    }
    return false;
}
function showuser()
{
     $conn = dbConnect();
     $query="SELECT email, name, phone, address, code FROM donor ";
     $result = mysqli_query($conn, $query);
     $user=[];
     if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $user[] = $row;
        }
    }
    return $user;
}
?>