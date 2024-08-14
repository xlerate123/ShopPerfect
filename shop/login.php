<?php

include 'connection.php';

if(isset($_POST['Login']))
{
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $pass=mysqli_real_escape_string($conn, $_POST['pass']);
    echo "<script>
    alert($email);
    window.location.href='loginreg.html';
    </script>
    ";
    
    $emailquery=" select * from signup where email='$email' && pass='$pass'";
    
    $query=mysqli_query($conn , $emailquery);
    
    
    $emailcount=mysqli_num_rows($query);
    if($emailcount>0)
    {
        header('location:index.html');
    }
    else
    {
                echo "<script>
                alert('Login Failed');
                window.location.href='loginreg.html';
                </script>
                ";
    }
           
}