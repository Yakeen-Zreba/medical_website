<?php 
include("../../path.php"); 
include(MAIN_PATH."/app/controllers/doctors.php"); 
/* adminOnly(); */
?>

<html>

    <head>
        <meta charset="UTF_8">
        <title>Admin Section / Edit Doctor</title>
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
                <a href="create_doctors.php" class="btn btn-big">Add Doctor</a>
                <a href="index_doctors.php" class="btn btn-big">Manage Doctor</a>
           </div>
           <div class="other-content">
              <h2 class="page-title">Add Doctors</h2>
              <img src="../../subfolders/image/n.png" alt=""> 

              <!--The error-->
              <?php if(count($errors)> 0): ?>
                    <div class="msg error"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
                <?php endif; ?>   


            <form action="edit_doctors.php" method="POST" id="doctor" name="doctor" enctype="multipart/form-data"  onsubmit="return d_check(this)">
                <input type="hidden" name="id" value="<?php echo $id; ?>" required>
                <div>
                   <label >DoctorName</label>
                   <input type="text" name="doctorname" id="doctorname" class="admin-input" value="<?php echo $doctorname; ?>" >
               </div>
               <div>
                    <label >Email</label>
                    <input type="text" name="doctoremail" id="doctoremail" class="admin-input" value="<?php echo $email; ?>">
                </div>
                <div>
                    <label >Phone</label>
                    <input type="text" name="doctorphone" id="doctorphone" class="admin-input" maxlength="11" onkeypress="return onlyNumberKey(event)" value="<?php echo $phone; ?>">
                </div>
                <div>
                    <label >Location</label>
                    <input type="text" name="location" id="location" class="admin-input" value="<?php echo $location; ?>" >
                </div> 
                <div>
                    <label >Specialty</label>
                    <input type="text" name="specialty" id="specialty" class="admin-input" value="<?php echo $specialty; ?>">
                </div>
                <div>  
                    <label>Description</label>
                    <textarea name="description" class="admin-input" id="body"><?php echo $description; ?></textarea>
                </div>
                <div>
                    <label >Image</label>
                    <input type="file" name="image"  class="admin-input">
                </div>
            
             <!--The error-->
             <p id="demo"></p>

                <div>
                <button type="submit" name="editdoctor" class="btn2 btn-big"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add</button>
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
