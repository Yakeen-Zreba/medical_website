<?php

/* $view="/index_medical.php"; */

function visitorsOnly($view ='/index_medical.php')
{
    if(isset($_SESSION['id']))
    {
       header('location: '. BASE_URL .$view);
       exit(0);
    }
}
 function userOnly($view ='/index_medical.php')
{
   if(empty($_SESSION['id']))
   {
      ?>
      <script>
        alert(" You must be login ");
      </script>
      
      <?php
    /*   header('location: '. BASE_URL .$view);  */
      exit(0);
   }
} 

function adminOnly($view ='/index_medical.php')
{
    if(empty($_SESSION['id']) || empty($_SESSION['admin']))
    {
      ?>
      <script>
        alert(" You must be Admin ");
      </script>
      
      <?php
       header('location: '. BASE_URL .$view);
       exit(0);
    }
}
