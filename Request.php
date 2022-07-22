<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_POST['name'];
    $amount = $_POST['amnt'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $blood = $_POST['bloodtype2'];
    $area = $_POST['location'];
    $camp = $_POST['Hname'];

    if($area == 'Region' || $area == '')
    {
      echo '<script type="text/javascript">';
      echo 'alert("Select Region and Hospital for request")';
      echo '</script>';
    } else {
      $query = "insert into Request (Name,Amount,phone_no,Address,Blood_group,Hospital) values ('$name','$amount','$phone','$address','$blood','$camp');";
      mysqli_query($conn,$query);

      $sql = "select * from BloodBank where Blood_group = '$blood'";
      $res = mysqli_query($conn,$sql) or die("Query failed");

      $row = mysqli_fetch_assoc($res);
        $total = $row['Amount'] - $amount;
        $id = $row['ID'];

        $sql = "update bloodbank set Amount = '$total' where ID = '$id'";
        mysqli_query($conn,$sql);

      header("Location: ./Home.php");
      die;
    }

    
}

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

.topleft {
  position: absolute;
  top: 30px;
  left: 50px;
}

.request { 
     width: 450px;
     min-height: 220px;
     top: 50%;
     left: 30%;
     position: absolute;
     transform: translate(-10%,-50%);
     padding: 40px;
     border-style: hidden;
     border: 15px ;
     border-radius: 5px;
}

.bloodtype {
    width: 80px;
    height: 25px;
    color: white;
    outline: none;
    padding-left: 30px;
    border-radius: 4px;
    background-color: darkred;
}




.name {
      width: 380px;
      height: 30px;
      padding-left: 10px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid darkred;
    }


    .req_amnt {
      width: 80px;
      height: 30px;
      padding-left: 10px;
      margin-right: 20px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid darkred;
    }


    .phone {
      width: 205px;
      height: 30px;
      padding-left: 10px;
      font-size: 13px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid darkred;
    }

    .camp {
      width: 300px;
      height: 30px;
      color: white;
      outline: none;
      padding-left: 30px;
      border-radius: 4px;
      background-color: darkred;
    }


    .address {
      width: 362px;
      height: 30px;
      padding-left: 10px;
      border: none;
      outline: none;
      box-sizing: border-box;
      border-bottom: 2px solid darkred;
    }

    
    .submit {
      width: 150px;
      height: 30px;
      color: white;
      margin-left: 170px;
      font-size: 16px;
      border: none;
      outline: none;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: rgb(143, 4, 4);
    }

    .submit:hover {
      background-color: darkgreen;
      box-shadow: 2px 2px 5px #052659;
    }

    .selection {
        margin-top: 200px;
    }

    .region {
      width: 90px;
      height: 30px;
      color: white;
      outline: none;
      padding-left: 10px;
      border-radius: 4px;
      background-color: darkred;
    }

    .Hospital_name {
      width: 250px;
      height: 30px;
      color: white;
      outline: none;
      padding-left: 10px;
      border-radius: 4px;
      background-color: darkred;
    }

</style>
</head>
<body>

<div class="topnav">
  <a  href="./Home.php">Home</a>
  
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
  <a class="active" href="./Request.php">Request</a>
  <a href="./About.php">About</a>
</div>



