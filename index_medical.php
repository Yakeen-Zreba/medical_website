<?php 
include("path.php"); 
include(MAIN_PATH."/app/controllers/topics.php"); 
$articlesCO=array();
$articlesCO=COVIDArt();
?>

<html>

<head>
<title>TakeCare</title>

<meta charset="utf-8">
<link rel="shortcut icon" href="subfolders/image/l.png">
<!-- CSS style -->
<link rel="stylesheet" type="text/css" href="subfolders/css/Forindex_medical.css" />

<!--headlines font-->
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet"></head><!--font-->

<!---icons font-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<!--we-content font-->
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

</head>

<body>

<section class="main">

<!--main picture-->
 
<section class="first">
   
   <img class="logo" src="subfolders/image/logo.png" id="H" />
   <p class="logo_text">Take<span>C</span>are</p>

   <div class="first_text">
	 <p class="main_p">WELCOME OUR MEDICAL CARE CENTER</p>
     <h1>Take Care Of Your <span data-text="Health...">Health...</span> </h1>
     <p>We're always available for our Patients with emergent problems </p>
     <div class="first_bnt">
	   <a href="#I"><span></span>Read More</a>
     </div>
	</div>
  
</section>
 
 <!--End main picture-->
 
 <!--Side-Nav-Bar-->
 
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
 <!--End Side-Nav-Bar-->

 
 <!--About Us-->
 <section class="about">

	 <div class="about-container">
		 <div class="about-inner" id="A">
			<h1>About Us</h1>
			<img src="subfolders/image/n.png">
			<p>We is concerned with all aspects of health, illness, and medical treatment  It is committed to publishing work  from a variety of disciplines. we offers readers substantive and lively articles on a variety of themes,up-to-date information on research in progress, a discussion point on topics of current controversy and concern.</p>
	     </div>
	</div>
 </section>
 <!--End About Us-->
  
 <!--More Info-->
 
 <section class="more-info">

   <article class="more-info-container" id="I">
     <div class="more-info-inner">
	    <h2>More Information</h2>
		<h3>Take Care of Yourself</h3>
		<p>Now that you've made the decision to begin your journey to recovery, below are some tools to aid you in the process. Identifying tools and developing plans will help you be more prepared and empowered to take action when it comes to your recovery. </p>
	 </div>
   </article>
   
 </section>
 

 <!--End More Info-->
 
 <!--Services-->
 <section class="services">

	 <div class="service-title" id="S">
			<h1 >Services Us</h1>
			<img src="subfolders/image/n.png">
	 </div>

     <div class="services-container">

		<div class="service-item">
			<i class="fas fa-newspaper"></i>
			<h4>Qualified Information</h4>
			<p>Our goal is to help you take healthy - or healthy - actions every day to live a better life through our periodic articles.</p>
		</div>

		<div class="service-item">
			<i class="fas fa-map-marked-alt"></i>
			<h4>Get to a doctor</h4>
			<p>You can know the whereabouts of the doctors.</p>
		</div>

		<div class="service-item">
			<i class="fas fa-search-location"></i>
			<h4>Find Doctors</h4>
			<p>Find the right care for you and your family. Search for the best doctor in your area.</p>
		</div>

     </div>
 </section>
 
 
 <!--End Services-->
 
 <!--Topics-->

 <section id="topics">

	<div class="topics-container">
		
		<div class="topics-title" id="C">
			<h1 >Topics</h1>
			<img src="subfolders/image/n.png">
		</div>

		<div class="inner-width">
			<div class="topics-inner">

				<?php foreach($topics as $key =>$topic): ?>
					<div class="topics-box">
						<div class="topics-icon">
							<a href="<?php echo BASE_URL .'/articles.php?topicID=' . $topic['id'] .'&topicName='. $topic['name']; ?>" ><img src="<?php echo BASE_URL . '/subfolders/image/' . $topic['icon']; ?>" alt=""></a>
						</div>
						<div class="topics-icon-title"><?php echo $topic['name']; ?></div>
						<div class="topics-desc">
							<p><?php echo $topic['description']; ?></p>
						</div>
					</div>
				<?php endforeach; ?> 

			</div>
		</div>
	</div>
 </section>
 
 <!--End Topics-->

 <!-- Articals -->
 
  <div class="articals_title" id="Ar">
    <h1>New Articals</h1>
	<img src="subfolders/image/n.png">
  </div>
 
<section id="articals-main-container">
 <div class="articals">
 
 
 <?php  foreach($articlesCO as $articleCO):  ?>

   <div class="articals-card">
		<div class="articalsbox">
			<div class="imgBx">
				<img src="<?php  echo BASE_URL . '/subfolders/image/' . $articleCO['image']; ?>" width="320px" height="320px">
			</div>
			<div class="contentBx">
				<div>
					<h2><a href="read_article.php?id=<?php echo $articleCO['id'];?>"><?php echo $articleCO['title'];  ?></a></h2>
					<p><?php  echo html_entity_decode(substr($articleCO['textContent'],0,150). '...');  ?></p>		 
				</div>
			</div>
		</div>
   </div>
 <?php  endforeach;  ?> 


	
 </div>
</section>
 
 <!--End Articals -->

 <!------->
 
 <div class="articals-but">
 <a href="articles.php">All Article</a>
 </div>
 
 <div class="we-container">
	<h3>MEDCLINICIS YOUR #1 MEDICAL SERVICES PROVIDER</h3>
	<p>On our site, you can find a range of health care services for you and your family</p>
 </div>
 


 <!--The Power -->
  
    <div class="power-title">
	  <h1 >The Power of the Take<span>C</span>are Brand</h1>
	  <img src="subfolders/image/n.png">
    </div>
	
  <section class="power">

    <div class="power-container">
	
		<div class="power-card">
		  <div class="power-img">
			<img src="subfolders/image/t.jpg">
		  </div>
		  <div class="power-content">
			<h2>Trusted Site</h2>
			<p>We share the world’s best knowledge, insights and inspiration about health and wellness. Our audience trusts us. They turn to us.</p>
		  </div>
		</div>
		
			<div class="power-card">
		  <div class="power-img">
			<img src="subfolders/image/c.jpg">
		  </div>
		  <div class="power-content">
			<h2>Information Category</h2>
			<p>More unique visitors, page views and engagement across desktop and mobile.</p>
		  </div>
		</div>
		
			<div class="power-card">
		  <div class="power-img">
			<img src="subfolders/image/m.jpg">
		  </div>
		  <div class="power-content">
			<h2> Magazine Read in Doctor’s Offices</h2>
			<p>Available in 85 percent of physician offices nationwide.</p>
		  </div>
		</div>
		
    </div>		
	
  </section>
 
 <!-- End The Power -->
 
  <!-- Footer -->
  
  <?php include(MAIN_PATH."/app/includes/footer.php"); ?>
 <!-- End Footer -->
</section>
  
 <!--JS -->
 <script src="subfolders/js/script_Formedical_subpage.js"></script>

</body>
</html>