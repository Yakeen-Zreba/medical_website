<?php 
include("path.php"); 
include(MAIN_PATH."/app/controllers/articles.php"); 

if(isset($_GET['id']))
{
  $article=selectOne('articles',['id'=>$_GET['id']]); 
}
$topics=selectAll('topics');
$articles=selectAll('articles',['published' => 1]);

?>
<html>
    <head>
        <meta charset="UTF_8">
        <link rel="shortcut icon" href="subfolders/image/l.png">
        <title><?php echo $article['title']; ?> | TakeCare</title> <!-- امكانية اظهار الصفحة عند البحث في القوقل -->
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

        <!--Page Wrapper-->

        <section id="page-wrapper">
            
            <!--Content-->

            <div class="articles-content clearfix">
             
                <!--Main Content Wrapper-->
                
                <div class="main-content-wrapper">
                    <div class="main-content heart-article">
                        
                        <div class="article-title">
                            <h1><?php echo $article['title']; ?></h1>
                            <i class="far fa-calendar">&nbsp;<?php echo date('F j,Y',strtotime($article['createdAt'])); ?></i>
                            <!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;, By Erika Edwards</p> -->
                        </div>

                        <div class="article-content">
                            <img src="<?php echo BASE_URL . '/subfolders/image/' . $article['image']; ?>" alt="">
                            <?php echo html_entity_decode($article['textContent']); ?>
                        </div>
                    
                    </div>
                </div>
                <!--End Main Content-->

                <!--Sidebar-->
                <div class="sideBar heart-article">

                    <div class="section popular">
                        <h2 class="section-title">Popular</h2>
                        
                        <?php foreach($articles as $ar): ?>
                            <div class="article clearfix">
                                <img src="<?php echo BASE_URL . '/subfolders/image/' . $ar['image']; ?>" alt="" >
                                <a href="read_article.php?id=<?php echo $ar['id'];?>" class="title" target="_blank"><?php echo $ar['title']; ?></a>
                            </div>
                        <?php endforeach; ?>
                    
                    </div>

                   <div class="section topics">
                       <h2 class="section-title">Topics</h2>
                       <ul>
                       <?php foreach($topics as $topic): ?>
                            <li><a href="<?php echo BASE_URL .'/articles.php?topicID=' . $topic['id'] .'&topicName='. $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?> 
                       </ul>
                   </div>

                </div>
                <!--End Sidebar-->

            </div>
            <!--End Content-->

        </section>

        <!--End Page Wrapper-->
        
        <!--Footer-->
         <?php  include(MAIN_PATH."/app/includes/footer.php");  ?> 
 
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
