<?php 
include("../dB/config.php");
session_start();

if(isset($_POST['register'])){
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $cpassword =$_POST['cpassword'];
    $phoneNumber =$_POST['phoneNumber'];
    $gender =$_POST['gender'];
    $birthday =$_POST['birthday'];

    //Check if password and confirm password match
    if($password != $cpassword){
        $_SESSION['status'] = "Password do not match!";
        $_SESSION['status_code'] = "error";
        header('Location: ../regostration.php');
        exit(0);
    }

    //Check if eamil address is already exists
    $checkQuery = "SELECT * FROM 'users' WHERE 'email' = $email";
    $result = mysqli_query($con, $checkQuery);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['status'] = "Email address is already taken";
        $_SESSION['status_code'] = "error";
    }

    //Insert into database
    $query = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `phoneNumber`, `gender`, `birthday`) VALUES ('$firstname','$lastname','$email','$password','$cpassword','$phoneNumber','$gender','$birthday')";

    if(mysqli_query($con, $query)){
        $_SESSION['status'] = "Registration Success!";
        $_SESSION['status_code'] = "success";
        header('Location: ../login.php')
        exit(0);
    }
    else{
        echo "Error:" .mysqli_error($con);
    }
}

?>