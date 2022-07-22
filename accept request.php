<?php 

    include('connection.php');

    $id = $_POST['rid'];
    $sql = "select * from Request where ID = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $amount = $row['Amount'];
    $blood = $row['Blood_group'];

    $sql = "delete from Request where ID = '$id'";
    mysqli_query($conn,$sql);
   
    header("Location: ./Agent.php");
    
?>