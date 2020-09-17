<?php include "includes/header.php"; ?>
  <body>
    <header>
    <?php include "includes/nav.php"; ?>
            <div class="header_blog">
                    <div class="blog_header">
                        <h2 class="blog__heading">Welcome to Wejapa Blog</h2>
                    </div>
                
            </div>
    </header>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog_inner_section">
                   <!-- select all data from database -->
                   <?php
                        $sql = "SELECT * FROM posts";
                        $query = mysqli_query($db_connect, $sql);
                        $i = 1;
                        while($row = mysqli_fetch_assoc($query)){ 
                          $post_id  = $row['id'];
                          $author = $row['author'];
                          $title = $row['title'];
                          $content = $row['content'];
                          $image = $row['image'];
                          $date = formatDate($row['date']); 
                          ?>

                   
                    <div class="blog d-flex mt-5">
                        <div class="col-md-5">
                           <a href="blog_post.php?p_id=<?=$post_id;?>"><img src="assets/<?= $image;?>" alt="blog image" class="blog-image"></a> 
                        </div>
                        <div class="blog__text col-md-6">
                            <h3><?= $title; ?></h3>
                            <p><?= shortenText($content); ?></p>
                            <div class="d-flex">
                                <p class="blog-small mr-1"><i class="fas fa-user mr-2 icon"></i><?= $author; ?></p>
                                <p class="blog-small ml-1"><i class="far fa-calendar-alt mr-2 icon"></i><?= $date; ?></p>
                            </div>
                           <button class="btn btn-blog"><a href="blog_post.php?p_id=<?=$post_id;?>">Continue Reading</a></button>
                        </div>
                    </div> 
                        <?php }  ?>
                </div>
                <div class="col-md-4">
                                    <!-- Blog Search Well -->
                    <div class="well mt-3 mb-4">
                        <h4>Blog Search</h4>
                        <form action="search.php" method="POST">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control">
                                <span class="input-group-btn">
                                    <button name="submit" class="btn btn-primary" type="submit">Search</button>
                                </span>
                                
                            </div>
                        </form> <!-- search form -->
                        
                        <!-- /.input-group -->
                    </div>

                <!-- Blog Categories Well -->
                    <div class="about">
                        <h3 class="about__header">About me</h3>
                        <div class="d-flex">
                            <img src="assets/profile.jpg" alt="profile picture" class="about_image">
                            <div>
                                <h4>Jonathan Doe</h4>
                                <p>Founder & Editor</p>
                                <div class="social-icons">
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-facebook"></i>
                                </div>
                                
                            </div>
                        </div>
                        <p class="about__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos saepe repudiandae minus iure consequuntur. Ipsum mollitia maiores numquam dolores, architecto exercitationem quaerat repudiandae, aspernatur earum adipisci ab neque minima quidem?</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    



    <?php include "includes/footer.php"; ?>