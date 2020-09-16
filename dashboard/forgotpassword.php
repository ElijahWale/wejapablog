<?php 
include "processforgot.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Forgot Password</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel ="stylesheet" type='text/css' href="css/style.css">
</head>
<body>
<div class="container">
        <div class="w-full max-w-xs">

        
       
            <!-- error message -->
            <?php 
                if(isset($_SESSION['queryErr']) &&  !empty($_SESSION['queryErr'])){
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' text-center >" . $_SESSION['queryErr'] . "<button type = 'button' class='close' data-dismiss='alert' arial-label='Close'>" . "<span aria-hidden='true'>" . '&times;'. "</span>" ."</div>";
                    unset($_SESSION['queryErr']);
                }

                if(isset($_SESSION['success']) &&  !empty($_SESSION['success'])){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert' text-center >" . $_SESSION['success'] . "<button type = 'button' class='close' data-dismiss='alert' arial-label='Close'>" . "<span aria-hidden='true'>" . '&times;'. "</span>" ."</div>";
                    unset($_SESSION['success']);
                }
            ?>
             <h1 class="font-sans font-bold text-4xl mb-4 text-lg text-gray-800 text-center text-white">
            Forgot Password
            </h1>
            <form action="" class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-200" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
                </div>
                <div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline btn-block" type="submit" name="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>