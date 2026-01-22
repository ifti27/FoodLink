<?php
require_once("dbConnect.php");
$name = $_SESSION['name'];

function updateProfile($email, $name, $phone, $address, $password)
{
    $conn = dbConnect();
    $sql = "UPDATE reciever SET email='$email', name='$name', phone='$phone', address='$address', password='$password' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {

        return true;
    } else {
        return false;
    }

}
function getReceiverByEmail($email)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM reciever WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
function changePassword($email, $newPass) {
    $conn = dbConnect();
    $sql = "UPDATE reciever SET password='{$newPass}' WHERE email='{$email}'";
    return mysqli_query($conn, $sql);
}
?>