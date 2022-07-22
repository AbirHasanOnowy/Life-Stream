<?php
session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Request</title>
<style>
body {
    background: url('./request1.jpg')  no-repeat;
    background-size: cover;
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

.Table {
     width: 450px;
     top: 55%;
     left: 50%;
     position: absolute;
     transform: translate(-50%,-50%);
     padding: 40px;
     border-style: hidden;
     border: 15px ;
     border-radius: 5px;
}

.Title {
    color: darkred;
    margin-top: 80px;
    margin-left: 400px;
}

table, th, td {
  border: 1px solid black;
  text-align: center;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
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
  
  <a class="active" href="./Contract.php">Contract</a>
  <a href="./Request.php">Request</a>
  <a href="./About.php">About</a>
</div>

<h1 class="Title">List of camp where you can find our agents</h1>

<div class="Title">
    
    <table>
        <tr>
            <th>Region</th>
            <th>Hospital Name</th>
            <th>Agent Number</th>
        </tr>
        <tr>
            <td rowspan="4">Rupsha</td>
            <td>BRAC MATERNITY Center(BMC)</td>
            <td>01876541232</td>
        </tr>
        <tr>
            <td>Khulna Sadar Hospital</td>
            <td>01573978342</td>
        </tr>
        <tr>
            <td>Khulna Pongu and General Hospital</td>
            <td>01982735231</td>
        </tr>
        <tr>
            <td>khulna Life Care Hospital</td>
            <td>01987892385</td>
        </tr>


        <tr>
            <td>Terokkada</td>
            <td>Terokkhada Hospital</td>
            <td>01692788767</td>
        </tr>
       
        
        <tr>
            <td rowspan="3">Digholia</td>
            <td>Digholia Upozila Health Complex</td>
            <td>01382341231</td>
        </tr>
        <tr>
            <td>Diarrhora Hospital</td>
            <td>01576543213</td>
        </tr>
        <tr>
            <td>Health and Family Center</td>
            <td>01989543216</td>
        </tr>           
        
        <tr>
            <td rowspan="3">Dumuria</td>
            <td>Upozila Health Complex</td>
            <td>01376576534</td>
        </tr>
        <tr>
            <td>Cure Home General Hospital</td>
            <td>01765423903</td>
        </tr>
        <tr>
            <td>Community Clinic,Tolna</td>
            <td>01672832187</td>
        </tr>
       
        
        <tr>
            <td rowspan="2">Phultala</td>
            <td>A Gafur Memorial Hospital</td>
            <td>01777722233</td>
        </tr>
        <tr>
            <td>CMH</td>
            <td>01909889087</td>
        </tr>
       
        
        <tr>
            <td rowspan="2">Botiaghata</td>
            <td>United Hospital</td>
            <td>01767890542</td>
        </tr>
        <tr>
            <td>Botiaghata Upozila Health Complex</td>
            <td>01909876543</td>
        </tr>
       
        
        <tr>
            <td rowspan="3">Paikgaca</td>
            <td>Paikgaca Surgical Hospital</td>
            <td>01323443223</td>
        </tr>
        <tr>
            <td>Paikgaca Upozila Health Complex</td>
            <td>01927384950</td>
        </tr>
        <tr>
            <td>Nurjahan Memorial Hospital</td>
            <td>01865454545</td>
        </tr>
       
        
        <tr>
            <td>Dacope</td>
            <td>Dacope Upozila Health Complex</td>
            <td>01998766789</td>
        </tr>
       
        
        <tr>
            <td rowspan="2">Koyra</td>
            <td>Koyra Hospital and Diagonostic Center</td>
            <td>01344338763</td>
        </tr>
        <tr>
            <td>Gobindapur Community Clinic</td>
            <td>01787878765</td>
        </tr>
       
       
    </table>

</div>


</body>
</html>
