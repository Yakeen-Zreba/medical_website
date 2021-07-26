<?php
include(MAIN_PATH. "/app/database/db.php");// register.php لانه موجود في ال  path لل  include   لا يتم عمل   
include(MAIN_PATH. "/app/includes/validity.php");
$table="users";
$Users= selectAll($table);
$errors = array(); 
$id="";
$unam="";
$em="";
$pass="";
$passConf="";
$admin="";

/* register & Add user or admin from dashboard*/

if(isset($_POST['register-btn']) || isset($_POST['addAdmin'])){


      $exisitingUser = selectOne($table,['email'=>$_POST['email']]);

      if($exisitingUser){
         array_push($errors,"Email alredy exists");
      }
     
      if(count($errors)==0)
      {  
        unset($_POST['register-btn'],$_POST['passwordConf'],$_POST['addAdmin']);
        $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);//password عمل تشفير لل
        
        if (isset($_POST['admin'])) {
          $_POST['admin']=1;  
          $user_id=create($table, $_POST);//للسجل الذي سينم اضافته index ترجع الدالة قيمة ال
          $_SESSION['message']="Add Admin successfully";
          $_SESSION['type']="success";
          header('location: '.BASE_URL.'/admin/users/index_users.php');
          exit();
        } 
        else {
          $_POST['admin']=0; 
          $user_id=create($table, $_POST);
          $user=selectOne($table,['id'=>$user_id]);
           /*LogIn user */
          $_SESSION['id']=$user['id'];
          $_SESSION['username']=$user['username'];
          $_SESSION['admin']=$user['admin'];

          if ($_SESSION['admin']) {
          header('location: '.BASE_URL.'/admin/dashboard.php');
          } 
          else {
          header('location: '.BASE_URL.'/index_medical.php');
          }
          $conn->close();
          exit();
        }
        }  
         else{
         $unam=$_POST['username'];
         $admin=isset($_POST['admin']) ? 1 : 0;
         $em=$_POST['email'];
         $pass=$_POST['password'];
         $passConf=$_POST['passwordConf'];
      } 
}

/* login */

if(isset($_POST['login-btn'])){

    $user=selectOne($table,['username' => $_POST['username']]);
    if($user && password_verify($_POST['password'],$user['password'])) // hash تستخدم لتحقق من كلمة المرور المدخلة مع ال 
    {
      $_SESSION['id']=$user['id'];
      $_SESSION['username']=$user['username'];
      $_SESSION['admin']=$user['admin'];

      if ($_SESSION['admin']) {
       header('location: '.BASE_URL.'/admin/dashboard.php');
      } else {
       header('location: '.BASE_URL.'/index_medical.php');
      }
      $conn->close();
      exit();
    }
     else{
      array_push($errors,'there is error');
    }  
    $unam=$_POST['username'];
    $pass=$_POST['password'];
      
}




/* Edit Admin */

if(isset($_POST['editAdmin']))
{
  /* adminOnly(); */
  if(count($errors)==0)
  { 
    $id=$_POST['id'];
    unset($_POST['passwordConf'],$_POST['editAdmin'],$_POST['id']);
    $_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $_POST['admin']=isset($_POST['admin']) ? 1 : 0;  
    $updateAdmin=update($table,$id,$_POST);
    $_SESSION['message']="The Ubdated successfully";
    $_SESSION['type']="success";
    header('location: '.BASE_URL.'/admin/users/index_users.php');
    $conn->close();
    exit();
   } 
  else{
     $unam=$_POST['username'];
     $admin=isset($_POST['admin']) ? 1 : 0;
     $em=$_POST['email'];
     $pass=$_POST['password'];
     $passConf=$_POST['passwordConf'];
  }
}

if(isset($_GET['id']))
{
  $user=selectOne($table,['id' => $_GET['id']]);
  $id=$user['id'];
  $unam=$user['username'];
  $admin=$user['admin'];
  $em=$user['email'];
}

/* Delete Admin */
if(isset($_GET['deleteID']))
{
  /* adminOnly(); */
  $deleteAdmin=delete($table,$_GET['deleteID']);
  $_SESSION['message']="Admin deleted successfully";
  $_SESSION['type']="success";
  header('location: '.BASE_URL.'/admin/users/index_users.php');
  $conn->close();
  exit();
}

