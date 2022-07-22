<?php
  session_start();
  
  include("connection.php");

  if(isset($_SESSION['uname']))
  {
    $username = $_SESSION['uname'];
    $sql = "select * from Donor where Username = '$username'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc( $result);
  }
?>

<!DOCTYPE html>
<html>
  
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Donor info</title>
  
  </head>

  
  <body>

    <style type="text/css">
      body {
  background: url('./donor info.jpg') no-repeat;
  background-size: cover;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


  .topnav {
      overflow: hidden;
      background-color: #2c78f2;
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
      background-color: #04378a;
      color: white;
    }

    .topnav a.active {
      background-color: #052659;
    }

  .title1 {
      float: left;
      color: #052659;
      text-shadow: 2px 2px 5px #a0bff2;
      margin-top: 100px;
      margin-left: 170px;
    }

  .title2 {
      float: right;
      color: #052659;
      text-shadow: 2px 2px 5px #a0bff2;
      margin-top: 100px;
      margin-right: 200px;
    }


  .Info {
     background-color: rgba(4, 57, 143, 0.2);
     width: 400px;
     top: 55%;
     left: 40%;
     position: absolute;
     color: white;
     transform: translate(-90%,-50%);
     padding: 40px;
     border-style: hidden;
     border: 15px ;
     border-radius: 5px;
    }


  .requests {
     background-color: rgba(4, 57, 143, 0.2);
     width: 450px;
     min-height: 220px;
     top: 55%;
     right: 5%;
     color: aqua;
     position: absolute;
     transform: translate(-10%,-50%);
     padding: 40px;
     border-style: hidden;
     border: 15px ;
     border-radius: 5px;
    }


  .logout {
      background-color: rgb(5, 107, 175);
      color: white;
      margin-top: 28%;
      margin-left: 590px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 4px;
      padding-left: 40px;
      padding-right: 40px;
      padding-top: 10px;
      padding-bottom: 10px;
      box-sizing: border-box;
      box-shadow: 2px 2px 5px #052659;
    }

  .logout:hover {
    background-color: red;
    box-shadow: 2px 2px 5px #052659;
   } 
    
    </style>

    <div class="topnav">
      <a href="./Home.php">Home</a>
      <a class="active" href="./Donor info.php">Profile</a>
      <a href="./Contract.php">Contract</a>
      <a href="./Request.php">Request</a>
      <a href="./About.php">About</a>
    </div>
    

    <h1 class="title1"> Donor Information </h1>
    <h1 class="title2"> Messege from agent </h1>

    <div class="Info">

      <p>ID : <?php echo $row['ID'];?></p>
      <p>Name : <?php echo $row['Name'];?></p>
      <p>Age :  <?php echo $row['Age'];?></p>
      <p>Phone no : <?php echo "0" .$row['phone_no'];?></p>
      <p>Address : <?php echo $row['Address'];?></p>
      <p>Blood Type : <?php echo $row['Blood_group'];?></p>
      <p>Total amount of blood donated : <?php echo $row['total'];?></p>

  
    </div>

    <div class="requests">
      <p>
        <?php
          $blood = $row['Blood_group'];
          $sql = "select * from BloodBank where Blood_group = '$blood'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);

          if($row['Amount'] > 10) {
            echo "Thank you for joining with us";
          } else {
            echo "Need Blood From Donors For The Blood Bank";
          }
        ?>
      </p>
    </div>

    <button class="logout" onclick="window.location.href = './Logout.php';">Log out</button>


  </body>

</html>