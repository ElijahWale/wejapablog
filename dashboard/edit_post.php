<?php include "includes/header.php" ?>
<?php
    $user_id = $_SESSION['user_id'];
    if(isset($_GET['edit-details'])){
        $post_id = $_GET['edit-details'];

        $sql = "SELECT * FROM posts WHERE id = $post_id AND user_id = $user_id";
        $query = mysqli_query($db_connect, $sql);
        
        while($row = mysqli_fetch_assoc($query)){
            $author = $row['author'];
            $title = $row['title'];
            $content = $row['content'];
            $image = $row['image'];
        }

    }
?>
<body>

    <div id="wrapper">

    <?php include "includes/nav.php" ?>   

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <!-- updating post to db -->
                    <?php
                    if(isset($_POST['update_post'])){
                        $post_author = sanitize($_POST['author']);
                        $post_title = sanitize($_POST['title']);
                        $post_content = sanitize($_POST['content']);
                        $post_image = $_FILES['image']['name'];
                        $post_image_temp = $_FILES['image']['tmp_name'];

                        move_uploaded_file($post_image_temp, "../assets/$post_image");

                        $sql = "UPDATE posts SET title='{$post_title}', author='{$post_author}', content='{$post_content}',image='{$post_image}' WHERE id = $post_id AND user_id = $user_id";
                        $query_update = mysqli_query($db_connect, $sql);
                        if(!$query_update){
                            echo "query error: " . mysqli_error($db_connect);
                        }else{
                            echo '<div class="alert alert-success" role="alert">' . 'Update successful' . '</div>';
                        
                        }
                    }
                    ?>
                        <h1 class="page-header">User Dashboard</h1>


                    <form action="" method="post" enctype="multipart/form-data">    
                        
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($title); ?>">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($author);?>">
                        </div>   
                        <div class="form-group">
                            <label for="post_image">Post Image</label><br>
                            <img src="../assets/<?= htmlspecialchars($image);?>" width="100">
                            <input type="file"  name="image">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content</label>
                            <textarea class="form-control "name="content" id="" cols="30" rows="10">
                            <?= htmlspecialchars($content); ?>
                            
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
                        </div>


                    </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/footer.php" ?> 

