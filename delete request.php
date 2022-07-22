<?php

include('connection.php');

$id = $_POST['rid'];
$sql = "select * from Request where ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$amount = $row['Amount'];
$blood = $row['Blood_group'];



$sql = "delete from Request where ID = '$id'";
mysqli_query($conn, $sql);

$sql = "select * from BloodBank where Blood_group = '$blood'";
$res = mysqli_query($conn, $sql) or die("Query failed");

if (isset($res)) {
    $row = mysqli_fetch_assoc($res);
    $total = $row['Amount'] + $amount;
    $id = $row['ID'];

    $sql = "update bloodbank set Amount = '$total' where ID = '$id'";
    mysqli_query($conn, $sql);

    header("Location: ./Agent.php");
} else {
    echo "error in query";
}
    
    //die;
