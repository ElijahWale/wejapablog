<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Wejapa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                    
                    <?php
                    if(!isset($_SESSION['user_id'])){?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard/signup.php">Sign up</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard/login.php">Log in</a>
                        </li>
                   <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
                        </li>
                  <?php } ?>
                  </ul>
                </div>
            </nav>