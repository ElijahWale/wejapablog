<?php
// database connection
include "../core/db.php";

$errors = ['username' => '', 'email' => '', 'password' => ''];
// sanitize data
    function sanitize($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
    
        return $data;
    }
if(isset($_POST['submit'])){

    
    // validation for username
    if(empty($_POST['username'])){
        $errors['username'] = "<p>please enter your username</p>";
    }else{
       $username = sanitize(filter_var($_POST['username'], FILTER_SANITIZE_STRING)); 
    }
    // validation for email
    if(empty($_POST['email'])){
        $errors['email']= '<p><strong>Please enter your email address!</strong></p>';
    }else{
         echo $email = sanitize(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = '<p><strong>Please enter a valid email address!</strong></p>';
        }
    }
    // validation for password
    if(empty($_POST['password'])){
        $errors['password'] = '<p><strong>Please enter a Password!</strong></p>';
    // }elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\-!#*@&])[A-Za-z\d_\-!#*@&]{6,10}$/",$_POST['password'])){
    //     $errors['password'] = '<p><strong>Please enter a Password with at least one uppercase,lowercase and characters.</strong></p>';
    }else{
        $password = $_POST['password'];
    }

    if(array_filter($errors)){
    
    }else{

        $username = mysqli_real_escape_string($db_connect, $username);
        $email = mysqli_real_escape_string($db_connect, $email);
        $password = md5(mysqli_real_escape_string($db_connect, $password));

         $_SESSION['username'] = $username;
         $_SESSION['email'] = $email;
         $_SESSION['password'] = $password;

        //  insert data into database
        $sql = "INSERT INTO users(username,email,password)VALUES('{$username}','{$email}','{$password}')";

        $query = mysqli_query($db_connect, $sql);
        
        if ($query) {
            $msg = "<div class='alert alert-success'>You have registered Successfully</div>";
            $_SESSION['msg'] = $msg;
            header("location:login.php");
        } else {
            $errmsg = "<div class='alert alert-danger'>Registration was not Successfull</div>";
            $_SESSION['errmsg'] = $errmsg;
        }




         
    }
}