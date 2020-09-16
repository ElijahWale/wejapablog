<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">

    <?php include "includes/nav.php" ?>   

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if(isset($_POST['add_post'])){
                                $post_author = sanitize($_POST['author']);
                                $post_title = sanitize($_POST['title']);
                                $post_content = sanitize($_POST['content']);
                                

                                 // validation for image
                                    $permited = array('jpg', 'jpeg', 'png', 'gif');

                                    $file_name = $_FILES['image']['name'];
                                    $file_size = $_FILES['image']['size'];
                                    $file_temp = $_FILES['image']['tmp_name'];

                                    $div = explode('.', $file_name);
                                    $file_ext = strtolower(end($div));

                                    // give the file a unique id
                                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;

                                    // create this folder "listing-images in your directory, this is where the uploaded image will be stored.
                                    $post_image = "../assets/".$unique_image;

                                    // if file size is more than 2MB
                                    if ($file_size > 2048567) {
                                        echo "<div class='alert alert-danger'>Image Size should not be more than 2MB</div>";
                                    
                                    } 
                                    // if the file uploaded is not of the allowed format above
                                    elseif (in_array($file_ext, $permited) === false) {
                                        echo "<div class='alert alert-danger'>You can upload only:-".implode(', ',$permited)."</div>";
                                    
                                    } else {
                                        // this is responsible for moving the image into the images folder
                                        move_uploaded_file($file_temp, $post_image);
                                        $user_id = $_SESSION['user_id'];
                                        // query database
                                        $sql = "INSERT INTO posts (`title`, `content`, `author`, `image`) VALUES ('$post_title', '$post_content', '$post_author', '$post_image') WHERE user_id = $user_id";
                                        $query = mysqli_query($db_connect, $sql);

                                        if ($query) {
                                            $msg = "<div class='alert alert-success'>New Post Inserted Successfully</div>";
                                            echo $msg;
                                        } else {
                                            $msg = "<div class='alert alert-danger'>Post Not Inserted</div>";
                                            echo $msg;
                                        }


                                    }

                            }

                        ?>
                        <h1 class="page-header">User Dashboard</h1>


                    <form action="" method="post" enctype="multipart/form-data">    
                        
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>   
                        <div class="form-group">
                            <label for="post_image">Post Image</label><br>
                            <input type="file"  name="image">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content</label>
                            <textarea class="form-control "name="content" id="" cols="30" rows="10">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_post" value="Add Post">
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