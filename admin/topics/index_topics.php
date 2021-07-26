<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/topics.php"); 
/* adminOnly(); */
?>
<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Manage Topics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!---CSS Style-->
        <link rel="stylesheet" type="text/css" href="../../subfolders/css/Formedical_subpage.css" />
        
        <!---Admin Style-->
        <link rel="stylesheet" type="text/css" href="../../subfolders/css/admin.css" />

        <!--headlines font-->
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet"></head>

        <!--font-icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    </head>

    <body>

    <section class="main-admin">
        
    <!--Nav-Bar-->
    <?php include(MAIN_PATH ."/app/includes/adminHeader.php"); ?>
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
            <div class="buttom-gruop">
              <a href="create_topics.php" class="btn btn-big">Add Topic</a>
              <a href="index_topics.php" class="btn btn-big">Manage Topic</a>
            </div>
            <div class="other-content">
              <h2 class="page-title">Manage Topics</h2> 
              <img src="../../subfolders/image/n.png" alt="">

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
                    <th>Name</th>
                    <th colspan="2">Actions</th>
                  </thead>
                  <tbody>
                    <?php foreach($topics as $key =>$topic): ?>
                      <tr>
                          <td><?php echo $key + 1; ?></td>
                          <td><?php echo $topic['name']; ?></td>
                          <td><a href="edit_topics.php?id=<?php echo $topic['id']; ?>" class="edit"><i class="fas fa-pen-alt"></i>&nbsp;&nbsp;edit</a></td>
                          <td><a href="index_topics.php?deleteID=<?php echo $topic['id']; ?>" class="delete" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;delete</a></td>
                      </tr>
                    <?php endforeach; ?> 
                  </tbody>
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
