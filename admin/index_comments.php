<?php 
include("../path.php"); 
include(MAIN_PATH. "/app/database/db.php");
include(MAIN_PATH. "../app/includes/validity.php");
/* adminOnly();  */
$comments=selectAll('comment');

/* delete comment */

if(isset($_GET['deleteID']))
{
  adminOnly();
  $id=$_GET['deleteID'];
  $delete=delete('comment',$id);
  $_SESSION['message']='Comment deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL .'/admin/index_comments.php');
  $conn->close();
  exit();
}
?>
<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Show Comments</title>
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

    </head>

    <body>

    <section class="main-admin">
        
    <!--Nav-Bar-->
    <header id="nav-bar">
        <div class="nav-logo">
            <img src="../subfolders/image/whitelogo.png">
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
              <h2 class="page-title">Show Comments</h2> 
              <img src="../subfolders/image/n.png" alt="">  

              <?php if (isset($_SESSION['message'])): ?>
                <div class="msg <?php echo $_SESSION['type']; ?>">
                <li><i class="fas fa-check-circle"></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                <?php
                /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                unset($_SESSION['message']);
                unset($_SESSION['type']);
                ?>
                </div>
              <?php endif; ?>  

              <table>
                <thead>
                    <th>SN</th>
                    <th>Email</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </thead>
                <?php foreach($comments as $key => $comment):?>
                    <tbody>
                      <tr>
                          <td><?php echo $key +1 ?></td>
                          <td><?php echo  $comment['email']?></td>
                          <td><?php echo  $comment['comment']?></td>
                          <td><a href="index_comments.php?deleteID=<?php echo $comment['id']; ?>" class="delete" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;delete</a></td>
                      </tr>
                  </tbody>
                <?php endforeach; ?>  

              </table>  
            </div>
        </div>
        <!--End Admin content-->
    </section>
        
    <!--End Admin Page Wrapper-->


    </section>

    <!--JQuery Nav-bar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <!--JS -->
    <script src="../../js/script_Formedical_subpage.js"></script>

    </body>

</html>
