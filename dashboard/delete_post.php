<?php

if(isset($_GET['delete-post'])){
        $p_id = $_GET['delete-post'];

        $sql = "DELETE FROM posts WHERE id = $p_id";
        $query = mysqli_query($db_connect, $sql);
        if(!$query){
            echo "query error: " . mysqli_error($db_connect);
        }else{
            echo '<div class="alert alert-success" role="alert">' . 'Delete successful' . '</div>';
        }
    }
