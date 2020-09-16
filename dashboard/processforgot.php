<?php
session_start();

include "../core/db.php";
        function sanitize($data){
            $data = htmlspecialchars($data);
            $data = trim($data);
            $data = stripslashes($data);

            return $data;
        }
    $errors = '';
    if(isset($_POST['submit'])){
       // validation for email
        if(empty($_POST['email'])){
            $errors= '<p><strong>Please enter your email address!</strong></p>';
        }else{
            $email = sanitize(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors = '<p><strong>Please enter a valid email address!</strong></p>';
            }
        }

        if($errors){
            $_SESSION['queryErr'] = $errors;
        }else{
    
            $email = mysqli_real_escape_string($db_connect, $email);

                // check if email  exists
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $query = mysqli_query($db_connect, $sql);
           
            if(!$query){
                $queryErr ='<div class="alert alert-danger">Error running the query!</div> ' . mysqli_error($db_connect);
                $_SESSION['queryErr'] = $queryErr;
                exit;
            }
              /**
             * GERATE TOKEN CODE STARTS
             */
            $token ="";
            $alphabets =['a','b','c','d','e','f','g','A','B','C','D','E','F','G'];

            for($i=0;$i < 26;$i++){
                $index =rand(0,count($alphabets)-1);
                $token.= $alphabets[$index];
            }

            /**
             * TOKEN GENERATION ENDS
             */
            $count = mysqli_num_rows($query);
           

            // if email does not match
            if($count > 0){
                $result = mysqli_fetch_assoc($query);
                $db_email = $result['email'];
                $db_id = $result['id'];
                $sql = "INSERT INTO password_reset(id, email, token)VALUES(NULL,'$db_email', '$token')";
                $query = mysqli_query($db_connect, $sql);
                if($query){
                    $to = $db_email;
                    $subject ="Password Reset link";
                    $message ="A password reset has been iniated from your account,if you did not initiate this reset,please 
                    ignore this message, otherwise visit:http://localhost/wejapablog/dashboard/resetpassword.php?token=" . $token;
                    $headers = "From:no-reply@snh.org" ."\r\n".
                    "CC:wale@snh.org";
                    mail($to, $subject, $message, $headers);
                    $_SESSION['success'] = "password reset has been sent to your email: " . $email;
                }
               
            }else{
                $queryErr = '<div class="alert alert-danger">This email address was not registered with us</div>';
                $_SESSION['queryErr'] = $queryErr;
                }
            
        }
        
    }