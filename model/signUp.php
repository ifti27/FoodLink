<?php
require_once("dbConnect.php");
function insertUser($email, $name, $phone, $address,$password,$role, $code)
{
    $conn = dbConnect();
    if($role==1)
        {
            $query = "INSERT INTO admin (email, name, phone, address,password,role,code)
                VALUES ('$email', '$name', '$phone', '$address','$password','$role','$code')";
        }
    elseif($role==2)
        {
            $query = "INSERT INTO donor (email, name, phone, address,password,role,code)
              VALUES ('$email', '$name', '$phone', '$address','$password','$role','$code')";
        }
    else{
        $query = "INSERT INTO reciever (email, name, phone, address,password,role,code)
              VALUES ('$email', '$name', '$phone', '$address','$password','$role','$code')";
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn) > 0;
}
?>