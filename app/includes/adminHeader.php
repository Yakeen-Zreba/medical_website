<header id="nav-bar">
        <div class="nav-logo">
            <img src="../../subfolders/image/logo.png">
            <h1 class="nav-logo-text">Take<span>C</span>are</h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
        <?php if(isset($_SESSION['username'])): ?>
            <li><a href="<?php echo BASE_URL .'/index_medical.php' ?>">Home</a></li>
            <li>
                <a href="#">
                    &nbsp;&nbsp;<?php echo $_SESSION['username'];?>
                    <i class="fa fa-chevron-down down-menu" style="font-size: 0.8em;"></i>
                </a>
                <ul>
                    <li><a href="<?php echo BASE_URL .'/logout.php'; ?>" class="logout">logout</a></li>
                </ul>
            </li>
        <?php endif;?>
        </ul>
    </header>