<?php 

include "connection.php";
session_start();

if(isset($_POST["submit"])){


    // declare variable if you want to secure use this.
    // the function name mysqli_real_escape_string()
    $username= mysqli_real_escape_string($conn,$_POST["username"]) ;
    $age=mysqli_real_escape_string($conn,$_POST["age"]);
    $email= mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,md5($_POST["password"]));

    // to make a uniqe email registration

    $sql1="SELECT * FROM users WHERE user_email='{$email}'";
    $run_sql1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($run_sql1) > 0){
        header("location:../register.php");
        $_SESSION["error"]="Email all Ready Exist";
    }else{
        $sql="INSERT INTO users (username,age,user_email,passwrd) VALUES ('{$username}',{$age},'{$email}','{$password}')";

        $run_sql=mysqli_query($conn,$sql);
        if($run_sql){
            $_SESSION["message"]="Data insert Successfully";
            header("location:../login.php");
        }else{
            $_SESSION["error"]="Something Wroing";
        }
    }

  
}

?>