<div class="request">
    <h1 class="heading">
        Make a request for blood
    </h1>

        <form  action="#" method="post">
    
            <span>
             
               <label for="name">Name : </label>
               <input class="name" type="text" id="name" name="name" placeholder="Full Name" 
               pattern="[A-Za-z].{2,18}" title="Must contail atleast 2 and max 19 character" required><br><br>
           
            </span>
     
            <span>
               
               <label for="amnt">Amount of blood : </label>
               <input class="req_amnt" id="amnt" type="text" name="amnt" placeholder="Amount" pattern="[0-9].{0,1}" title=" Atleast 1 and highest 2 digits only" required><br><br>
     
            </span>
     
            <span>
               
               <label for="phone">Phone no : </label>
               <input class="phone" id="phone" type="text" name="phone" placeholder="Phone no (11 digits)"  pattern="[0-9]+.{10}" title="11 digits only" required><br><br>
     
            </span>
     
             <span>
             
               <label for="address">Address : </label>
               <input class="address" type="text" id="address" name="address" placeholder="Address" required><br><br>
           
             </span>

             
     
             <span>
     
               <label for="bloodtype2">Select Blood Type : </label>
               <select class="bloodtype" id="bloodtype2" name="bloodtype2" >
             
               <option   value="A+">A+</option>
               <option   value="B+">B+</option>
               <option   value="O+">O+</option>
               <option   value="AB+">AB+</option>
               <option   value="A-">A-</option>
               <option   value="B-">B-</option>
               <option   value="O-">O-</option>
               <option   value="AB-">AB-</option>
                 
               </select>
            </span><br><br>
            
            
            <span>
            <label class="selection" for="location">Select region </label>
            <select  class="region" id="location" name="location" onchange="newopt(this.id,'Hname')">
          
              <option   value="Region">- Region -</option>
              <option   value="Rupsha">Rupsha</option>
              <option   value="Terokkhada">Terokkada</option>
              <option   value="Digholia">Digholia</option>
              <option   value="Dumuria">Dumuria</option>
              <option   value="Phultala">Phultala</option>
              <option   value="Botiaghata">Botiaghata</option>
              <option   value="Paikgaca">Paikgaca</option>
              <option   value="Dacope">Dacope</option>
              <option   value="Koyra">Koyra</option>
              
            </select>
         </span><br><br>
        
         <span>
            <label for="Hname">Hospitals  </label>
            <select class="Hospital_name" name="Hname" id="Hname">
               <option value="hos-name">- Hospital Name -</option>
            </select>
         </span>

         <script type="text/javascript">

            function newopt(l,h) {
                var l = document.getElementById(l);
                var h = document.getElementById(h);

                h.innerHTML = "";

                if(l.value == "Rupsha") {
                    var optionArray = ['BRAC Maternity Center(BMC)|BRAC Maternity Center(BMC)','Khulna Sadar Hospital|Khulna Sadar Hospital','Khulna Life Care Hospital|Khulna Life Care Hospital','Khulna Pongu and General Hospital|Khulna Pongu and General Hospital'];
                } else if (l.value == "Terokkhada") {
                    var optionArray = ['Terokkhada Hospital|Terokkhada Hospital'];
                } else if (l.value == "Digholia") {
                    var optionArray = ['Digholia Upozila Health Complex|Digholia Upozila Health Complex','Diarrhea Hospital|Diarrhea Hospital','Health and Family Center|Health and Family Center'];
                } else if (l.value == "Dumuria") {
                    var optionArray = ['Upazila Health Complex|Upazila Health Complex','Cure Home General Hospital|Cure Home General Hospital','Community Clinic,tolna|Community Clinic,tolna'];
                } else if (l.value == "Phultala") {
                    var optionArray = ['A Gafar memorial Hospital|A Gafar memorial Hospital','CMH|CMH'];
                } else if (l.value == "Botiaghata") {
                    var optionArray = ['United Hospital|United Hospital','Botiaghata Upozila Health Complex|Botiaghata Upozila Health Complex'];
                } else if (l.value == "Paikgaca") {
                    var optionArray = ['Paikgaca Surgical Hospital|Paikgaca Surgical Hospital','Paikgaca Upozila Health Complex|Paikgaca Upozila Health Complex','Nurjahan Memorial Hospital|Nurjahan Memorial Hospital'];
                } else if (l.value == "Dacope") {
                    var optionArray = ['Dacope Upazila Health Complex|Dacope Upazila Health Complex'];
                } else if (l.value == "Koyra") {
                    var optionArray = ['Koyra Hospital and Diagonostic Center|Koyra Hospital and Diagonostic Center','Gobindapur Community Clinic|Gobindapur Community Clinic'];
                }

                for(var option in optionArray) {
                    var pair = optionArray[option].split("|");
                    var newoption = document.createElement("option");

                    newoption.value = pair[0];
                    newoption.innerHTML = pair[1];
                    h.options.add(newoption);
                }

            }

            
         </script>
            
            
            <br><br><br>
         
            <span>
     
             <input class="submit" type="submit" value="Confirm Request">
           
            </span>
        </form>
</div>


</body>
</html>
