<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./dashboard.php">User Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <?php 
               if(isset($_SESSION['user_id'])){ ?>
                   <li class="nav-item active">
                    <a class="nav-link" href="./../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./logout.php">LogOut </a>
                    </li>
              <?php } else{ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="./login.php">Login </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./signup.php">Sign Up </a>
                </li>
              <?php } ?>
                
                
                
            
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="./dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="add_post.php"><i class="fa fa-fw fa-edit"></i> Add Post</a>
                    </li>
                   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>