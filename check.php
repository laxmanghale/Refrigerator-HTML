<?php 
session_start();

if (isset($_POST['submit'])) {
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPwd = sha1($password);
    include "databaseconn.php";
    $sql = "SELECT UserId, Email, PasswordHash,UserType FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($res)) {
       
        if ($hashPwd == $row['PasswordHash']) {
       
            $_SESSION['user_login'] = $row['UserId'];
            $_SESSION['error_msg']="";
            $_SESSION['user_type']=$row['UserType'];
            if($_SESSION['user_type']=="Vendor")
            {
                header('location:dashboard.php');
                exit();
            }
            else{
                header('location:customerdashboard.php');
            }
            
        } else {
            $_SESSION['error_msg'] = "Invalid email or password.";
            header("Location: login.php");
            exit();
        }
    } else {
        
        $_SESSION['error_msg'] = "No user found with that email.";
        header("Location: login.php");
        exit();
    }
} else {
   
    header("Location: login.php");
    exit();
}
?>
