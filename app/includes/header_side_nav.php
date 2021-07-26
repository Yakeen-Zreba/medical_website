
<div id="sidenav">
   <nav>
    <ul>
      <?php if(isset($_SESSION['id'])): ?>  <!--logIn اذا المستخدم -->
      <li name="us">
          <a href="#">
          <i class="fas fa-user"></i>
          &nbsp;<?php echo $_SESSION['username']; ?>
          </a>
      </li>

      <?php if ($_SESSION['admin']):?> <!--if admin = true = 1-->
          <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>"><i class="fas fa-th"></i>&nbsp;&nbsp;Dashbord</a></li>
      <?php endif; ?>   

      <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;logout</a></li> 
     <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
        <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li> 
     <?php endif; ?>
      <li><a href="index_medical.php#H"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
      <li><a href="index_medical.php#A"><i class="fas fa-address-card"></i>&nbsp;&nbsp;About Us</a></li>
      <li><a href="index_medical.php#S"><i class="fas fa-user-md"></i>&nbsp;&nbsp;Service</a></li>
      <li><a href="index_medical.php#C"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;Topics</a></li>
      <li><a href="<?php echo BASE_URL . '/articles.php' ?>"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;Articles</a></li>
      <li><a href="<?php echo BASE_URL . '/COVID.php' ?>"><i class="fas fa-virus"></i>&nbsp;&nbsp;COVID</a></li>
      <li><a href="<?php echo BASE_URL . '/find_doctors.php' ?>"><i class="fas fa-search-location"></i>&nbsp;&nbsp;Find Doctor</a></li>
    </ul>
   </nav> 
 </div>
 
 <div id="manubutton">
   <img src="subfolders/image/menu.png" id="menu">
 </div>  

