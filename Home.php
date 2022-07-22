<?php
session_start();
include("connection.php");

function get_amount($conn,$group)
{
    $sql = "select * from BloodBank where Blood_group = '$group'";
    $result = mysqli_query($conn,$sql);
    $bankBloodAmount = mysqli_fetch_assoc($result);
    return $bankBloodAmount['Amount'];
}

$AP = get_amount($conn,'A+');
$BP = get_amount($conn,'B+');
$OP = get_amount($conn,'O+');
$ABP = get_amount($conn,'AB+');
$AN = get_amount($conn,'A-');
$BN = get_amount($conn,'B-');
$ON = get_amount($conn,'O-');
$ABN = get_amount($conn,'AB-');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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

img { 
  width: 100%;
  height: 550px;
  opacity: 0.8;
}

.heading {
  color: darkred;
  font-size: 80px;
}

.desc {
  color: darkred;
  font-style: italic;
  font-size: 40px;
}



.bank {
  margin-top: 30px;
  margin-left: 100px;
  margin-right: 100px;
  margin-bottom: 200px;
}


.heading2 {
  color: darkred;
  margin-top: 80px;
  font-size: 30px;
}

li {
  font-weight: bold;
  color: darkblue;
}


</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="./Home.php">Home</a>

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
  <a href="./About.php">About</a>
</div>

<div class="container">
  <img src="./blood sampling.jpg" alt="Blood sampling" width="1000" height="100">
  <div class="topleft">
    
    <p class="heading">Welcome to Life Stream</p>
    <p class="desc">Join with us as a Donor <br>
      Because saving lives is what we do<br> 
    </p>

  </div>
</div>

<div class="bank">
     <h1 class="heading2">Available blood in our Blood Bank now : </h1>
     <ul>
        <li>Blood type A+ : <?php echo $AP;?> bags</li>
        <li>Blood type B+ : <?php echo $BP;?> bags</li>
        <li>Blood type O+ : <?php echo $OP;?> bags</li>
        <li>Blood type AB+ : <?php echo $ABP;?> bags</li>
        <li>Blood type A- : <?php echo $AN;?> bags</li>
        <li>Blood type B- : <?php echo $BN;?> bags</li>
        <li>Blood type O- : <?php echo $ON;?> bags</li>
        <li>Blood type AB- : <?php echo $ABN;?> bags</li>
     </ul>

     <br><br><br>

     <h1 class="heading2">Benefits of blood donation : </h1>
     <ol>
        <li>Prevents hemochromatosis : </li>
        <p>
        Donating blood would reduce the risk of developing hemochromatosis.
        This health condition could be inherited at our cost due to alcoholism, anaemia and various other disorders.
        </p>
        <li>Blood cell production</li>
        <p>After a person donates blood, the body will replenish the blood loss by stimulating the production of new blood cells.
           The new blood cells would help in maintaining a person’s good health.  </p>
        <li>Lowering cancer risk</li>
        <p>Donating blood helps lower the risk of cancer as the iron stores in the blood are maintained at healthy levels. When there is a reduced iron level in the body, it is linked to lower cancer risk.
           At the same time, when the iron is too low in the body, it leads to iron deficiency and other related health conditions.</p>
        <li>Heart and liver health</li>
        <p>Donating blood is beneficial as it reduces the risk of heart and liver ailments which are caused due to iron overload in the body.
           When people consume excess food in the body, they only absorb limited proportions, and the rest of it gets stored in the heart, liver, or pancreas.
          <br>Excess iron present in the body will increase the risk of developing health conditions like liver failure, pancreatic damage, or heart abnormalities. <br>
          Therefore, by donating blood, the body can maintain the required levels of iron and reduce the risk of various health conditions.
         </p>
     </ol>
</div>
  

</body>
</html>
