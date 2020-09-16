<?php 
session_start();
include "signupprocess.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog logIn</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel ="stylesheet" type='text/css' href="css/style.css">
</head>
<body>

   
    <div class="container">
        <div class="w-full max-w-xs">
            <?php
                // error message
                if(isset($_SESSION['errmsg']) && !empty($_SESSION['errmsg'])){
                    echo $_SESSION['errmsg'];
                    unset($_SESSION['errmsg']);
                } 
            ?>
            <h1 class="font-sans font-bold text-4xl mb-4 text-lg text-gray-800 text-center text-white">
            Sign Up
            </h1>
            <form action="" class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-200" method="POST">
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
                <small class="red"><?= $errors['username']; ?></small>
                </div>
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="email">
                <small class="red"><?= $errors['email']; ?></small>
                </div>
                <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight" id="password" name="password" type="password" placeholder="******************">
                <small class="red"><?= $errors['password']; ?></small>
                </div>
                <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                    Sign Up
                </button>
                <a class="inline-block align-baseline font-bold text-md text-blue-500 hover:text-blue-800" href="login.php">
                   Sign in
                </a>
                </div>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>