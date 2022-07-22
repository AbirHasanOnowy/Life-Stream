<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $blood = $_POST['bloodtype'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "insert into Donor (Name,Age,phone_no,total,Blood_group,Username,Password,Address) values ('$name','$age','$phone',0,'$blood','$username','$password','$address');";

  mysqli_query($conn, $query);
  header("Location: ./Login page.php");
  die;
}

?>


<!DOCTYPE html>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Donor Registration</title>

</head>


<body>

  <style type="text/css">
    body {
      background: url('./register page.jpg') no-repeat;
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

    h1 {
      text-align: center;
      color: #052659;
      text-shadow: 2px 2px 5px #a0bff2;
      margin-top: 50px;
    }



    .form {
      background-color: rgba(4, 57, 143, 0.2);
      width: 450px;
      top: 55%;
      left: 50%;
      position: absolute;
      transform: translate(-50%, -50%);
      padding: 40px;
      border-style: hidden;
      border: 15px;
      border-radius: 5px;
    }

    label {
      color: white;
    }

    ::placeholder {
      color: aqua;
      opacity: 0.8;
    }

    .name {
      width: 380px;
      height: 30px;
      padding-left: 10px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }

    .name:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .age:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .phone:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .address:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .username:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .password:hover {
      box-shadow: 2px 2px 5px #052659;
    }

    .age {
      width: 80px;
      height: 30px;
      padding-left: 10px;
      margin-right: 20px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }


    .phone {
      width: 205px;
      height: 30px;
      color: white;
      padding-left: 10px;
      font-size: 13px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }

    .bloodtype {
      width: 100px;
      height: 30px;
      color: white;
      outline: none;
      padding-left: 30px;
      border-radius: 4px;
      background-color: rgba(4, 57, 143, 0.2);
    }

    .bloodtype:hover {
      background-color: rgba(4, 57, 143, 0.8);
    }

    .address {
      width: 362px;
      height: 30px;
      padding-left: 10px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }

    .username {
      width: 342px;
      height: 30px;
      color: white;
      padding-left: 10px;
      font-size: 13px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }

    .password {
      width: 350px;
      height: 30px;
      padding-left: 10px;
      font-size: 13px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-bottom: 2px solid #1f50a1;
      background-color: rgba(4, 57, 143, 0);
    }

    .submit {
      width: 100px;
      height: 30px;
      color: white;
      margin-left: 170px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: rgba(4, 57, 143, 1);
    }

    .submit:hover {
      background-color: darkblue;
      box-shadow: 2px 2px 5px #052659;
    }
  </style>

  <div class="topnav">
    <a href="./Home.php">Home</a>
    <a href="./Login page.php">Login</a>
    <a href="./Contract.html">Contract</a>
    <a href="./Request.php">Request</a>
    <a href="./About.html">About</a>
  </div>


  <h1> Register as a Donor </h1>

  <div class="form">

    <form action="#" method="post">

      <span>

        <label for="name">Name : </label>
        <input class="name" type="text" id="name" name="name" placeholder="Full Name" pattern="[A-Za-z].{2,18}" title="Must contail atleast 2 and max 19 character.
           Capital and small letter only" required><br><br>

      </span>

      <span>

        <label for="age">Age : </label>
        <input class="age" id="age" type="text" name="age" pattern="[0-9].{0,1}" title="please enter 2 digits only" placeholder="Age">

      </span>

      <span>

        <label for="phone">Phone no : </label>
        <input class="phone" id="phone" type="text" name="phone" pattern="[0-9].{10}" title="please enter 11 digits only" placeholder="Phone no (11 digits)"><br><br>

      </span>

      <span>

        <label for="address">Address : </label>
        <input class="address" type="text" id="address" name="address" placeholder="Address" required><br><br>

      </span>

      <span>

        <label for="bloodtype">Select Blood Type : </label>
        <select class="bloodtype" id="bloodtype" name="bloodtype">

          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="O+">O+</option>
          <option value="AB+">AB+</option>
          <option value="A-">A-</option>
          <option value="B-">B-</option>
          <option value="O-">O-</option>
          <option value="AB-">AB-</option>

        </select>
      </span><br><br>

      <span>

        <label for="username">User name : </label>
        <input class="username" id="username" type="text" name="username" placeholder="username" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,11}" title="Must contain at least one number and one uppercase and lowercase letter,
          and at least 8 and max 12 characters" required><br><br>

      </span>

      <span>

        <label for="password">Password : </label>
        <input class="password" id="password" type="text" name="password" placeholder="password (8-12 characters)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,11}" title="Must contain at least one number and one uppercase and lowercase letter,
          and at least 8 and max 12 characters" required><br><br>

      </span>


      <br>


      <span>

        <input class="submit" type="submit" value="Confirm">

      </span>

    </form>

  </div>

</body>

</html>