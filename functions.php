<?php

function check_login($conn)
{
    if(isset($_SESSION['uname']))
    {
        $username = $_SESSION['uname'];
        $sql = "select * from Donor where Username = '$username' limit 1";

        $result =mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            $user_data = mysqli_fetch-assoc($result);
            return $user_data;
        }
    }

    header("Location: ./Login page.php");
    die;
}

?>