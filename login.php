<?php 
 include("path.php"); 
 include(MAIN_PATH."/app/controllers/users.php");
 visitorsOnly();  
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF_8">
        <link rel="shortcut icon" href="subfolders/image/l.png">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!---CSS Style-->
        <link rel="stylesheet" type="text/css" href="subfolders/css/Formedical_subpage.css" /> 
        
        <!--font-->

        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet"></head>
        <link rel="preconnect" href="https://fonts.gstatic.com"><!--Main Title-->
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"><!--sub Title-->
        
        <!--font-icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        
    
    </head>

    <body>
<!--Loading-->

<section class="loading">
	<div class="loader">
	  <div class="circle"></div>
	  <div class="circle"></div>
	</div>
</section>

<!--End Loading-->


    <section class="main">

        <!--Nav-Bar-->
            <?php include(MAIN_PATH."/app/includes/header_nav.php"); ?>
        <!--End Nav-Bar-->
      
        <!-- content -->
        <div class="out-content">
            <div class="log_reg-boxs l">
              
               <form action="login.php" method="POST" id="login" name="login" class="input-group" onsubmit="return l_check(this)">
                 <div class="log_reg-title">
                     <h1>LogIn</h1>
                     <img src="subfolders/image/n.png" alt=""> 
                 </div>
                 <div class="fontuser">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" class="input-field" value="<?php echo $unam?>" placeholder="Username">
                 </div>
                 <div class="fontpassword">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="input-field" value="<?php echo $pass; ?>" placeholder="Password">
                 </div>
                  <p id="demoo"></p>
            
                <?php if(count($errors)> 0):  ?>
                    <div class="msg error"> 
                     <?php  foreach($errors as $error):  ?>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach;  ?>
                    </div> 
                <?php endif;  ?> 

                  
                  <button type="submit" name="login-btn" class="enter-btn login">LogIn</button>
                  <p class="move_page">Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
                </form>
              
        
        <!-- content -->
<!--------JS For Loading -->
<script>
	const loader = document.querySelector('.loader');
	const main = document.querySelector('.main');
	const loading = document.querySelector('.loading');
	function init(){
	  setTimeout(()=>{
		loader.style.opacity = 0;
		loader.style.display = 'none';
		
		main.style.display = 'block';
		main.style.opacity = 1;
		loading.style.display = 'none'
	  }, 4000);
	}
	init();

</script>

<!--End For Loading----------> 

        <!--JQuery Nav-bar-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
        <!--JS-->
        <script src="subfolders/js/script_Formedical_subpage.js"></script>
                
    </body>
</html>
