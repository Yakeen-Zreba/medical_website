<?php 
include("path.php"); 
include(MAIN_PATH."/app/controllers/topics.php"); 

$articles=array();
$titleArt='Recent Articles';

if(isset($_GET['topicID']))
{
    $titleArt="Your Searched For Articles Under  ' " .$_GET['topicName']." '";
    $articles=getArtByTopic($_GET['topicID']);
}
else if(isset($_POST['search-Art']))
{
    $titleArt="Your Searched For ' " .$_POST['search-Art']." '";
    $articles=searchArt($_POST['search-Art']);
}
else{
    $articles=getPublishArt();
}

?>

<html>
    <head>
        <meta charset="UTF_8">
        <link rel="shortcut icon" href="subfolders/image/l.png">
        <title>TakeCare_articles</title>
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

        <!--article Wrapper-->

        <section id="article-wrapper">
            
            <div class="top-page-container">
                <img class="logo" src="subfolders/image/logo.png" id="H" />
                <p class="logo_text">Take<span>C</span>are</p>
                <div class="top-page-content">
                    <p>At TakeCare, we strive to provide you with high-quality medical content. Our articles are written by professional writers, and whenever possible, medically reviewed by health care providers.</p>
                </div>
            </div>

            <!--article Side-->
            <div class="article-side">

                <div class="article-side-title">
                   <h1>Trending Articles</h1>
                   <img src="subfolders/image/n.png" alt="">
                </div>

                <i class="fa fa-chevron-left prev"></i>
                <i class="fa fa-chevron-right next"></i>

                <div class="article-wrapper">
                    <?php foreach($articles as $article): ?>
 
                        <div class="article">
                        <img src="<?php echo BASE_URL . '/subfolders/image/' . $article['image']; ?>" alt="" class="slider-img">
                        <div class="article-info">
                            <h4><a href="read_article.php?id=<?php echo $article['id'];?>"><?php echo $article['title']; ?></a></h4>
                            <i class="far fa-user"><?php echo $article['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar">&nbsp;<?php echo date('F j,Y',strtotime($article['createdAt'])); ?></i>
                        </div>  
                        </div>

                    <?php endforeach; ?>
                </div>

            </div>

            <!--End article Side-->
            
            <!--Content-->

            <div class="articles-content clearfix">
             
                <!--Main Content-->
                <div class="main-content">
                   
                    <div class="recent-article-title">
                      <h1><?php echo $titleArt; ?></h1>
                      <img src="subfolders/image/n.png" alt="">
                    </div>
                   

                    <?php foreach($articles as $article): ?>
                       <div class="article clearfix">
                        <img src="<?php echo BASE_URL . '/subfolders/image/' . $article['image']; ?>" alt="" class="article-img">
                        <div class="article-preview">
                            <h3><a href="read_article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
                            <i class="far fa-user"><?php echo $article['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar">&nbsp;<?php echo date('F j,Y',strtotime($article['createdAt'])); ?></i>
                            <p class="preview-text"><?php echo html_entity_decode(substr($article['textContent'],0,152). '...'); ?></p>
                            <a href="read_article.php?id=<?php echo $article['id']; ?>" class="btn read-more">Read More</a>
                        </div>
                       </div>
                    <?php endforeach; ?>

                </div>
                <!--End Main Content-->

                <!--Sidebar-->
                <div class="sideBar">

                   <div class="section search">
                       <h2 class="section-title">Search</h2>
                       <form action="articles.php" method="post">
                           <input type="text" name="search-Art" class="text-input" placeholder="Search...">  <!--تلميحة تساعد المستخدم في معرفة المدخلات التي عليه كتابتها في الحقل، ويجب ألّا تحتوي قيمة هذه الخاصية على أسطر جديدة placeholder-->
                       </form>
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

    <!--End Page Wrapper-->
        
        <!--Footer-->
        <?php include(MAIN_PATH."/app/includes/footer.php"); ?>
        <!--End Footer-->

    </section>
  

        <!--JQuery Nav-bar-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
       
        <!--JS article Side-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <!--JS -->
        <script src="subfolders/js/script_Formedical_subpage.js"></script>
        
        
    </body>

</html>