<?php

session_start();
// destroy login sessions
    if(isset($_SESSION['username'])){
        session_destroy();
        session_unset();
        header("location: login.php");
     }  