<?php

include 'connection.php';

if(isset($_POST['signup']))
{
$email=mysqli_real_escape_string($conn, $_POST['email']);
$pass=mysqli_real_escape_string($conn, $_POST['pass']);
$conpass=mysqli_real_escape_string($conn, $_POST['conpass']);


$emailquery=" select * from signup where email='$email'";

$query=mysqli_query($conn , $emailquery);


$emailcount=mysqli_num_rows($query);
if($emailcount>0)
{
    ?>
    <script>
        alert("Email already exist");
        </script>
    <?php
}
else
{
    if($pass===$conpass)
    {
        $insertquery="insert into signup(email , pass) values('$email','$pass')";

        $iquery= mysqli_query($conn,$insertquery);

        if($iquery)
        {
            echo "
            <script>
            alert('Registration Successfully!');
             window.location.href='loginreg.html';
            </script>";
        }
        else{
            ?>
    <script>
        alert("Unsuccessfully!");
        </script>
    <?php
        }
    }
    else{
      echo "
            <script>
             alert('Password Should be Match');
             window.location.href='loginreg.html';
            </script>"; 
    }
}
}