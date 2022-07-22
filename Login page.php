<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <title>Login Page</title>

</head>


<?php

session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $usertype = $_POST['usertype'];

  if ($usertype == 'donor') {
    $query = "select * from Donor where Username = '$username' and Password = '$password'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['uname'] = $username;
      header("Location: ./Donor info.php");
      die;
    } else {
      echo '<script type="text/javascript">';
      echo 'alert("Invalid Agent username or password")';
      echo '</script>';
    }
  } else if ($usertype == 'agent') {
    $query = "select * from Agent where Username = '$username' and Password = '$password'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['agent'] = $username;
      header("Location: ./Agent.php");
      die;
    } else {
      echo '<script language="javascript">';
      echo 'alert("Invalid Agent username or password")';
      echo '</script>';
    }
  } else {
    echo "Select a user type";
  }
}


?>





<body>

  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: url('./red white.jpg') no-repeat;
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

    .form {
      background-color: rgba(250, 246, 245, 0.6);
      width: 300px;
      top: 50%;
      left: 50%;
      position: absolute;
      transform: translate(-50%, -50%);
      padding: 40px;
      border-style: hidden;
      border: 15px;
      border-radius: 5px;
      box-shadow: 3px 3px 10px #333;
    }

    h1 {
      text-align: center;
      color: red;
      text-shadow: 2px 2px 5px black;
      margin-bottom: 40px;
    }


    ::placeholder {
      color: white;
    }


    .i1 {
      width: 300px;
      height: 30px;
      padding-left: 10px;
      border: none;
      color: white;
      outline: none;
      background-color: #e00d2d;
      box-sizing: border-box;
    }

    .i1:hover {
      background: red;
      box-shadow: 5px 5px 7px darkred;
    }

    .i2 {
      width: 120px;
      height: 30px;
      padding-left: 30px;
      font-size: 13px;
      color: white;
      border: none;
      outline: none;
      background-color: #e00d2d;
      box-sizing: border-box;
    }

    .i2:hover {
      background-color: red;
      box-shadow: 2px 2px 5px darkred;
    }

    .i3 {
      width: 120px;
      height: 30px;
      margin-left: 55px;
      border: none;
      outline: none;
      color: white;
      background-color: #e00d2d;
      box-sizing: border-box;
    }

    .i3:hover {
      background-color: red;
      box-shadow: 2px 2px 5px #333;
    }

    .i4 {
      font-size: 13px;
    }

    .link {
      bottom: 5%;
      left: 45%;
      color: darkred;
      position: absolute;
      font-style: italic;
    }

    .link:hover {
      color: darkblue;
    }
  </style>

  <div class="topnav">
    <a href="./Home.php">Home</a>
    <a class="active" href="./Login page.php">Login</a>
    <a href="./Contract.php">Contract</a>
    <a href="./Request.php">Request</a>
    <a href="./About.php">About</a>
  </div>

  <div class="form">

    <h1> USER Login </h1>

    <form action="#" method="post">

      <span>

        <input class="i1" type="text" id="name" name="username" placeholder="Name" required><br><br>

      </span>

      <span>

        <input class="i1" type="Password" id="pass" name="password" placeholder="Password" required>

      </span><br><br>


      <select class="i2" id="usertype" name="usertype">

        <option class="i4" value="donor" selected>Donor</option>
        <option class="i4" value="agent">Agent</option>

      </select>

      <input class="i3" type="submit" value="Login">

    </form>

  </div>

  <a class="link" href="./donor_form.php">Register as a Donor</a>

</body>

</html>