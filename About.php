<?php
session_start();

include("connection.php");

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: url('./About Us.jpg') no-repeat;
  background-size: cover;
}

.topnav {
  overflow: hidden;
  background-color: darkred;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #eb5062;
  color: black;
}

.topnav a.active {
  background-color: #f70505;
  color: white;
}

.container {
  position: relative;
}

.topleft {
  position: absolute;
  top: 30px;
  left: 50px;
}


.heading {
  color: darkred;
  font-size: 30px;
  margin-top: 50px;
}

.desc {
  color: black;
  font-size: 18px;
  margin-right: 30px;
}

</style>
</head>
<body>

<div class="topnav">
  <a href="./Home.php">Home</a>

  <?php
     if(isset($_SESSION['uname'])) 
     {
        echo '<a href="./Donor info.php">';
        echo 'Profile';
        echo'</a>';
     }
     else {
        echo '<a href="./Login page.php">';
        echo 'Login';
        echo'</a>';
     }?>

  <a href="./Contract.php">Contract</a>
  <a href="./Request.php">Request</a>
  <a class="active" href="./About.php">About</a>
</div>

  <div class="topleft">
    
    <h1 class="heading">Introduction</h1>
    <p class="desc">Life Stream is a private organization where many donor donate their blood for saving lives. We have camps all over khulna. We have a blood bank where limited amount of blood is stored for emergency supply. Here we have many active donors who has been working with us for a long time. Any new donor is welcome here.</p>

    <h1 class="heading">Donation</h1>
    <p class="desc">In this organization any donor can donate their blood after registration. Donors need to test their blood in the camps every time before donation for the safety for the patients. Unhealthy persons are not allowed to donate blood.</p>

    <h1 class="heading">Blood Supply</h1>
    <p class="desc">
      In order to get blood from the bank, check if we have enough blood in our storage.
      If we have enough,select the nearest camp and then make a request for blood specifing the amount you need.
      Contract our agents from that camp to receive the supply you asked for.
    </p>

    <h1 class="heading">Agents</h1>
    <p class="desc">We have agents in various hospitals in Khulna. They are qualified to test donors and supply blood to clients. Make request for blood supply from the website first then contract the clients from nearest hospital to get supply</p>

  </div>


</body>
</html>
