<?php

    // database connection
    include "../core/db.php";
    // sanitize data
        function sanitize($data){
            $data = htmlspecialchars($data);
            $data = trim($data);
            $data = stripslashes($data);
        
            return $data;
        }

    $errors = [ 'email' => '', 'password' => ''];
        
    if(isset($_POST['submit'])){
            // validation for email
        if(empty($_POST['email'])){
            $errors['email']= '<p><strong>Please enter your email address!</strong></p>';
        }else{
          $email = $_POST['email'];
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
            $email = mysqli_real_escape_string($db_connect, $email);
            $password = md5(mysqli_real_escape_string($db_connect, $password));

            // check if email and password exists
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $query = mysqli_query($db_connect, $sql);
            if(!$query){
                $queryErr ='<div class="alert alert-danger">Error running the query!</div>';
                $_SESSION['queryErr'] = $queryErr;
                exit;
            }

            $count = mysqli_num_rows($query);
            //If email & password don't match print error
            if($count !== 1){
                $queryErr = '<div class="alert alert-danger">Wrong Username or Password</div>';
                $_SESSION['queryErr'] = $queryErr;
                
            }else{
                //log the user in: Set session variables
                while($row = mysqli_fetch_assoc($query)){
                    $_SESSION['user_id']=$row['id'];
                    $_SESSION['username']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['isAdmin'] = $row['isAdmin'];
                }
                // success message
                $_SESSION['success'] = '<div class="alert alert-success">Login Successful</div>';
                // redirect to dashboard
                header('location:dashboard.php');
            }
            
        }
    }