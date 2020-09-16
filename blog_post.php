<?php include "includes/header.php"; ?>
  <body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Wejapa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
                    </li>
                  </ul>
                </div>
            </nav>
            <div class="header_blog">
                    <div class="blog_header">
                        <h2 class="blog__heading">Welcome to Wejapa Blog</h2>
                    </div>
                
            </div>
    </header>
    <section id="blog-single">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                   
                    <div class="blog-single_post">
                          <!-- select all data from database -->
                      <?php
                            if(isset($_GET['p_id'])){
                                $the_post_id = $_GET['p_id'];
                            }
                            $sql = "SELECT * FROM posts WHERE id = $the_post_id";
                            $query = mysqli_query($db_connect, $sql);
                            while($row = mysqli_fetch_assoc($query)){ 
                              $author = $row['author'];
                              $title = $row['title'];
                              $content = $row['content'];
                              $image = $row['image'];
                              $date = formatDate($row['date']); 
                        ?>
                        <img src="assets/<?= $image;?>" alt="blog_post image" class="blog_single_image">
                        <div class="blog-single__text">
                            <h2><?= $title; ?></h2>
                            <div class="d-flex">
                                <p class="blog-small mr-3"><i class="fas fa-user mr-2 icon"></i><?= $author; ?></p>
                                <p class="blog-small"><i class="far fa-calendar-alt mr-2 icon"></i><?= formatDate($date); ?></p>
                            </div>
                            <div>
                                <p><?= $content; ?></p>
                                
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


<?php include "includes/footer.php"; ?>
