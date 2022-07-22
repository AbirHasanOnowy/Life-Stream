<?php
 session_start();

 if(isset($_SESSION['uname']))
 {
    unset($_SESSION['uname']);
 }

 if(isset($_SESSION['agent']))
 {
    unset($_SESSION['agent']);
 }


 header("Location: ./Login page.php");
 die;
?>