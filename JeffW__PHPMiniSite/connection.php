<?php

try
{
    $pdo=new PDO("mysql:host=127.0.0.1;dbname=wp_person",'jeffw','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $dbstatus = "Good database connection";
}
 catch (PDOException $e)
 {
     $dbstatus = "Database connection failed <br>".
             $e->getMessage();
     
 }
 session_start()

?>