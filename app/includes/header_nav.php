
<header id="nav-bar">
            <div class="nav-logo">
                <img src="subfolders/image/logo.png">
                <h1 class="nav-logo-text">Take<span>C</span>are</h1>
            </div>
            <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
                <li><a href="index_medical.php#H">Home</a></li>
                <li><a href="index_medical.php#A">About Us</a></li>
                <li><a href="index_medical.php#S">Service</a></li>
                <li><a href="index_medical.php#C">Topics</a></li>
                <li><a href="<?php echo BASE_URL . '/articles.php' ?>">Articles</a></li>
                <li><a href="<?php echo BASE_URL . '/COVID.php' ?>">COVID</a></li>
                <li><a href="<?php echo BASE_URL . '/find_doctors.php' ?>">Find Doctor</a></li>
                
                <?php if(isset($_SESSION['id'])): ?> <!--logIn اذا المستخدم -->
                    <li>
                        <a href="#">
                        <i class="fas fa-user"></i>
                        &nbsp;<?php echo $_SESSION['username']; ?>
                        <i class="fa fa-chevron-down down-menu" style="font-size: 0.8em;"></i>
                        </a>
                        <ul>
                            <?php if ($_SESSION['admin']):?> <!--if admin = true = 1-->
                                <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><i class="fas fa-th"></i>&nbsp;&nbsp;Dashbord</a></li>
                            <?php endif; ?>    

                            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                     <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
                     <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
                <?php endif; ?>
               
            </ul>
        </header>