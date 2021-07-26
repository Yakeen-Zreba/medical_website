<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/topics.php"); 
/* adminOnly(); */
?>

<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Add topic</title>
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

        <!--Admin sidebar-->
        <div class="admin-content">

           <div class="buttom-gruop">
                <a href="create_topics.php" class="btn btn-big">Add Topic</a>
                <a href="index_topics.php" class="btn btn-big">Manage Topic</a>
            </div>

            <div class="other-content">
              <h2 class="page-title">Add Topics</h2> 
              <img src="../../subfolders/image/n.png" alt="">

              <p id="demoo"></p>

              <?php if(count($errors)> 0): ?>
                    <div class="msg error"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
                <?php endif; ?> 

              <form action="create_topics.php" name="topic" id="topic" method="POST" enctype="multipart/form-data" onsubmit="return t_check(this)">
                <div>  
                  <label>Name</label>
                  <input type="text" name="name" class="admin-input" value="<?php echo $name; ?>">
                </div>
                <div>
                    <label >Icon</label>
                    <input type="file" name="icon"  class="admin-input" value="<?php echo $icon; ?>">
                </div>
                <div>  
                    <label>Description</label>
                    <textarea name="description" class="admin-input" id="body"><?php echo $description; ?></textarea>
                </div>
                <div>
                    <button type="submit" name="addTopic" class="btn2 btn-big"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
                </div>
              </form>
            </div>

        </div>
        <!--End Admin sidebar-->
    </section>
        
    <!--End Admin Page Wrapper-->


    </section>

    <!--JQuery Nav-bar-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
                
    <!--Ckeditor 5-->
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <!--JS -->
     <script src="../../subfolders/js/script_Formedical_subpage.js"></script>
   
     <script>
    ClassicEditor.create( document.querySelector( '#body' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

   </script>   

    </body>

</html>
