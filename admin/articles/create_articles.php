<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/articles.php"); 
/* adminOnly(); */
?>

<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Add Articles</title>
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
                <a href="create_articles.php" class="btn btn-big">Add Article</a>
                <a href="index_articles.php" class="btn btn-big">Manage Article</a>

            </div>
            <div class="other-content">
              <h2 class="page-title">Add Article</h2> 
              <img src="../../subfolders/image/n.png" alt="">

              <!--the errors-->
              <?php if(count($errors)> 0): ?>
                    <div class="msg error"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
                <?php endif; ?> 


              <form action="create_articles.php" name="article" id="article" method="POST" enctype="multipart/form-data" onsubmit="return a_check(this)">
                <div>  
                  <label>Title</label>
                  <input type="text" name="title" id="title" class="admin-input" value="<?php echo $title; ?>" >
                </div>
                <div>  
                    <label>Text content</label>
                    <textarea name="textContent" id="textContent" class="admin-input"><?php echo $textContent; ?></textarea>
                </div>

                <div>
                    <label >Image</label>
                    <input type="file" name="image"  class="admin-input">
                </div>

                <div>
                    <label >Topics</label>
                    <select name="topicID" class="admin-input">
                    <option value=""></option>
                        <?php foreach($topics as $key => $topic):?>
                            <?php if(!empty($topicID) && $topicID==$topic['id']):?>
                                <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                            <?php endif;?>
                        <?php endforeach; ?>   
                    </select>
                </div>

                <div>
                    <?php if(empty($published)): ?>
                        <label ><input type="checkbox" name="published" >Puplish</label>                 
                    <?php else: ?>
                        <label ><input type="checkbox" name="published" checked >Puplish</label>
                    <?php endif; ?>
                </div>

                <!--the errors-->
                <p id="demoo"></p>
                
                <div>
                    <button type="submit" name="addArticle" class="btn2 btn-big"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
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

    <script>
        ClassicEditor.create( document.querySelector( '#textContent' ), {
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
