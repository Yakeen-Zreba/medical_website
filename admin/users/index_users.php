<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/users.php");
/* adminOnly();  */
?>
<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Manage Users</title>
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
                <a href="create_users.php" class="btn btn-big">Add User</a>
                <a href="index_users.php" class="btn btn-big">Manage User</a>

            </div>
            <div class="other-content">
              <h2 class="page-title">Manage User</h2> 
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
                    <th>UsersName</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th colspan="3">Actions</th>
                </thead>
                <?php foreach($Users as $key => $user):?>
                    <tbody>
                      <tr>
                          <td><?php echo $key +1 ?></td>
                          <td><?php echo  $user['username']?></td>
                          <td><?php echo  $user['email']?></td>

                          <?php if($user['admin']): ?>
                             <td class="ad_T"><i class="far fa-check-circle"></i></td>
                          <?php else: ?>
                             <td class="ad_F"><i class="far fa-times-circle"></i></td>
                          <?php endif; ?>

                          <td><a href="edit_users.php?id=<?php echo $user['id']; ?>" class="edit"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;edit</a></td>
                          <td><a href="index_users.php?deleteID=<?php echo $user['id']; ?>" class="delete"><i class="fas fa-user-times"></i>&nbsp;&nbsp;delete</a></td>
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
