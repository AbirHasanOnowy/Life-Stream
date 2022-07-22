<?php

    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Project";

    if(!$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName)) {
        die("Failed to connect database");
    }
    
   
?>