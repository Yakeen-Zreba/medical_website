<?php 
include("../path.php"); 
include(MAIN_PATH."/app/controllers/topics.php"); 
/* adminOnly();  */ 
?>

<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!---CSS Style-->
        <link rel="stylesheet" type="text/css" href="../subfolders/css/Formedical_subpage.css" />
        
        <!---Admin Style-->
        <link rel="stylesheet" type="text/css" href="../subfolders/css/admin.css" />

        <!--headlines font-->
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet"></head>

        <!--font-icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!--Unique Style-->
        <style>
        .welcom{
            text-align: center; 
            background-color: rgba(0,0,0,.1);
            font-size:50px;
            color:green;
            border-radius: 20px;
            width: 350px;
            height: 300px;
            margin: auto;
            position: absolute;
            top: 130px;
            left: 155px;
            right: 0;
            bottom: 0;
         }
         i{
            font-size:100px;
            padding-top:6px;
        } 
        p{
            margin-top:0;
        }
        </style>
    </head>

    <body>

    <section class="main-admin">
        
    <!--Nav-Bar-->
    <header id="nav-bar">
        <div class="nav-logo">
            <img src="../subfolders/image/logo.png">
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
    <!--End Nav-Bar-->

    <!--Admin Page Wrapper-->

    <section id="Admin-wrapper">

        <!--left sidebar-->
        <div class="left-sidebar">
            <ul>
                <li ><a href="<?php echo BASE_URL .'/admin/articles/index_articles.php' ?>">Manage Article</a></li>
                <li ><a href="<?php echo BASE_URL .'/admin/topics/index_topics.php' ?>">Manage Topics</a></li>
                <li ><a href="<?php echo BASE_URL .'/admin/users/index_users.php' ?>">Manage Users</a></li>
                <li ><a href="<?php echo BASE_URL .'/admin/doctors/index_doctors.php' ?>">Manage Doctors</a></li>
                <li ><a href="<?php echo BASE_URL .'/admin/index_comments.php' ?>">Show Comments</a></li>
            </ul>
        </div>
        <!--End left sidebar-->

        <!--Admin content-->
        <div class="admin-content">
            <div class="other-content">
              <h2 class="page-title">Dashboard</h2> 
              <img src="../subfolders/image/n.png" alt="">
              <div class="welcom">
                <i class="far fa-check-circle"></i>
                <p>Welcom Admin :)</p>
              </div>
            </div>
        </div>
        <!--End Admin content-->
    </section>
        
    <!--End Admin Page Wrapper-->


    </section>

    <!--JQuery Nav-bar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
                
    <!--Ckeditor 5-->
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <!--JS -->
    <script src="../subfolders/js/script_Formedical_subpage.js"></script>

    </body>

</html>
