<?php
include(MAIN_PATH. "/app/database/db.php");
include(MAIN_PATH. "/app/includes/validity.php");
global $conn;
$errors = array();
$table="articles";
$topics=selectAll('topics');
$articles=selectAll($table);// index_article page مرئي لل   articles لجعل جدول ال 

$id="";
$title="";
$textContent="";
$topicID="";
$published="";

/* create Articles */
if(isset($_POST['addArticle']))
{   
    /* adminOnly(); */
    $exisitingArticle = selectOne($table,['title'=>$_POST['title']]);

    if($exisitingArticle)
    {
     array_push($errors,"This Title alredy exists");
    }

    
    if (!empty($_FILES['image']['name'])) {
        $imgName= time() .'_' . $_FILES['image']['name'];
        $imgPath=MAIN_PATH ."/subfolders/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['image']['tmp_name'],$imgPath);

        if ($r) {
            $_POST['image']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    } 
    else {
        array_push($errors,"The image is required");
    }

    if(count($errors)==0)
    {
        unset($_POST['addArticle']);
        $_POST['userID']=$_SESSION['id'];
        $_POST['published']=isset($_POST['published']) ? 1 : 0;
        $_POST['textContent']=htmlentities($_POST['textContent']);//  من قاعدة البيانات وبالتالي سيتم تشفير هذه البيانات لحمايتها HTML لالغاء اكواد ال

        $articleID=create($table,$_POST);
        $_SESSION['message']='Article created successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/articles/index_articles.php');
        $conn->close();
        exit(); 
    }
    else
    {
        $title=$_POST['title'];
        $textContent=$_POST['textContent'];
        $topicID=$_POST['topicID'];
        $published=isset($_POST['published']) ? 1 : 0;
    }

}

/* Edit Articles  */

if(isset($_GET['id'])) // id ارسال ال  
{
    $article=selectOne($table,['id' => $_GET['id']]);
    $id=$article['id'];
    $title=$article['title'];
    $textContent=$article['textContent'];
    $topicID=$article['topicID'];
    $published=$article['published'];
}

if(isset($_POST['editArticle']))
{
    /* adminOnly(); */

    if(!empty($_FILES['image']['name'])) {
        $imgName= time() .'_' . $_FILES['image']['name'];
        $imgPath=MAIN_PATH ."/subfolders/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['image']['tmp_name'],$imgPath);

        if ($r) {
            $_POST['image']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the image.");
        }
    } 
    else {
        array_push($errors,"The image is required");
    }

    if(count($errors)==0)
    {
        $id=$_POST['id'];
        unset($_POST['editArticle'],$_POST['id']);//الا للوصول الى السجل المراد تعديله id لا نحتاج الى ال 
        $_POST['userID']=$_SESSION['id'];
        $_POST['published']=isset($_POST['published']) ? 1 : 0;
        $_POST['textContent']=htmlentities($_POST['textContent']);//  من قاعدة البيانات وبالتالي سيتم تشفير هذه البيانات لحمايتها HTML لالغاء اكواد ال

        $articleID =update($table,$id,$_POST);
        $_SESSION['message']='Article Updated successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/articles/index_articles.php');
        $conn->close();
        exit(); 
    }
    else
    {
        $title=$_POST['title'];
        $textContent=$_POST['textContent'];
        $topicID=$_POST['topicID'];
        $published=isset($_POST['published']) ? 1 : 0;
    }

}

/* Delete Article */

if(isset($_GET['deleteID'])) // id ارسال ال  
{
  /* adminOnly(); */
  $id=$_GET['deleteID'];
  $delete=delete($table,$id);
  $_SESSION['message']='Article Deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL .'/admin/articles/index_articles.php');
  $conn->close();
  exit();
}

/* Published Article */

if(isset($_GET['published']) && isset($_GET['artID']))
{
    /* adminOnly(); */
    $published=$_GET['published'];
    $artID=$_GET['artID'];
    $updatePublish=update($table,$artID,['published' => $published]);
    $_SESSION['message']='The published state  changed  successfully';
    $_SESSION['type']='success';
    header('location: ' . BASE_URL .'/admin/articles/index_articles.php');
    $conn->close();
    exit();
}