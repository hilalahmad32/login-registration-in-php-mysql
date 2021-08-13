<?php 

include "connection.php";
session_start(); 
if(isset($_POST["submit"])){
    $email= mysqli_real_escape_string($conn,$_POST["email"]);
    $password= mysqli_real_escape_string($conn,md5($_POST["password"]));


    $sql="SELECT * FROM users WHERE user_email='{$email}' AND passwrd='{$password}'";

    $run_sql=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run_sql) > 0){
        while($row=mysqli_fetch_assoc($run_sql)){
            $_SESSION["user_id"]=$row["users_id"];
            $_SESSION["message"]="Login successfully";
            header("location:../dashboard.php");
        }
    }else{
        header("location:../login.php");
        $_SESSION["error"]="Invalid Email and Password";
    }
}
