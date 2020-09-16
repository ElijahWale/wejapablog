<?php

// sanitize data
    function sanitize($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
    
        return $data;
    }

$errors = "";
    
if(isset($_POST['submit'])){        
    // validation for password
    if(empty($_POST['password'])){
        $errors .= "Please enter a Password!</strong>";
    // }elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_\-!#*@&])[A-Za-z\d_\-!#*@&]{6,10}$/",$_POST['password'])){
    //     $errors['password'] = '<p><strong>Please enter a Password with at least one uppercase,lowercase and characters.</strong></p>';
    }else{
         $password = sanitize($_POST['password']);
    }

    if($errors){
        $_SESSION['queryErr'] =  $errors;
    }else{
        $password = md5(mysqli_real_escape_string($db_connect, $password));
        $sql = "UPDATE users SET password='$password' WHERE email='$email_db'";
        $query_update = mysqli_query($db_connect, $sql);
        // delete the email and token after updating the password
        $sql = "DELETE FROM password_reset WHERE email = $email_db";
        $query_delete = mysqli_query($db_connect, $sql);
        if(!$query_update){
            echo "query error: " . mysqli_error($db_connect);
        }else{
            $_SESSION['success'] ='<div class="alert alert-success" role="alert">' . 'Password  reset is successful' . '</div>';
            header("location:login.php");
        
        }

    }


}

