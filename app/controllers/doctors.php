<?php
include(MAIN_PATH. "/app/database/db.php"); 
include(MAIN_PATH. "/app/includes/validity.php"); 

$table='doctors';
$errors = array();
$doctors=selectAll('doctors');
$id='';
$doctorname='';
$email='';
$phone='';
$location='';
$specialty='';
$description=""; 

/* Create Doctor */

if(isset($_POST['adddoctor']))
{       
    /* adminOnly(); */
    $exisitingDoctor = selectOne($table,['doctoremail'=>$_POST['doctoremail']]);

    if($exisitingDoctor)
    {
     array_push($errors,"This doctor alredy exists");
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
        unset($_POST['adddoctor']);
        $_POST['description']=htmlentities($_POST['description']);
        $doctorID = create($table,$_POST);
        $_SESSION['message']='the Doctor created successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/doctors/index_doctors.php'); 
        $conn->close();
        exit();
    }
    else
    {
        $doctorname=$_POST['doctorname'];
        $email=$_POST['doctoremail'];
        $phone=$_POST['doctorphone'];
        $location=$_POST['location'];
        $specialty=$_POST['specialty'];
        $description=$_POST['description'];
    } 
}

/* Edit Doctor */

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $doctor=selectOne($table,['id' =>$id]);
    $id=$doctor['id'];
    $doctorname=$doctor['doctorname'];
    $email=$doctor['doctoremail'];
    $phone=$doctor['doctorphone'];
    $location=$doctor['location'];
    $specialty=$doctor['specialty'];
    $description=$doctor['description'];
}

if(isset($_POST['editdoctor']))
{
    /* adminOnly(); */
    
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
        $id=$_POST['id'];
        unset($_POST['editdoctor'],$_POST['id']);
        $doctorID=update($table ,$id ,$_POST);
        $_SESSION['message']='Doctor Updated successfully';
        $_SESSION['type']='success';
        header('location: ' . BASE_URL .'/admin/doctors/index_doctors.php'); 
        $conn->close();
        exit();
    }
    else
    {
        $doctorname=$_POST['doctorname'];
        $email=$_POST['doctoremail'];
        $phone=$_POST['doctorphone'];
        $location=$_POST['location'];
        $specialty=$_POST['specialty'];
        $description=$_POST['description'];
    }
}

/* delete topic */

if(isset($_GET['deleteID']))
{
  /* adminOnly(); */
  $id=$_GET['deleteID'];
  $delete=delete($table,$id);
  $_SESSION['message']='Doctor deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL .'/admin/doctors/index_doctors.php');
  $conn->close();
  exit();
}