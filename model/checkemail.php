<?php
require_once("dbConnect.php");
function checkEmailExists($email) {
    $conn = dbConnect();
    $safeEmail = mysqli_real_escape_string($conn, $email);
    $tables = ['admin', 'donor', 'reciever']; 
    foreach ($tables as $table) {
        $query = "SELECT email FROM $table WHERE email = '$safeEmail'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
    }
    return false;
}
?>