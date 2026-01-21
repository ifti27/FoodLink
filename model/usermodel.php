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
function showreciever()
{
     $conn = dbConnect();
     $query="SELECT email, name, phone, address, code FROM reciever ";
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
function showcomplains()
{
    $conn = dbConnect();
    $query = "SELECT * FROM complaint"; 
    $result = mysqli_query($conn, $query);
    $user = [];
    if (!$result) {
        die("Query Failed in showcomplains: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $user[] = $row;
        }
    }
    return $user;
}
function deleteuser($email)
{
    $conn = dbConnect();
    $query = "DELETE FROM donor WHERE email='$email'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
function deletereciever($email)
{
    $conn = dbConnect();
    $query = "DELETE FROM reciever WHERE email='$email'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
function deletecomplain($email)
{
    $conn = dbConnect();
    $query = "DELETE FROM complaint WHERE email='$email'";
    mysqli_query($conn, $query);  
    return mysqli_affected_rows($conn) > 0;
}
function donornum()
{
    $conn = dbConnect();
    $query = "SELECT COUNT(*) as total FROM donor"; 
    
    $result = mysqli_query($conn, $query);
    
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    return 0;
}
function recievernum()
{
    $conn = dbConnect();
    $query = "SELECT COUNT(*) as total FROM reciever";
    $result = mysqli_query($conn, $query);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    return 0;
}

function complainnum()
{
    $conn = dbConnect();
    $query = "SELECT COUNT(*) as total FROM complaints"; 
    $result = mysqli_query($conn, $query);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    return 0;
}
function updatename($oldemail,$name)
{
    $conn= dbconnect();
    $query = "UPDATE admin SET name='$name' WHERE email='$oldemail'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
function updateemail($oldemail,$email)
{
    $conn= dbconnect();
    $query = "UPDATE admin SET email='$email' WHERE email='$oldemail'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
function updatephone($oldemail,$phone)
{
    $conn= dbconnect();
    $query = "UPDATE admin SET phone='$phone' WHERE email='$oldemail'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
function updateaddr($oldemail,$addr)
{
    $conn= dbconnect();
    $query = "UPDATE admin SET address='$addr' WHERE email='$oldemail'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
?>
