<?php 

    include('connection.php');

    $id = $_POST['did'];
    $sql = "select * from Donor where ID = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $total = $row['total'] + $_POST['amount'];

    $sql = "update Donor set total = '$total' where ID = '$id'";

    mysqli_query($conn,$sql);

    $blood = $row['Blood_group'];
    $sql = "select * from BloodBank where Blood_group = '$blood'";
    $res = mysqli_query($conn,$sql) or die("Query failed");

    if(isset($res))
    {
        $row = mysqli_fetch_assoc($res);
        $total = $row['Amount'] + $_POST['amount'];
        $id = $row['ID'];

        $sql = "update bloodbank set Amount = '$total' where ID = '$id'";
        mysqli_query($conn,$sql);

        header("Location: ./Agent.php");
    } else {
        echo "error in query";
    }
    
    //die;
?>