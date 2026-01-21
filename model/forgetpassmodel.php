<?php
require_once("dbConnect.php");
function validate($email,$code,$user)
{
    $conn= dbconnect();
    $tableName = "";
    if($user == "admin") 
    {
        $tableName = "admin";
    } 
    else if($user == "donor")
        {
            $tableName = "donor";
        }
    else if($user == "reciever")
        {
            $tableName = "reciever";
        }
    $query = "SELECT * FROM $tableName WHERE email='$email' AND code='$code'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {
        return true;
        
    }
    return false;
}
function insertpass($email,$pass,$user)
{
    $conn= dbconnect();
    $tableName = "";
    if($user == "admin") 
    {
        $tableName = "admin";
    } 
    else if($user == "donor")
        {
            $tableName = "donor";
        }
    else if($user == "reciever")
        {
            $tableName = "reciever";
        }
    $query = "UPDATE $tableName SET password='$pass' WHERE email='$email'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
?>