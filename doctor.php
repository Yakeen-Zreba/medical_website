<?php 
include("path.php"); 
include(MAIN_PATH."/app/controllers/doctors.php"); 

if(isset($_GET['id']))
{
  $doctor=selectOne('doctors',['id'=>$_GET['id']]); 
}

?>

<html>
    <head>
        <meta charset="UTF_8">
        <link rel="shortcut icon" href="subfolders/image/l.png">
        <title><?php echo $doctor['doctorname']; ?> | TakeCare</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!---CSS Style-->
        <link rel="stylesheet" type="text/css" href="subfolders/css/Formedical_subpage.css" />
        
        <!--headlines font-->
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet"></head>

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
        
        <!--Side-Nav-->

        <?php include(MAIN_PATH."/app/includes/header_nav.php"); ?>       
          
        <!--End Side-Nav-->

        <!--Page Wrapper-->

        <section id="page-wrapper">

            <div class="doctor-title">
                <h1>You Search For :</h1>
                <img src="subfolders/image/n.png" alt="">
            </div>

            <div class="doctor">
                <div class="pers-img">
                 <img src="<?php echo BASE_URL . '/subfolders/image/' . $doctor['image']; ?>">
                </div>
                <div class="pers-content">
                  <h3>DR. <?php echo $doctor['doctorname']; ?></h3>
                  <p><i class="fas fa-user-md"></i>&nbsp;&nbsp;<?php echo $doctor['specialty']; ?><p>
                  <p><i class="fas fa-phone"></i>&nbsp;&nbsp;<?php echo $doctor['doctorphone']; ?></p>
                  <p><i class="fas fa-envelope"></i>&nbsp;&nbsp;<?php echo $doctor['doctoremail']; ?></p>
                  <p><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;<?php echo $doctor['location']; ?></p>
                  <!-- <p><?php/*  echo $doctor['description']; */ ?></p> -->
                </div>   
            </div>

        </section>
        
        <!--End Page Wrapper-->
        
        <!--Footer-->
        <!-- <?php /* include(MAIN_PATH."/app/includes/footer.php");  */?> -->
        <section id="footer">
            
            <div class="footer-content">
                <div class="footer-section about">
                    <div class="footer-logo">
                        <img src="subfolders/image/logo.png" alt="">
                        <h1 class="footer-logo-text">Take<span>C</span>are</h1>
                    </div>
                    <p class="about-parg">
                        Bring your stories to life with accurate and unique healthcare data that grabs a reader's attention. Tap our team of experts to help fill in the blanks on pressing issues and trends in healthcare that make your stories stand out.
                    </p>
                    <div class="contact">
                        <span><i class="fas fa-phone"> &nbsp; 092-1234567</i></span>
                        <span><i class="fas fa-envelope"> &nbsp; info@yakenzr.com</i></span>
                    </div>
                    
                    <div class="socials">
                        
                        <div class="social-button">
                            <div class="social-icon">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <span>Facebook</span>
                        </div>
        
                        <div class="social-button">
                            <div class="social-icon">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <span>Instagram</span>
                        </div>
        
                        <div class="social-button">
                            <div class="social-icon">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                            <span>Twitter</span>
                        </div>
        
                        <div class="social-button">
                            <div class="social-icon">
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                            <span>Dribbble</span>
                        </div>
                </div>
                
             </div>
        
                
        
            </div>
            
            <div class="footer-bottom">
                Copyright &copy; designed by <span>Yaken Zreba</span>
            </div>
        
        </section>
        <!--End Footer-->

        </section>
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
       
        <!--JS article Side-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <!--JS -->
        <script src="subfolders/js/script_Formedical_subpage.js"></script>
        
        
    </body>

</html>