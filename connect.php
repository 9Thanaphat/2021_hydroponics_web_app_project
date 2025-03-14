<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="17052546";
$dbname="db_myproject";
 
 $mysqlx=new mysqli ($dbhost, $dbuser, $dbpassword, $dbname);
 if ($mysqlx->connect_error){
    die ("ไม่สามารถเชื่อมต่อได้ database ได้ <br>");
    exit();
 } else {
   //echo "เชื่อมต่อ db ได้จ้า";
 }

?>