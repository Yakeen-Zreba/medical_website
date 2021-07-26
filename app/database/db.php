<?php

session_start();//يمكن تعريف الجلسات على انها طريقة لتخزين المعلومات في متغييرات  ونقلها  بين صفحات موقعك المختلفة لتكون متاحة للاستخدام

require("connect.php");

function executeQuery($sql,$data)
{
    global $conn;
    $st=$conn->prepare($sql);
    $values=array_values($data);  //get the value
    $types=str_repeat('s',count($values)); //get types of the value
    $st->bind_param($types, ...$values);
    $st->execute();
    return $st;
}

/* SELECT FUNCTIONS */

function selectAll($table,$condition=[]) //اختياري اي يمكن عدم تمرير قيمة له  condition الاقواس لجعل الباراميتر  
{
    //$sql=SELECT * FROM users WHERE admin=0 AND username='yakeen'"; 

    global $conn; //لازم يكون معرف في الدالة لانه بيستخدمه
    $sql = "SELECT * FROM $table";
    if(empty($condition)){
        $st = $conn->prepare($sql);
        $st->execute();
        $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $c=0;
        foreach($condition as $key => $value){
            if ($c === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql=$sql . " AND $key=?";
            }
            $c++;
        }

        $st = executeQuery($sql,$condition);
        $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table,$condition) 
{
    global $conn; 
    $sql = "SELECT * FROM $table";

    $c=0;
    foreach($condition as $key => $value){
        if ($c === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql=$sql . " AND $key=?";
        }
        $c++;
    }

    $sql=$sql . " LIMIT 1";
    $st = executeQuery($sql,$condition);
    $records=$st->get_result()->fetch_assoc();
    return $records;
}
/* END SELECT FUNCTIONS */

/* CREATE FUNCTUION */
function create($table ,$data)
{
    // $sql="INSERT INTO users (username,admin,email,password) VALUE(?, ?, ?, ?);"
    // $sql="INSERT INTO users SET username=? , admin=? , email=? , password=?;" 

    global $conn;
    $sql="INSERT INTO $table SET ";
    
    $c=0;
    foreach($data as $key => $value){
        if ($c === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql=$sql . ", $key=?";
        }
        $c++;
    }

    $st=executeQuery($sql,$data);
    $id=$st->insert_id;
    return $id;
}
/*END CREATE FUNCTION */

/*UPDATE FUNCTION */
function update($table, $id ,$data)
{
    // $sql="UPDATE users SET username=? , admin=? , email=? , password=? WHERE id=?;" 

    global $conn;
    $sql="UPDATE $table SET ";
    
    $c=0;
    foreach($data as $key => $value){
        if ($c === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql=$sql . ", $key=?";
        }
        $c++;
    }
    $sql=$sql . " WHERE id=?";
    $data['id']=$id;
    $st=executeQuery($sql,$data);
    /* $id=$st->insert_id; */
    return $st->affected_rows; //اذا تحقق التعديل يجب ان يرجع قيمة اكبر من 0
}
/*END UPDATE TUNCTION */

/* DELETE FUNCTION */
function delete($table, $id)
{
    // $sql="DELET FROM users WHERE id=?;" 

    global $conn;
    $sql="DELETE FROM $table WHERE id=?";
    $st=executeQuery($sql,['id'=>$id]);//وضع في مصفوفة لانه عنصر داخل مصفوفة
   /*  $id=$st->insert_id; */
    return $st->affected_rows; //اذا تحقق الحذف يجب ان يرجع قيمة اكبر من 0
}
/*END DELETE FUNCTION */

/**********************/
function getPublishArt(){
    global $conn;
    $sql="SELECT 
            a.*, u.username 
        FROM articles AS a 
        JOIN users AS u 
        ON a.userID=u.id 
        WHERE a.published=? ORDER BY a.createdAt DESC ";
    
    $st = executeQuery($sql ,['published'=>1]) ;
    $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getArtByTopic($topicID){
    global $conn;
    $sql="SELECT 
            a.*, u.username 
        FROM articles AS a 
        JOIN users AS u 
        ON a.userID=u.id 
        WHERE a.published=? AND topicID=? ORDER BY a.createdAt DESC";
    
    $st = executeQuery($sql,['published'=>1, 'topicID'=>$topicID]);
    $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchArt($input){
    global $conn;
    $term='%'.$input.'%';
    $sql="SELECT 
            a.*, u.username 
          FROM articles AS a
          JOIN users AS u 
          ON a.userID=u.id 
          WHERE a.published=? 
          AND a.title LIKE ? OR a.textContent LIKE ?
          ORDER BY a.createdAt DESC";
    
    $st = executeQuery($sql, ['published'=> 1, 'title' =>$term, 'textContent'=> $term]);
    $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchDoctor($input){
    global $conn;
    $term='%'.$input.'%';
    $sql="SELECT * FROM doctors WHERE doctorname  LIKE ? OR specialty LIKE ?";
    
    $st = executeQuery($sql, ['doctorname' =>$term , 'specialty'=>$term]);
    $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function COVIDArt(){
    global $conn;
    $term='%'.'COVID'.'%';
    $sql="SELECT 
            a.*, u.username 
        FROM articles AS a 
        JOIN users AS u 
        ON a.userID=u.id 
        WHERE a.published=?  AND a.title LIKE ? OR a.textContent LIKE ?/*  ORDER BY a.createdAt DESC */ ";
    
    $st = executeQuery($sql,['published'=>1, 'title'=> $term, 'textContent'=> $term]);
    $records=$st->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
