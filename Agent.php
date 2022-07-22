<?php
  session_start();
  
  include("connection.php");

  
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



  .title1 {
      float: left;
      color: #052659;
      text-shadow: 2px 2px 5px #a0bff2;
      margin-top: 80px;
      margin-left: 170px;
    }

  .title2 {
      float: right;
      color: #052659;
      text-shadow: 2px 2px 5px #a0bff2;
      margin-top: 80px;
      margin-right: 240px;
    }


  .Info {
     background-color: rgba(4, 57, 143, 0.2);
     width: 400px;
     height: 220px;
     top: 45%;
     left: 40%;
     position: absolute;
     color: white;
     transform: translate(-90%,-50%);
     padding: 40px;
     border-style: hidden;
     color:aqua;
     border: 15px ;
     border-radius: 5px;
     overflow-x: hidden;
     overflow-y: auto;
    }


    ::placeholder {
      color: white;
    }


    .did {
      width: 80px;
      height: 30px;
      padding-left: 10px;
      margin-top: 40px;
      margin-right: 20px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-radius: 4px;
      border-bottom: 2px solid #1f50a1;
      background-color: rgb(5, 107, 175);
    }

    .did:hover {
      background-color: #0924ad;
      box-shadow: 2px 2px 5px #052659;
    }

    .amount {
      width: 100px;
      height: 30px;
      color: white;
      outline: none;
      margin-top: 40px;
      padding-left: 30px;
      border-radius: 4px;
      background-color: rgb(5, 107, 175);
    }

    .amount:hover {
      background-color: #0924ad;
    box-shadow: 2px 2px 5px #052659;
    }



  .entry {
     background-color: rgba(4, 57, 143, 0.2);
     width: 450px;
     min-height: 220px;
     top: 45%;
     right: 5%;
     color: aqua;
     position: absolute;
     transform: translate(-10%,-50%);
     padding: 40px;
     border-style: hidden;
     border: 15px ;
     border-radius: 5px;
    }

  .submit {
      background-color: #0924ad;
      color: white;
      margin-top: 20px;
      margin-left: 130px;
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


  .submit:hover {
    background-color: darkblue;
    box-shadow: 2px 2px 5px #052659;
   }
   
   .action {
     top : 70%;
     left: 40%;
     position: absolute;
     color: white;
     transform: translate(-100%,-25%);
     padding: 40px;
     border-style: hidden;
     color: darkblue;
     border: 15px ;
     border-radius: 5px;
     overflow-x: hidden;
     overflow-y: auto;
   }


   .rid {
      width: 80px;
      height: 30px;
      padding-left: 10px;
      margin-top: 40px;
      margin-right: 20px;
      border: none;
      outline: none;
      color: white;
      box-sizing: border-box;
      border-radius: 4px;
      border-bottom: 2px solid #1f50a1;
      background-color: rgb(5, 107, 175);
    }

    .rid:hover {
      background-color: #0924ad;
      box-shadow: 2px 2px 5px #052659;
    }

    .accept {
      background-color: rgb(5, 107, 175);
      height:30px;
      color: white;
      margin-top: 20px;
      margin-left: 20px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 4px;
      padding-left: 10px;
      padding-right: 10px;
      box-sizing: border-box;
  }


  .accept:hover {
    background-color: darkblue;
    box-shadow: 2px 2px 5px #052659;
   }

   .reject {
      background-color: rgb(5, 107, 175);
      height:30px;
      color: white;
      margin-top: 20px;
      margin-left: 20px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 4px;
      padding-left: 25px;
      padding-right: 25px;
      box-sizing: border-box;
  }


  .reject:hover {
    background-color: darkblue;
    box-shadow: 2px 2px 5px #052659;
   }


  .logout {
      background-color: rgb(5, 107, 175);
      color: white;
      margin-top: 32%;
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

    <h1 class="title1"> Request List </h1>
    <h1 class="title2"> Donation Entry </h1>

    <div class="Info">

    <ul>
    <?php

    if(isset($_SESSION['agent']))
    {
      $username = $_SESSION['agent'];
      $sql = "select * from Agent where Username = '$username'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc( $result);

      $_POST['camp'] = $row['Hospital'];
      $hospital = $row['Hospital'];
      $sql = "select * from Request where Hospital = '$hospital'";
      $result = mysqli_query($conn,$sql);

      $resultCheck = mysqli_num_rows($result);
      if( $resultCheck > 0){
           while($row = mysqli_fetch_assoc( $result)){
           	echo '<li>';
            echo 'Request ID : ';
            echo $row['ID'];
            echo '<br>';
            echo 'Name : ';
            echo $row['Name'];
            echo '<br>';
            echo 'Blood Group : ';
            echo $row['Blood_group'];
            echo '<br>';
            echo 'Amount : ';
            echo $row['Amount'];
            echo '<br>';
            echo 'Phone No : ';
            echo $row['phone_no'];
            echo '</li>';
            echo '<br>';
           } }
    }
    
    ?>
    </ul>

    </div>

    <div class="entry">

    <form action="./donation entry.php" method="post">

    <span>
       
       <label for="did">Donor ID : </label>
       <input class="did" id="did" type="text" name="did" placeholder="ID">

    </span>

 
     <span>

       <label for="amount">Donation Amount : </label>
       <select class="amount" id="amount" name="amount">
     
         <option   value="1">1 Bag</option>
         <option   value="2">2 Bags</option>
         
       </select>
    </span><br><br>

    <span>

     <input class="submit" type="submit" value="Confirm">
   
    </span>

   </form> 
    </div>

    <div class="action">

    <form action="./accept request.php" method="post">

      <span>
       
        <label for="rid">Accept Request : </label>
        <input class="rid" id="rid" type="text" name="rid" placeholder="ID">

      </span>

      <input class="accept" type="submit" value="Complete">

   </form>

   <form action="./delete request.php" method="post">

      <span>
       
        <label for="rid">Reject Request : </label>
        <input class="rid" id="rid" type="text" name="rid" placeholder="ID">

      </span>

      <input class="reject" type="submit" value="Reject">

   </form>

    </div>

    <button class="logout" onclick="window.location.href = './Logout.php';">Log out</button>


  </body>

</html>