<?php include "includes/header.php" ?>

<body>

    <div id="wrapper">

    <?php include "includes/nav.php" ?>   

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Dashboard</h1>
                           
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                <tr>
                                    <th>S/N</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                <!-- select all data from database -->
                                <?php include "view_all_post.php"; ?>

                                        
                                </table>
                            </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- delete post -->
    <?php
        include "delete_post.php";
    ?>
    <!-- /#wrapper -->
    <?php include "includes/footer.php"; ?> 
   
