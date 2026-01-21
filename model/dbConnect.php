<?php

    function dbConnect()
    {   
        $host="localhost";
        $user="root";
        $password="";
        $dbName="foodlink";
        $conn=mysqli_connect($host, $user, $password, $dbName);

        if(!$conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        else
        {   
            return $conn;
        }
    }

?>