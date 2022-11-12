<?php

include('../config.php');
session_start();

if(isset($_POST['submit']) && $_POST['email'] != '' && $_POST['password'] != '' ){
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sqll = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $user = mysqli_query($connect, $sqll);


    if( mysqli_num_rows($user) > 0 ) {
        $_SESSION['user']=$email;
        header("location:index.php");
    }else{
        header("location:login.php");
    } 
}
else {
    echo "dang nhap that bai";  
}
?>