<?php 
include("path.php"); 
include(MAIN_PATH."/app/controllers/doctors.php"); 
$titleDoc='ALL Doctors';
$doctors=array();
$ser="";
if(isset($_POST['serch_doctor'])){
    if(!empty($_POST['find_d']))
    {
        $titleDoc="Your Searched For ' " .$_POST['find_d']." '";
        $ser=$_POST['find_d'];
        $doctors=searchDoctor( $ser);
    }
}
else{
    $doctors=selectAll('doctors');
}
?>

<html>
    <head>
        <meta charset="UTF_8">
        <title>TakeCare_DOCTORS</title>
        <link rel="shortcut icon" href="subfolders/image/l.png">
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

        <?php include(MAIN_PATH."/app/includes/header_side_nav.php"); ?>       
          <script>
          var manubutton = document.getElementById("manubutton")
          var sidenav = document.getElementById("sidenav")
          var menu = document.getElementById("menu")
          
          sidenav.style.right = "-250px"
          
          manubutton.onclick = function(){
              if( sidenav.style.right == "-250px"){
                   sidenav.style.right="0";
                   menu.src="subfolders/image/close.png";
               }
              else{
                   sidenav.style.right="-250px";
                   menu.src="subfolders/image/menu.png";
              }
          }
          
          </script>

        <!--End Side-Nav-->

        <!--Page Wrapper-->

        <section id="page-wrapper">
            
            <div class="top-page-container f_d">
                <img class="logo" src="subfolders/image/logo.png" id="H" />
                <p class="logo_text">Take<span>C</span>are</p>
                <div class="top-page-content">
                    <div class="find-doctor">
                        <form action="find_doctors.php" method="post">
                            <h1>Find Doctor</h1>
                            <div class="form-box">
                                <input type="text" name="find_d" id="find_d" class="serch-field" value="<?php echo $ser ?>" placeholder="Provider Name,Specialty Name..">
                                <button type="submit" name="serch_doctor" class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!--Content-->

            <div class="articles-content  clearfix">
             
                <!--Main Content-->
                <div class="main-content">
                   
                   <div class="recent-article-title">
                     <h1><?php echo $titleDoc ?></h1>
                     <img src="subfolders/image/n.png" alt="">
                  </div>
                  
                  <?php foreach($doctors as $doctor): ?>
                    <div class="article f_d clearfix">
                      <img src="<?php echo BASE_URL . '/subfolders/image/' . $doctor['image']; ?>" alt="" class="article-img">
                      <div class="article-preview">
                          <h3><a href="doctor.php?id=<?php echo $doctor['id']; ?>">DR. <?php echo $doctor['doctorname']; ?></a></h3>
                          <p><i class="fas fa-user-md"></i>&nbsp;&nbsp;<?php echo $doctor['specialty']; ?></p>
                          <a href="doctor.php?id=<?php echo $doctor['id']; ?>" class="btn read-more">Read More</a>
                      </div>
                  </div>
                  <?php endforeach;?>

               </div>
                <!--End Main Content-->

            </div>
            <!--End Content-->

        </section>
        
        <!--End Page Wrapper-->
        
        <!--Footer-->
        <?php include(MAIN_PATH."/app/includes/footer.php"); ?>
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