<?php
include(MAIN_PATH. "/app/database/db.php");
include(MAIN_PATH. "/app/includes/validity.php");
$errors = array();
$table='topics';
$topics=selectAll($table);
$id='';
$name='';
$icon='';
$description='';

/* Create Topic */

if(isset($_POST['addTopic']))
{       
    /* adminOnly(); */
    $exisitingTopic = selectOne($table,['name'=>$_POST['name']]);

    if($exisitingTopic)
    {
     array_push($errors,"This Topic alredy exists");
    }
    
    if (!empty($_FILES['icon']['name'])) {
        $imgName= time() .'_' . $_FILES['icon']['name'];
        $imgPath=MAIN_PATH ."/subfolders/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['icon']['tmp_name'],$imgPath);

        if ($r) {
            $_POST['icon']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the icon.");
        }
    } 
    else {
        array_push($errors,"The icon is required");
    }


    if(count($errors)==0)
    {
        unset($_POST['addTopic']);
        $_POST['description']=htmlentities($_POST['description']);
        $topicID = create($table,$_POST);
        $_SESSION['message']='Topic created successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/topics/index_topics.php');
        $conn->close();
        exit();
    }
    else
    {
        $name=$_POST['name'];
        $description=$_POST['description'];
    }
}

/* Edit Topic */

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $topic=selectOne($table,['id' =>$id]);
    $id=$topic['id'];
    $name=$topic['name'];
    $icon=$topic['icon'];
    $description=$topic['description'];
}

if(isset($_POST['editTopic']))
{
    /* adminOnly(); */
    
    if (!empty($_FILES['icon']['name'])) {
        $imgName= time() .'_' . $_FILES['icon']['name'];
        $imgPath=MAIN_PATH ."/subfolders/image/" .$imgName;
        
        $r= move_uploaded_file($_FILES['icon']['tmp_name'],$imgPath);

        if ($r) {
            $_POST['icon']=$imgName;
        } 
        else {
            array_push($errors,"There is an error uploading the icon.");
        }
    } 
    else {
        array_push($errors,"The icon is required");
    }

    if(count($errors)==0)
    {
        $id=$_POST['id'];
        unset($_POST['editTopic'],$_POST['id']);
        $_POST['description']=htmlentities($_POST['description']);
        $topicID=update($table ,$id ,$_POST);
        $_SESSION['message']='Topic Updated successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/topics/index_topics.php');
        $conn->close();
        exit();
    }
    else
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $description=$_POST['description'];
    }
}

/* delete topic */

if(isset($_GET['deleteID']))
{
  /* adminOnly(); */
  $id=$_GET['deleteID'];
  $delete=delete($table,$id);
  $_SESSION['message']='Topic deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL .'/admin/topics/index_topics.php');
  $conn->close();
  exit();
}