<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/users.php"); 
/* adminOnly(); */
?>

<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Add User</title>
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

        <!--Admin contet-->
        <div class="admin-content">
            <div class="buttom-gruop">
                <a href="create_users.php" class="btn btn-big">Add User</a>
                <a href="index_users.php" class="btn btn-big">Manage User</a>

            </div>
            <div class="other-content">
              <h2 class="page-title">Add Users</h2>
              <img src="../../subfolders/image/n.png" alt=""> 

              <!--The error-->
              <?php if(count($errors)> 0): ?>
                    <div class="msg error"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
                <?php endif; ?>   


            <form action="create_users.php" method="POST" id="user" name="user"  onsubmit="return u_check(this)">
                <div>
                   <label >UserName</label>
                   <input type="text" name="username" id="username" class="admin-input" value="<?php echo $unam; ?>" >
               </div>
               <div>
                    <label >Email</label>
                    <input type="text" name="email" id="email" class="admin-input" value="<?php echo $em; ?>" >
                </div>
                <div>
                    <label >Password</label>
                    <input type="password" name="password" id="password" class="admin-input" value="<?php echo $pass; ?>" >
                </div>
                <div>
                    <label >Password Confirmation</label>
                    <input type="password" name="passwordConf" id="passwordConf" class="admin-input" value="<?php echo $passConf;?>" >
                </div> 

                <div>
                    <?php if(isset($admin) && $admin==1): ?>
                        <label ><input type="checkbox" name="admin" checked>Admin</label>
                    <?php else: ?>
                        <label ><input type="checkbox" name="admin">Admin</label>
                    <?php endif; ?>    
                </div>
            
             <!--The error-->
             <p id="demo"></p>

                <div>
                    <button type="submit" name="addAdmin" class="btn2 btn-big" style="margin-top:20px;"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
                </div>
                
            </form>
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
     <script src="../../subfolders/js/script_Formedical_subpage.js"></script> 

    </body>

</html>
