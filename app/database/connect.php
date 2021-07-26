<?php

$server_name='localhost';
$user_name='root';
$pass='';
$db_name='medical';

$conn=new MySQLi($server_name,$user_name,$pass,$db_name);

/*لمعرفت اذا كان هناك اخطاء
if($conn->connect_error){
  die('There is error in database connaction: '.$conn->connect_error);/* تطبع الرسالة أو رقم الحالة المطلوب طباعته قبل إنهاء البرنامج النصي. exit() تشبه الدالة  
}
else{
    echo('The database connection is successful :) ');
}
*/